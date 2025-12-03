<?php

namespace Devdraft\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Not Found Exception';
}
