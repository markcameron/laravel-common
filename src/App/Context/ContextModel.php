<?php

namespace Asseco\Common\App\Context;

use Illuminate\Support\Str;

class ContextModel implements Context
{
    public ?string $token;
    public ?string $xCorrelationId;
    public ?string $xTenantId;

    /**
     * @param $token
     * @param $xCorrelationId
     * @param $xTenantId
     */
    public function __construct($token = null, $xCorrelationId = null, $xTenantId = null)
    {
        $this->token = $token;
        $this->xCorrelationId = $xCorrelationId ?: Str::uuid()->toString();
        $this->xTenantId = $xTenantId;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token ?: request()->bearerToken();
    }

    /**
     * @param  string  $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getXCorrelationId(): string
    {
        return $this->xCorrelationId;
    }

    /**
     * @param  string  $xCorrelationId
     */
    public function setXCorrelationId(string $xCorrelationId): void
    {
        $this->xCorrelationId = $xCorrelationId ?: Str::uuid()->toString();
    }

    /**
     * @return string
     */
    public function getXTenantId(): string
    {
        return $this->xTenantId;
    }

    /**
     * @param  string  $xTenantId
     */
    public function setXTenantId(string $xTenantId): void
    {
        $this->xTenantId = $xTenantId;
    }

    public static function getCorrelationHeaderName(): string
    {
        return config('asseco-common.correlation.header_name');
    }
}
