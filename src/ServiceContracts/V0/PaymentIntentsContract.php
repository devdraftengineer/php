<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateBankParams;
use Devdraft\V0\PaymentIntents\PaymentIntentCreateStableParams;

interface PaymentIntentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PaymentIntentCreateBankParams $params
     *
     * @throws APIException
     */
    public function createBank(
        array|PaymentIntentCreateBankParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PaymentIntentCreateStableParams $params
     *
     * @throws APIException
     */
    public function createStable(
        array|PaymentIntentCreateStableParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
