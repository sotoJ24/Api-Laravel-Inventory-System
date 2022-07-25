<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\TaxRateAndCode;

class TaxRateAndCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tax1 = new TaxRateAndCode();
        $tax1->ivaCode = "00";
        $tax1->ivaRate = "Tarifa 0% (Sin derecho a crédito)";
        $tax1->percentage = 0;
        $tax1->save();

        $tax2 = new TaxRateAndCode();
        $tax2->ivaCode = "01";
        $tax2->ivaRate = "Tarifa 0% (Con derecho a crédito)";
        $tax2->percentage = 0;
        $tax2->save();

        $tax3 = new TaxRateAndCode();
        $tax3->ivaCode = "02";
        $tax3->ivaRate = "Tarifa reducida 1%";
        $tax3->percentage = 1;
        $tax3->save();

        $tax4 = new TaxRateAndCode();
        $tax4->ivaCode = "03";
        $tax4->ivaRate = "Tarifa reducida 2% ";
        $tax4->percentage = 2;
        $tax4->save();

        $tax5 = new TaxRateAndCode();
        $tax5->ivaCode = "04";
        $tax5->ivaRate = "Tarifa reducida 4%";
        $tax5->percentage = 4;
        $tax5->save();

        $tax6 = new TaxRateAndCode();
        $tax6->ivaCode = "07";
        $tax6->ivaRate = "Tarifa reducida 8%";
        $tax6->percentage = 8;
        $tax6->save();

        $tax7 = new TaxRateAndCode();
        $tax7->ivaCode = "08";
        $tax7->ivaRate = "Tarifa general 13%";
        $tax7->percentage = 13;
        $tax7->save();
    }
}
