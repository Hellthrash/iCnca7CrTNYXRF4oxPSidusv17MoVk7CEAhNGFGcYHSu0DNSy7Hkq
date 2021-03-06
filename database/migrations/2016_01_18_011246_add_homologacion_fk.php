<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomologacionFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homologacion', function(Blueprint $table) {
            $table  ->foreign('postulante','homologacion_pre_uach_foreign')
                    ->references('postulante')
                    ->on('pre_uach')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homologacion', function(Blueprint $table) {
            $table->dropForeign('homologacion_pre_uach_foreign');

        });
    }
}
