<?php
namespace Application\Handler;

use Application\Request\Request;
use Application\Response\LoginGameResponseParams;
use Application\Response\ResponseParams;

final class LoginGameHandler implements Handler
{
    public function process(Request $request): ResponseParams
    {
        echo "LoginGame!" . "</br>";
        
        $responseParams = new LoginGameResponseParams();
        $responseParams->user_id = 100000;
        $responseParams->session_key = "session";
        return $responseParams;
    }
}
?>