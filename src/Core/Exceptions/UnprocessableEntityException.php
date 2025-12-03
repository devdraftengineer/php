<?php

namespace Devdraft\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Unprocessable Entity Exception';
}
