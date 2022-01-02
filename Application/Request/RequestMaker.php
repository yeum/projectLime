<?php
namespace Application\Request;

use Application\Parser\HttpSerializer;
use Exception;

final class RequestMaker
{
    public static function make(string $postData): Request
    {
        $contentType = HttpSerializer::getHeader("CONTENT_TYPE");

        switch($contentType) {
            case 'application/json':
                $request = self::createRequestFromJson($postData);
                break;
            
            default:
                throw new Exception("invalid content type : {$contentType}", 0);
        }

        return $request;
    }

    private static function createRequestFromJson(string $postData): Request
    {
        $decodeData = json_decode($postData, true);
        if(is_array($decodeData) === false) {
            throw new Exception("invalid request packet", 0);
        }

        if(isset($decodeData['api']) === false) {
            throw new Exception("not exist api", 0);
        }
        
        $requestParams = self::getRequestParams($decodeData['api']);
        $request = new Request($requestParams);
        $request->setRequestData($decodeData);
        
        return $request;
    }

    private static function getRequestParams(string $api): ?RequestParams
    {
        $classPath = "Application\Request\\{$api}RequestParams";
        if(class_exists($classPath) === true) {
            return new $classPath();
        }

        return null;
    }
}
?>