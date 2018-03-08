<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kodebuku');
            $table->string('judulbuku')->index();
            $table->string('pengarang');
            $table->string('kategori');
            $table->timestamps();
        });

        DB::table('daftar_bukus')->insert(
            array(            
                'id' => '1',    
                'kodebuku' => '10001',
                'judulbuku' => 'Buku Cerita 1',
                'pengarang' => 'Pengarang 1',
                'Kategori' => 'Fantasy 1',  
            )
        );

        DB::table('daftar_bukus')->insert(
            array(            
                'id' => '2',    
                'kodebuku' => '10002',
                'judulbuku' => 'Buku Cerita 2',
                'pengarang' => 'Pengarang 2',
                'Kategori' => 'Fantasy 2',  
            )
        );

        DB::table('daftar_bukus')->insert(
            array(            
                'id' => '3',    
                'kodebuku' => '10003',
                'judulbuku' => 'Buku Cerita 3',
                'pengarang' => 'Pengarang 3',
                'Kategori' => 'Fantasy 3',  
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_bukus');
    }
}
