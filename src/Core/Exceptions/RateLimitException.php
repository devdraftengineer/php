<?php

namespace Devdraft\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Rate Limit Exception';
}
