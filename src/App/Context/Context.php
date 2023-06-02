<?php

namespace Asseco\Common\App\Context;

interface Context
{
    public function getToken(): ?string;

    public function getXCorrelationId(): ?string;

    public static function getCorrelationHeaderName(): string;
}
