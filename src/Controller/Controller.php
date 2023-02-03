<?php
namespace Sanyandr\Practice\Controller;

use Sanyandr\Practice\DBFunctions\DBFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Controller
{
    public function delete(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        (new DBFunctions())->deleteReview($ID);
        $result = (new DBFunctions())->getAll();
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function helloWorld(Request $request, Response $response): Response  {
        $response->getBody()->write("Hello, World!");
        return $response;
    }

    public function home(Request $request, Response $response): Response {
        $result = (new DBFunctions())->getAll();
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function reviewByID(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        $result = (new DBFunctions())->getByID($ID);
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function reviewsByPages(Request $request, Response $response, $args): Response {
        $page = $args['page'] ?? 1;
        $result = (new DBFunctions())->getLimited($page);
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }
}
