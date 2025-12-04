<?php

declare(strict_types=1);

namespace Devdraft\Services;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0Contract;
use Devdraft\Services\V0\BalanceService;
use Devdraft\Services\V0\CustomersService;
use Devdraft\Services\V0\ExchangeRateService;
use Devdraft\Services\V0\HealthService;
use Devdraft\Services\V0\InvoicesService;
use Devdraft\Services\V0\PaymentIntentsService;
use Devdraft\Services\V0\PaymentLinksService;
use Devdraft\Services\V0\ProductsService;
use Devdraft\Services\V0\TaxesService;
use Devdraft\Services\V0\TestPaymentService;
use Devdraft\Services\V0\TransfersService;
use Devdraft\Services\V0\WebhooksService;

final class V0Service implements V0Contract
{
    /**
     * @api
     */
    public HealthService $health;

    /**
     * @api
     */
    public TestPaymentService $testPayment;

    /**
     * @api
     */
    public CustomersService $customers;

    /**
     * @api
     */
    public PaymentLinksService $paymentLinks;

    /**
     * @api
     */
    public PaymentIntentsService $paymentIntents;

    /**
     * @api
     */
    public WebhooksService $webhooks;

    /**
     * @api
     */
    public TransfersService $transfers;

    /**
     * @api
     */
    public BalanceService $balance;

    /**
     * @api
     */
    public ExchangeRateService $exchangeRate;

    /**
     * @api
     */
    public ProductsService $products;

    /**
     * @api
     */
    public InvoicesService $invoices;

    /**
     * @api
     */
    public TaxesService $taxes;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->health = new HealthService($client);
        $this->testPayment = new TestPaymentService($client);
        $this->customers = new CustomersService($client);
        $this->paymentLinks = new PaymentLinksService($client);
        $this->paymentIntents = new PaymentIntentsService($client);
        $this->webhooks = new WebhooksService($client);
        $this->transfers = new TransfersService($client);
        $this->balance = new BalanceService($client);
        $this->exchangeRate = new ExchangeRateService($client);
        $this->products = new ProductsService($client);
        $this->invoices = new InvoicesService($client);
        $this->taxes = new TaxesService($client);
    }

    /**
     * @api
     *
     * Get wallets for an app
     *
     * @throws APIException
     */
    public function getWallets(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/wallets',
            options: $requestOptions,
            convert: null,
        );
    }
}
