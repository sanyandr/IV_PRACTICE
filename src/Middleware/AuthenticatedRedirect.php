<?php
namespace mainNamespace\Middleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Auth;
class AuthenticatedRedirect {

    public function __invoke(Request $request, Response $response) {


    }
}