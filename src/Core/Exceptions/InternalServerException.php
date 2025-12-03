<?php

namespace Devdraft\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Internal Server Exception';
}
