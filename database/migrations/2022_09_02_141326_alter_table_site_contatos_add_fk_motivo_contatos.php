<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //migrando os dados da coluna motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            //criando a fk
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            //removendo a coluna motivo_contato
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            //adicionando a coluna motivo_contato
            $table->string('motivo_contato');
            //removendo a fk
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');

        });

        DB:statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            //removendo a coluna motivo_contatos_id

            $table->dropColumn('motivo_contatos_id');
        });
    }
}
