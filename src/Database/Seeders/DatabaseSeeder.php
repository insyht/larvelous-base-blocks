<?php

namespace Insyht\LarvelousBaseBlocks\Database\Seeders;

use Illuminate\Database\Seeder;
use Insyht\LarvelousBaseBlocks\Database\Seeders\Home\BlockTemplateSeeder as HomeBlockTemplateSeeder;
use Insyht\LarvelousBaseBlocks\Database\Seeders\Home\BlockVariableValueSeeder as HomeBlockVariableValueSeeder;
use Insyht\LarvelousBaseBlocks\Database\Seeders\Category\BlockTemplateSeeder as CategoryBlockTemplateSeeder;
use Insyht\LarvelousBaseBlocks\Database\Seeders\Category\BlockVariableValueSeeder as CategoryBlockVariableValueSeeder;

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
        $this->call(HomeBlockTemplateSeeder::class);
        $this->call(HomeBlockVariableValueSeeder::class);

        // Category page
        $this->call(CategoryBlockTemplateSeeder::class);
        $this->call(CategoryBlockVariableValueSeeder::class);
    }
}
