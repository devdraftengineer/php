<?php

namespace Devdraft\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Authentication Exception';
}
