<?php

namespace Devdraft\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Devdraft Permission Denied Exception';
}
