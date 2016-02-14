<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiTest
 *
 * @author maxime
 */
class ApiTest extends TestCase {

    protected $client;

    public function setUp() {
        $this->client = new GuzzleHttp\Client(['base_uri' => 'http://localhost:9090/']);
    }

    public function testGetStatusesCode() {
        $response = $this->client->request('GET', 'status', ['headers' => ['Accept' => 'application/json']]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetStatusesType() {
        $response = $this->client->request('GET', 'status', ['headers' => ['Accept' => 'text/html']]);
        $this->assertEquals("text/html;charset=UTF-8", $response->getHeaderLine('content-type'));
    }

    public function testGetJsonNotNull() {
        $response = $this->client->request('GET', 'status', ['headers' => ['Accept' => 'application/json']]);
        $data = json_decode($response->getBody(), true);
        $this->assertNotNull($data);
    }

    public function testGetJson() {
        $response = $this->client->request('GET', 'status', ['headers' => ['Accept' => 'application/json']]);
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('message', $data[0]);
        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('username', $data[0]);
        $this->assertArrayHasKey('date', $data[0]);
    }

    public function testPostJson() {
        $cli = new Goutte\Client();
        $point = 'http://localhost:9090';
        $cli->setHeader('Accept', 'application/json');
        $cli->setHeader('Content-Type', 'application/json');
        $cli->request('POST', sprintf('%s/status', $point), [], [], [], json_encode(['message' => 'Hi']));
        $response = $cli->getResponse();
        $this->assertEquals(201, $response->getStatus());
    }

}
