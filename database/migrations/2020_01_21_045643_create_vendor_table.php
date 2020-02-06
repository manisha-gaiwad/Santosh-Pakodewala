<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mob')->unique()->nullable(); 
            $table->string('email')->index();
            $table->string('business_type_id');
            $table->string('gstin_number');
            $table->string('pan_number'); 
            $table->string('ifc_code');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('adhar_number')->unique();
            $table->string('address');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
}
