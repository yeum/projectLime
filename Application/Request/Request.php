<?php
namespace Application\Request;

use Application\Parser\Parameter;

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

    public function setRequestData(array $postData): void
    {
        $this->api = Parameter::getStringParam($postData, 'api');

        if(isset($this->params) === true) {
            $params = Parameter::getArrayParam($postData, 'params');
            $this->params->setParams($params);
        }
    }
}
?>