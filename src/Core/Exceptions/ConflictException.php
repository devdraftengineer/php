<?php

namespace Devdraft\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Conflict Exception';
}
