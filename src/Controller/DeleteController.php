<?php
namespace mainNamespace\Controller;
use db\dbFunctions\dbFunctions;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteController {

    public function index(Request $request, Response $response, int $ID): Response {
        (new dbFunctions())->deleteReview($ID);
        return (new HomeController)->index($request, $response);
    }

}