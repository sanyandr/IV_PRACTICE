<?php
    namespace mainNamespace\Controller;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

class HelloWorldController {

    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write("Hello, World!");
        return $response;
    }

    }