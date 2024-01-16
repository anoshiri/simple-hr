<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.name', 'HROga');
        $this->migrator->add('general.slogan', 'Where dreams come true.');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.city', '');
        $this->migrator->add('general.state', '');
        $this->migrator->add('general.postalCode', '');
        $this->migrator->add('general.country', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.logo', '');
        $this->migrator->add('general.favicon', '');
        $this->migrator->add('general.currency', 'CAD $');
    }
};
