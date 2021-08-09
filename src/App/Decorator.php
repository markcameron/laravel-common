<?php

namespace Asseco\Common\App;

use Exception;
use Illuminate\Support\Arr;

class Decorator
{
    /**
     * @param array $contracts
     * @throws Exception
     */
    public static function uuid(array $contracts)
    {
        if (empty($contracts)) {
            return;
        }

        $decorator = config('asseco-common.uuid_decorator');

        if (!$decorator) {
            throw new Exception('Uuid decorator missing.');
        }

        foreach ($contracts as $contract) {
            app()->extend($contract, function ($model, $app) use ($decorator) {
                return new $decorator($model);
            });
        }
    }

    /**
     * @param array $contracts
     * @param string|null $decorator
     */
    public static function migrations(array $contracts, string $decorator)
    {
        if (empty($contracts)) {
            return;
        }

        $decorators = config('asseco-common.migration_decorators');

        $decorator = Arr::get($decorators, $decorator);

        if (!$decorator) {
            return;
        }

        foreach ($contracts as $contract) {

            app()->extend($contract, function ($model, $app) use ($decorator) {
                return new $decorator($model);
            });
        }
    }
}
