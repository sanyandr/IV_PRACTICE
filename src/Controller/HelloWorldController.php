<?php
    namespace mainNamespace\Controller;

class HelloWorldController {
    public function exec() {

        echo "Hello, World!";
    }
    public function index($request, $response) {

        return "Hello, World!";
    }
}