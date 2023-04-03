<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Permission::create(['name'=>'watch']);
       Permission::create(['name'=>'edit']);
       Permission::create(['name'=>'delete']);
       Permission::create(['name'=>'create']);
    }
}