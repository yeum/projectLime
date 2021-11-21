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
}

?>