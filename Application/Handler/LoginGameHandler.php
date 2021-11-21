<?php
namespace Application\Handler;

use Application\Request\Request;
use Application\Response\ResponseParams;

final class LoginGameHandler implements Handler
{
    public function process(Request $request): ResponseParams
    {
        echo "LoginGame!" . "</br>";
        
        return new ResponseParams();
    }
}
?>