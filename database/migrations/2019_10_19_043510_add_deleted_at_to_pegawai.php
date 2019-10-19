<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPegawai extends Migration
{
	public function up()
	{
		Schema::table('pegawai', function (Blueprint $table) {
			$table->dateTime('deleted_at')->nullable();
		});
	}
	
	public function down()
	{
		Schema::table('pegawai', function (Blueprint $table) {
			$table->dropColumn('deleted_at');
		});
	}
}
