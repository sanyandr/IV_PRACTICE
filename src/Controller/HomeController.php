<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController {

    public function index(Request $request, Response $response): Response {
        $result = (new dbFunctions())->getAll();
        foreach ($result as $item) {
            $response->getBody()->write('<pre>'.json_encode($item).'</pre>');
        }

        return $response;
    }

}