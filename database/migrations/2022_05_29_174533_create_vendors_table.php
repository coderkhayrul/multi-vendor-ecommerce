<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vendor_name');
            $table->string('vendor_phone');
            $table->string('vendor_operator_name');
            $table->string('vendor_operator_phone');
            $table->string('vendor_tin');
            $table->string('vendor_tread_number');
            $table->string('vendor_email')->nullable();
            $table->text('vendor_description')->nullable();
            $table->text('vendor_office_address')->nullable();
            $table->string('vendor_image')->nullable();
            $table->string('vendor_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
