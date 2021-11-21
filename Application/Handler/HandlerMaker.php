<?php
namespace Application\Handler;

use Application\Request\Request;
use Exception;

final class HandlerMaker
{
    public static function make(Request $request): Handler
    {
        $handlerName = $request->api;
        $handlerPath = "Application\Handler\\{$handlerName}Handler";
        if(class_exists($handlerPath) === false) {
            throw new Exception("invalid handler name {$handlerName}", 0);
        }

        $handler = new $handlerPath;
        return $handler;
    }
}
?>