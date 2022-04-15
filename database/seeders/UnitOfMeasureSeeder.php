<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\UnitOfMeasure;

class UnitOfMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new UnitOfMeasure();

        $unit->symbol = "Al";
        $unit->description = "Alquiler de uso habitacional";
        $unit->unitType = "Servicio";
        $unit->save();

        $unit1 = new UnitOfMeasure();

        $unit1->symbol = "Alc";
        $unit1->description = "Alquiler de uso comercial";
        $unit1->unitType = "Servicio";
        $unit1->save();

        $unit2 = new UnitOfMeasure();

        $unit2->symbol = "d";
        $unit2->description = "Día";
        $unit2->unitType = "Servicio";
        $unit2->save();

        $unit3 = new UnitOfMeasure();

        $unit3->symbol = "h";
        $unit3->description = "Hora";
        $unit3->unitType = "Servicio";
        $unit3->save();

        $unit4 = new UnitOfMeasure();

        $unit4->symbol = "I";
        $unit4->description = "Intereses";
        $unit4->unitType = "Servicio";
        $unit4->save();

        $unit5 = new UnitOfMeasure();

        $unit5->symbol = "Os";
        $unit5->description = "Otro tipo de servicio";
        $unit5->unitType = "Servicio";
        $unit5->save();

        $unit6 = new UnitOfMeasure();

        $unit6->symbol = "SP";
        $unit6->description = "Servicios profesionales";
        $unit6->unitType = "Servicio";
        $unit6->save();

        $unit7 = new UnitOfMeasure();

        $unit7->symbol = "Spe";
        $unit7->description = "Servicios personales";
        $unit7->unitType = "Servicio";
        $unit7->save();

        $unit8 = new UnitOfMeasure();

        $unit8->symbol = "St";
        $unit8->description = "Servicios técnicos";
        $unit8->unitType = "Servicio";
        $unit8->save();

        $unit9 = new UnitOfMeasure();

        $unit9->symbol = "cm";
        $unit9->description = "Centímetro";
        $unit9->unitType = "Mercancia";
        $unit9->save();

        $unit10 = new UnitOfMeasure();

        $unit10->symbol = "Gal";
        $unit10->description = "Galón";
        $unit10->unitType = "Mercancia";
        $unit10->save();

        $unit11 = new UnitOfMeasure();

        $unit11->symbol = "kg";
        $unit11->description = "Kilogramo";
        $unit11->unitType = "Mercancia";
        $unit11->save();

        $unit12 = new UnitOfMeasure();

        $unit12->symbol = "Km";
        $unit12->description = "Kilometro";
        $unit12->unitType = "Mercancia";
        $unit12->save();

        $unit13 = new UnitOfMeasure();

        $unit13->symbol = "L";
        $unit13->description = "Litro";
        $unit13->unitType = "Mercancia";
        $unit13->save();

        $unit14 = new UnitOfMeasure();

        $unit14->symbol = "Unid";
        $unit14->description = "Unidad";
        $unit14->unitType = "Mercancia";
        $unit14->save();
    }
}
