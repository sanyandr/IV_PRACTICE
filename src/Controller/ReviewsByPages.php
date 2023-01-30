<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use db\SQLiteConnection\SQLiteConnection;
use PDO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ReviewsByPages {

    public static function index(Request $request, Response $response, $args): Response {
        $page = $args['page'] ?? 1;
        $result = (new dbFunctions())->getLimited($page);
        $response->getBody()->write(json_encode($result));
        return $response;
    }

}