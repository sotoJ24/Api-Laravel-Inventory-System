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
        $payments = new PaymentsMethods();
        $payments->name = "Efectivo";
        $payments->save();
        
        $payments = new PaymentsMethods();
        $payments->name = "Sinpe";
        $payments->save();

        $payments = new PaymentsMethods();
        $payments->name = "Tarjeta";
        $payments->save();

        $payments = new PaymentsMethods();
        $payments->name = "Transferencia";
        $payments->save();

        $payments = new PaymentsMethods;
        $payments->name = "Cheque";
        $payments->save();
    }
}
