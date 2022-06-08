<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\PaymentsMethods;

class PaymentsMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments1 = new PaymentsMethods();
        $payments1->name = "Efectivo";
        $payments1->save();

        $payments2 = new PaymentsMethods();
        $payments2->name = "Sinpe";
        $payments2->save();

        $payments3 = new PaymentsMethods();
        $payments3->name = "Tarjeta";
        $payments3->save();

        $payments4 = new PaymentsMethods();
        $payments4->name = "Transferencia";
        $payments4->save();

        $payments5 = new PaymentsMethods;
        $payments5->name = "Cheque";
        $payments5->save();

        // $payments6 = new PaymentsMethods;
        // $payments6->name = "Defecto";
        // $payments6->save();
    }
}
