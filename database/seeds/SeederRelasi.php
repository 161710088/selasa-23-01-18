<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Wali;
use App\Dosen;
use App\Hobi;
class SeederRelasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->delete();
		DB::table('wali')->delete();
		DB::table('dosen')->delete();
		DB::table('hobi')->delete();

	$mandi_hujan = Hobi::create(array('hobi' => 'Mandi Hujan'));
	$baca_buku = Hobi::create(array('hobi' => 'Baca Buku'));
			
	$dosen = Dosen::create(array(
			'nama' => 'Iik Hikmat',
			'nipd' => '1234567890'));
		$this->command->info('Data dosen telah diisi!');

	$a = Mahasiswa::create(array(
			'nama' => 'Ahmad Fauzi',
			'nim'  => '161710088',
			'id_dosen' => $dosen->id));
		$this->command->info('Mahasiswa telah diisi!');

	Wali::create(array(
			'nama'  => 'Iwan S',
			'id_mahasiswa' => $a->id));
		$this->command->info('Data mahasiswa dan wali telah diisi!');
	
	$a->hobi()->attach($mandi_hujan->id);
	}
}