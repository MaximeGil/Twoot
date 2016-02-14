<?php

require __DIR__ . '/../vendor/autoload.php';

use Http\Request;
use Dal\Connection;
use Model\StatusesMapper;
use Model\UserMapper;
use Model\Popo\Status;
use Model\Popo\User;

$co = "mysql:host=127.0.0.1;dbname=uframework;port=32768";
$user = "uframework";
$pwd = "password";

$db = new Connection($co, $user, $pwd);


// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
        __DIR__ . '/templates/'
        ), $debug);

$model = new \Model\StatusesFinder($db);
$userfinder = new \Model\UserFinder($db);
/*
 * Index
 */
$app->get('/', function (Request $request) use ($app) {
    return $app->render('index.php');
});
$app->get('/login', function (Request $request) use ($app) {
    return $app->render('login.php');
});

$app->post('/login', function (Request $request) use ($app, $db, $userfinder) {
    $username = $request->getParameter("username");
    $password = $request->getParameter("password");

    $result = $userfinder->findOneByUsername($username);

    if ($result->getPassword() === $password) {
        session_start();
        $_SESSION['username'] = $result->getUsername();
        $_SESSION['user'] = $result;
        $_SESSION['is_authenticated'] = true;
        return $app->redirect('/');
    }
    return $app->render('login.php');
});

$app->get('/logout', function (Request $request) use ($app) {
    session_destroy();
    return $app->redirect('/');
});
$app->get('/register', function (Request $request) use ($app, $db) {

    return $app->render('register.php');
});

$app->post('/register', function (Request $request) use ($app, $db) {
    $date = date("Y-m-d H:i:s");
    $username = $request->getParameter("username");
    $password = $request->getParameter("password");
    $age = $request->getParameter("age");

    $user = new User($username, $age, $date, $password);

    $dm = new UserMapper($db);
    $dm->persist($user);

    $app->redirect('/status');
});

$app->get('/status', function (Request $request) use ($app, $model) {
    $list = $model->findAll();

    if ($request->guessBestFormat() === "application/json") {
        $list = json_encode($list);
        $response = new Http\Response($list);
        return $response->send();
    }


    return $app->render('liststatus.php', array('list' => $list));
});

$app->get('/status/(\d+)', function (Request $request, $id) use ($app, $model) {
    $list = $model->findOneById($id);

    if ($request->guessBestFormat() === "application/json") {
        $list = json_encode($list);
        $response = new Http\Response($list);
        return $response->send();
    }


    return $app->render('detailstatus.php', array('list' => $list));
});

$app->post('/status', function (Request $request) use ($app, $model, $db) {

    if ($request->guessBestFormat() === "application/json") {
        $test = $request->getAllParameters();
        $model->insertOne($test);
        $app->redirect('/status');
    }

    $status = new Status("", $request->getParameter("username"), $request->getParameter("message"));

    $dm = new StatusesMapper($db);
    $dm->persist($status);

    $app->redirect('/status');
});

$app->delete('/status/(\d+)', function(Request $request) use ($app, $model, $db) {
    $d = $request->getParameter("_method");
    $id = $request->getParameter("id");

    $status = new Status($id);

    $dm = new StatusesMapper($db);
    $dm->remove($status);

    $app->redirect('/status');
});

$app->post('/foo/(\d+)', function (Request $request) use ($app) {
    return $app->render('index.php');
});

$app->put('/foo/(\d+)', function (Request $request) use ($app) {
    return $app->render('index.php');
});

$app->delete('/foo/(\d+)', function (Request $request) use ($app) {
    return $app->render('index.php');
});

$app->addListener('process.before', function(Request $request) use ($app) {
    session_start();
    $allowed = [
        '/login' => [ Request::GET, Request::POST],
        '/logout' => [ Request::GET, Request::POST],
        '/register' => [ Request::GET, Request::POST],
        '/status' => [ Request::GET, Request::POST, Request::DELETE],
        '/status/(\d+)' => [ Request::GET, Request::POST, Request::DELETE],
        '/' => [ Request::GET],
    ];
    if (isset($_SESSION['is_authenticated']) && true === $_SESSION['is_authenticated']) {
        return;
    }
    foreach ($allowed as $pattern => $methods) {
        if (preg_match(sprintf('#^%s$#', $pattern), $request->getUri()) && in_array($request->getMethod(), $methods)) {
            return;
        }
    }
    switch ($request->guessBestFormat()) {
        case 'json':
            throw new HttpException(401);
    }
    return $app->redirect('/login');
});

return $app;
