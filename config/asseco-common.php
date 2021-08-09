<?php

use Asseco\Common\App\Decorators\Audit;
use Asseco\Common\App\Decorators\SoftDelete;
use Asseco\Common\App\Decorators\SoftDeleteAudit;
use Asseco\Common\App\Decorators\Uuid;
use Asseco\Common\App\MigrationMethodPicker;

return [

    'uuid_decorator'       => Uuid::class,

    /**
     * Different decorators for different migration timestamp methods.
     *
     * @see MigrationMethodPicker
     * @see https://github.com/asseco-voice/laravel-blueprint-audit
     */
    'migration_decorators' => [
        MigrationMethodPicker::SOFT    => SoftDelete::class,
        MigrationMethodPicker::PARTIAL => Audit::class,
        MigrationMethodPicker::FULL    => SoftDeleteAudit::class,
    ],
];
