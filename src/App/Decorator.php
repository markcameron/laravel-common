<?php

namespace Asseco\Common\App;

use Exception;
use Illuminate\Support\Arr;

class Decorator
{
    /**
     * @throws Exception
     */
    protected static function uuid()
    {
        $contracts = config('asseco-common.contracts');
        $decorator = config('asseco-common.uuid_decorator');

        if (empty($contracts)) {
            return;
        }

        if (!$decorator) {
            throw new Exception("Uuid decorator missing.");
        }

        foreach ($contracts as $contract) {
            app()->extend($contract, function ($model, $app) use ($decorator) {
                return new $decorator($model);
            });
        }
    }

    /**
     * @throws Exception
     */
    protected static function migrations()
    {
        $contracts = config('asseco-common.contracts');
        $decorators = config('asseco-common.migration_decorators');

        if (empty($contracts)) {
            return;
        }

        foreach ($contracts as $contract) {

            $decorator = Arr::get($decorators, config('asseco-common.migration'));

            if (!$decorator) {
                throw new Exception("Migration decorator missing.");
            }

            app()->extend($contract, function ($model, $app) use ($decorator) {
                return new $decorator($model);
            });
        }
    }
}
