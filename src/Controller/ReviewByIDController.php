<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use db\SQLiteConnection\SQLiteConnection;
use PDO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ReviewByIDController {

    public static function index(Request $request, Response $response, $args): Response {
        $ID = $args['ID'];
        $result = (new dbFunctions())->getByID($ID);
        $response->getBody()->write(json_encode($result));
        return $response;
    }

}