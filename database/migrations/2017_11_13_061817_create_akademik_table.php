<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkademikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akademik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim', 12);
            $table->string('prodi');
            $table->string('angkatan_wisuda');
            $table->date('tanggal_lulus');
            $table->string('nilai_ipk');
            $table->timestamps();
            $table->softDeletes();
            $table->unique('nim');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akademik');
    }
}
