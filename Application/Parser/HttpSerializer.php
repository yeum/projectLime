<?php
namespace Application\Parser;

final class HttpSerializer
{
    public static function receivePostData(): string
    {
        return file_get_contents("php://input");
    }

    public static function getHeader(string $key)
    {
        $headerKey = "HTTP_" . strtoupper($key);
        if(isset($_SERVER[$headerKey]) === false) {
            return null;
        }

        return $_SERVER[$headerKey];
    }

    public static function setHeader(string $key, string $value): void
    {
        header("{$key}: {$value}");
    }

    public static function sendPostJsonData(string $postData)
    {
        ob_clean();

        if(isset($postData[1024]) === true) {
            ob_start('ob_gzhandler');
            echo $postData;
        } else {
            self::setHeader("Content-Type", "application/json");
            echo $postData;
        }

        ob_end_flush();
    }
}

?>