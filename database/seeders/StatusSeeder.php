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
        $status1 = new Status();
        $status1->name = "Cancelado";
        $status1->save();

        $status2 = new Status();
        $status2->name = "Pendiente";
        $status2->save();

        $status3 = new Status();
        $status3->name = "Entregado";
        $status3->save();

        $status4 = new Status();
        $status4->name = "Activo";
        $status4->save();

        $status5 = new Status();
        $status5->name = "Inactivo";
        $status5->save();

        $status6 = new Status();
        $status6->name = "Cerrado";
        $status6->save();

        $status7 = new Status();
        $status7->name = "Anulado";
        $status7->save();

    }
}
