<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name', 100);
            $table->string('property_type', 100);
            $table->float('property_size', 8, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->foreignId('location_id')->constrained();
            // $table->decimal('percentage_raised', 4, 2);
            // $table->bigInteger('target_amount');
            // $table->float('investment_multiple', 6, 2);
            // $table->integer('no_of_investors');
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
        Schema::dropIfExists('properties');
    }
};
