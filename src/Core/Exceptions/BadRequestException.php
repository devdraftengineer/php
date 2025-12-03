<?php

namespace Devdraft\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Bad Request Exception';
}
