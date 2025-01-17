<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donhangct', function (Blueprint $table) {
            $table->increments('id_donhangct');
            $table->unsignedInteger('id_donhang'); 
            $table->unsignedInteger('id_hoa');
            $table->bigInteger('soluong');
            $table->decimal('gia', 10);
            $table->unsignedInteger('id_km')->nullable();
            $table->unsignedInteger('id_danhgia')->nullable();
            $table->timestamps();  

            $table->foreign('id_donhang')
            ->references('id_donhang')
            ->on('donhang')
            ->onDelete('cascade');
            
            $table->foreign('id_hoa')
            ->references('id_hoa')
            ->on('hoa')
            ->onDelete('cascade');

            $table->foreign('id_km')
            ->references('id_km')
            ->on('khuyenmai')
            ->onDelete('cascade');

            $table->foreign('id_danhgia')
            ->references('id_danhgia')
            ->on('danhgia')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhangct');
    }
};
