<?php

namespace Iws\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        // Homepage
        $this->call(\Iws\Database\Seeders\Home\BlockTemplateSeeder::class);
        $this->call(\Iws\Database\Seeders\Home\BlockVariableValueSeeder::class);

        // Category page
        $this->call(\Iws\Database\Seeders\Category\BlockTemplateSeeder::class);
        $this->call(\Iws\Database\Seeders\Category\BlockVariableValueSeeder::class);
    }
}
