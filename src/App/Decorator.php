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
     * @throws Exception
     */
    public static function migrations(array $contracts)
    {
        if (empty($contracts)) {
            return;
        }

        $decorators = config('asseco-common.migration_decorators');

        foreach ($contracts as $contract) {
            $decorator = Arr::get($decorators, config('asseco-common.migration'));

            if (!$decorator) {
                throw new Exception('Migration decorator missing.');
            }

            app()->extend($contract, function ($model, $app) use ($decorator) {
                return new $decorator($model);
            });
        }
    }
}
