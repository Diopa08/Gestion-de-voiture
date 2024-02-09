<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/yyyy_mm_dd_create_car_renter_table.php

public function up()
{
    Schema::create('renters', function (Blueprint $table) {
        $table->id();
        $table->date('pickup_date');
        $table->date('return_date');
        $table->date('final_return_date')->nullable();

        $table->unsignedBigInteger('car_id');
        $table->unsignedBigInteger('user_id'); // Utilisez la même clé étrangère que dans la table 'cars'
        $table->timestamps();

        $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renters');
    }
};
