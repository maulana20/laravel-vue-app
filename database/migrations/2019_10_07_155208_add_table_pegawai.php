<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePegawai extends Migration
{
	public function up()
	{
		Schema::create('pegawai', function(BluePrint $table) {
			$table->increments('id');
			$table->string('pegawai_nama');
			$table->text('pegawai_alamat');
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::dropIfExists('pegawai');
	}
}
