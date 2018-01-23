<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
	protected $table = 'mahasiswa';
	protected $fillable = array('nama', 'nim','id_dosen');
	

	public function wali() {
		return $this->hasOne('App\Wali', 'id_mahasiswa');
	}

	public function dosen() {
		return $this->belongsTo('App\Dosen', 'id_dosen');
	}

	public function hobi() {
		return $this->belongsToMany('App\Hobi', 'mahasiswa_hobi', 'id_mahasiswa', 'id_hobi');
	}
}
