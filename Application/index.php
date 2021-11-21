<?php

use Application\Handler\HandlerMaker;
use Application\Parser\HttpSerializer;
use Application\Request\Request;
use Application\Request\RequestMaker;
use Application\Response\Response;

echo 'project LIME!'."<br>"."<br>";
$host = "localhost";
$user = "root";
$pw = "password";
$dbName = "game";

try{
    $isSuccess = true;
    $postData = HttpSerializer::receivePostData();
    $request = RequestMaker::make($postData);

    $handler = HandlerMaker::make($request);
    $responseParams = $handler->process($request);
    $response = new Response($request, $responseParams);

} catch(PDOException $e) {
    if(isset($request) === false || $request instanceof Request === false) {
        $request = new Request();
    }

    $isSuccess = false;
    $response = new Response($request);
    $response->return_code = 0;
    $response->return_massage = "FAIL";
}
