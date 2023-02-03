<?php
namespace Sanyandr\Practice\Controller;

use Sanyandr\Practice\DBFunctions\DBFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Controller
{
    public function Delete(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        (new DBFunctions())->DeleteReview($ID);
        return (new Controller)->Home($request, $response);
    }

    public function HelloWorld(Request $request, Response $response): Response  {
        $response->getBody()->write("Hello, World!");
        return $response;
    }

    public function Home(Request $request, Response $response): Response {
        $result = (new DBFunctions())->GetAll();
        header('Content-Type: application/json; charset=utf-8');
        $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function ReviewByID(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        $result = (new DBFunctions())->GetByID($ID);
        header('Content-Type: application/json; charset=utf-8');
        $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function ReviewsByPages(Request $request, Response $response, $args): Response {
        $page = $args['page'] ?? 1;
        $result = (new DBFunctions())->GetLimited($page);
        header('Content-Type: application/json; charset=utf-8');
        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
