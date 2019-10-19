<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $table = 'pegawai';
	
	protected $fillable = ['pegawai_nama', 'pegawai_alamat'];
	
	public $timestamps = true;
}
