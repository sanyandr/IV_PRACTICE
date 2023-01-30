<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController {

    public function index(Request $request, Response $response): Response {
        $result = (new dbFunctions())->getAll();
        $response->getBody()->write(json_encode($result));
        return $response;
    }

}