<?php
namespace Application\Handler;

use Application\Request\Request;
use Application\Response\ResponseParams;

interface Handler
{
    public function process(Request $request): ResponseParams;
}
?>