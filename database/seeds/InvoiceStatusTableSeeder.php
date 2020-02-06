<?php

use Illuminate\Database\Seeder;

class InvoiceStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('invoices_status')->insert([
            'status_name' => 'New',
            'status' => '1', 
        ]);
    }
}
