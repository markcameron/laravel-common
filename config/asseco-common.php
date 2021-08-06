<?php

use Asseco\Common\App\Decorators\Audit;
use Asseco\Common\App\Decorators\SoftDelete;
use Asseco\Common\App\Decorators\SoftDeleteAudit;
use Asseco\Common\App\Decorators\Uuid;
use Asseco\Common\App\MigrationMethodPicker;

return [

    /**
     * Should primary keys be UUIDs.
     */
    'uuid'                 => false,
    'uuid_decorator'       => Uuid::class,

    /**
     * How will migrations remember data (be sure to provide appropriate traits
     * to models if using something other than default).
     * Possible values:
     *    null      => will call timestamps() method on migrations
     *    'soft'    => will call timestamps() & softDeletes()
     *    'partial' => will call audit() method instead
     *    'full'    => will call softDeleteAudit() method instead
     *
     * @see https://github.com/asseco-voice/laravel-blueprint-audit
     */
    'migration'            => null,
    'migration_decorators' => [
        MigrationMethodPicker::SOFT    => SoftDelete::class,
        MigrationMethodPicker::PARTIAL => Audit::class,
        MigrationMethodPicker::FULL    => SoftDeleteAudit::class,
    ],
];
