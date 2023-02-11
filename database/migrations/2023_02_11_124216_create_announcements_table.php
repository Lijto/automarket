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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('town_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicle_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicle_name_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('fuel_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('volume_of_engine_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('transmission_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('color_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedMediumInteger('car_kilometres');
            $table->unsignedTinyInteger('owners_count');
            $table->foreignId('year_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('prise');
            $table->text('text');
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
        Schema::dropIfExists('announcements');
    }
};
