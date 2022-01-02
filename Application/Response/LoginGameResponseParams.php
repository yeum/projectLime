<?php

namespace Application\Response;

final class LoginGameResponseParams implements ResponseParams
{
    public int $user_id;

    public string $session_key;
}