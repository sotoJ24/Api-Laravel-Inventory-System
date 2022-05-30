<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\Rol;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Rol1 = new Rol;
        $Rol1->name = "Super User";
        $Rol1->save();

        $Rol2 = new Rol;
        $Rol2->name = "Administrator";
        $Rol2->save();
    }
}
