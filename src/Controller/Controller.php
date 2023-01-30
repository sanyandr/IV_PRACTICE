<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Controller
{
    public function DeleteController(Request $request, Response $response, int $ID): Response {
        (new dbFunctions())->deleteReview($ID);
        return (new Controller)->HomeController($request, $response);
    }

    public function HelloWorldController(Request $request, Response $response): Response  {
        $response->getBody()->write("Hello, World!");
        return $response;
    }

    public function HomeController(Request $request, Response $response): Response {
        $result = (new dbFunctions())->getAll();
        $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function ReviewByIDController(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        $result = (new dbFunctions())->getByID($ID);
        $response->getBody()->write(json_encode($result));
        return $response;
    }

    public function ReviewsByPagesController(Request $request, Response $response, $args): Response {
        $page = $args['page'] ?? 1;
        $result = (new dbFunctions())->getLimited($page);
        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
