<?php
namespace Sanyandr\Practice\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    public function delete(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        call_user_func('Sanyandr\Practice\DBFunctions::deleteReview', $ID);
        $result = call_user_func('Sanyandr\Practice\DBFunctions::getAll');
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function helloWorld(Request $request, Response $response): Response  {
        $response->getBody()->write("Hello, World!");
        return $response;
    }

    public function home(Request $request, Response $response): Response {
        $result = call_user_func('Sanyandr\Practice\DBFunctions::getAll');
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function reviewByID(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        $result = call_user_func('Sanyandr\Practice\DBFunctions::getByID', $ID);
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }

    public function reviewsByPages(Request $request, Response $response, $args): Response {
        $page = $args['page'] ?? 1;
        $result = call_user_func('Sanyandr\Practice\DBFunctions::getLimited', $page);
        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
    }
}
