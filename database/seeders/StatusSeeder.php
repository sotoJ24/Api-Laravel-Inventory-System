<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = "Cancelado";
        $status->save();
        
        $status1 = new Status();
        $status1->name = "Pendiente";
        $status1->save();

        $status2 = new Status();
        $status2->name = "Entregado";
        $status2->save();

        $status3 = new Status();
        $status3->name = "Activo";
        $status3->save();

        $status3 = new Status();
        $status3->name = "Inactivo";
        $status3->save();

        
    }
}
