<?php

namespace Http;

class Request {

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    private $parameters;

    public function __construct(array $query = array(), array $request = array()) {
        $this->parameters = array_merge($query, $request);
    }

    public function getMethod() {
        $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : self::GET;

        if (self::POST === $method) {

            $test = $this->getParameter('_method', $method);
            return $test;
        }

        return $method;
    }

    public function getUri() {
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        if ($pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        return $uri;
    }

    public static function createFromGlobals() {
        $request = new self($_GET, $_POST);

        if ($_SERVER['HTTP_CONTENT_TYPE'] === "application/json" || $_SERVER['CONTENT_TYPE'] === "application/json") {
            $data = file_get_contents('php://input');
            $json = @json_decode($data, true);
            $request->parameters = array_merge($json, $request->parameters); 


        }

        return $request;
    }

    public function getParameter($name, $default = null) {

        return isset($this->parameters[$name]) ? $this->parameters[$name] : $default;
    }

    public function guessBestFormat() {
        $negotiator = new \Negotiation\Negotiator();

        $acceptHeader = $_SERVER['HTTP_ACCEPT'];
        $priorities = array('text/html;charset=UTF-8', 'application/json');

        $mediaType = $negotiator->getBest($acceptHeader, $priorities);
        $value = $mediaType->getValue();

        return $value;
    }
    
    public function getAllParameters()
    {
        return $this->parameters;
    }

}
