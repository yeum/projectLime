<?php
namespace Application\Request;

final class Request
{
    public string $api = "";
    public string $user_id = "";
    public RequestParams $params;

    public function __construct(RequestParams $params = null)
    {
        if($params instanceof RequestParams === true) {
            $this->params = $params;
        }
    }
}
?>