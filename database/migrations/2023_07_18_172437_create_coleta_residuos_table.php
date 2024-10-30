<?php

use App\Models\GeradorResiduo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColetaResiduosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coleta_residuos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gerador_residuo_id')->references('id')->on('geradorResiduo');
            $table->unsignedBigInteger('catador_id')->references('id')->on('catador')->nullable();
            $table->unsignedBigInteger('residuo_id')->references('id')->on('residuo');
            $table->bigInteger('peso');
            $table->unsignedBigInteger('status_id')->references('id')->on('status');
            $table->softDeletes();
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
        Schema::dropIfExists('coleta_residuos');
    }
}
