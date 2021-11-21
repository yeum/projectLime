<?php
namespace Application\Response;

use Application\Request\Request;

final class Response
{
    public string $api = "";
    public string $user_id = "";
    public ResponseParams $params;
    public string $return_massage;
    public int $return_code;

    public function __construct(Request $request, ResponseParams $responseParams = null)
    {
        $this->api = $request->api;
        $this->user_id = $request->user_id;
        $this->return_massage = "SUCCESS";
        $this->return_code = 200;
        
        if($responseParams instanceof ResponseParams === true) {
            $this->params = $responseParams;
        }

    }
}
?>