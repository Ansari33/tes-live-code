<?php


/**
 * class untuk menmpung fungsi generate  dan verify_token
 */
class Token
{
	private $users = [];

	public function generate($user)
	{
		/*
		Membuat Random String
		Membuat oken
		*/
		$strA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$strN = '0123456789';
		$uniStr = $strA.$strN.strtolower($strA);
		$token = substr(str_shuffle($uniStr), 0,16);

		//Membentuk / Membuat Index
		if (!array_key_exists($user, $this->users)) {
			$this->users[$user] = [];
		}
		// Mengecek Jumlah Token
		// Menghapus yg pertama jika sudah 10
		if (count($this->users[$user]) == 10) {
			array_shift($this->users[$user]);
		}
		$this->users[$user][] = $token;

		return $token; 

	}

	public function verify_token($user,$token)
	{
		/*
			Mengecek Index
			Mengecek Token
			Menghapus Token
		*/
		if (array_key_exists($user,$this->users)) {
			if (in_array($token, $this->users[$user])) {
				unset($this->users[$user][array_search($token, $this->users[$user])]);
					return true;
			}
		}
		return false;
	}

	public function run()
	{
		$user = 'Ansari';
		for ($i=0; $i < 10; $i++) { 
			$this->generate($user);
		}

		$token = $this->users[$user][3];
		echo($token);
		$this->verify_token($user,$token);
		$this->verify_token($user,'Token Salah');

		var_dump($this->users);	

	}


}

/**
 * 
 */
class Siswa
{

	private $nrp = '';
	private $nama= '';
	private $daftarNilai = [];

	private $daftarSiswa = [];

	public function tambah($nrp,$nama,$daftarNilai)
	{
		$this->daftarSiswa[] = [

			'nrp' => $nrp,
			'nama' => $nama,
			'nilai' => ['mapel' => $daftarNilai['mapel'] , 'nilai' => $daftarNilai['nilai']]
		];
	}

	public function run()
	{
		// Menambah data Berdasrarkan
		$this->tambah('1','Sibar',['mapel' => 'inggris', 'nilai' => 100] );

		$strA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$mapels = ['inggris','indonesia','jepang'];
		for ($i=0; $i < 10 ; $i++) { 

			/*
				Mengambil Random String
				Mengambil Random Mapel
				Mengambil Random Nilai
				Menambahkan Sesuai attribut
			*/
			$nama = substr(str_shuffle($strA), 0,10);
			$mapel = $mapels[rand(0,2)];
			$nilai = rand(0,100);

			$this->tambah(strval($i+1),$nama,['mapel' => $mapel, 'nilai' => $nilai]);
			
		}

		var_dump($this->daftarSiswa);

	}
}

/**
 * 
 */
class Nilai
{
	
	private $mapel = '';
	private $nilai = 0; 
}


/**
 * 
 */
class LampuMerah
{
	private $warna = ['merah','kuning','hijau'];
	private $index = 0;

    /*

    Menampilkan Lngsung Berdasarkan INdexnya
	*/
	public function run($countTo)
	{
		$index = 0; 
		for ($i=0; $i < $countTo ; $i++) { 
			if ($i < 3) {
				$index = $i;
			} else {
				$index = $i % 3;
				// if ($i % 3 == 0) {
				// 	$index = 0;
				// }
			}
			echo($this->warna[$index].'<br>');
		}	
		
	}

	/*

    Menampilkan Lngsung Berdasarkan jumlah Pangilan
	*/
	public function runByInc()
	{
		echo($this->warna[$this->index].'<br>');
		$this->index++;
		if ($this->index == 3) {
		 	$this->index = 0;
		 } 
			
		
	}
}


/**
 * 
 */
class BesarKedua
{
	
	public function run($value)
	{
		/*
			Mencari NIali Tertinggi Pertama
			Mencari Index Nilai Tertiinggi
			Menghapus NIlai Tertinggi
			Mencari Nilai Tertinggi Kedua
		*/
		$fmax = max($value);
		unset($value[array_search($fmax,$value)]);
		echo(max($value));
	}
}


/**
 * 
 */
class Terbanyak 
{
	
	public function run($str)
	{
		// variabel Penampung
		$arrStr = str_split($str);
		$arrchar = [];
		$arrVal = [];

		/*
			iterate semua charakter
			masukkan ke variabel penampung untuk jumlahnya dan karakternya dengan menyamakan indexnya

		*/
		for ($i=0; $i < count($arrStr) ; $i++) { 
			if (!in_array($arrStr[$i],$arrchar)) {
				$arrchar[] = $arrStr[$i];
				$arrVal[] = substr_count($str,$arrStr[$i]);
			}
		}

		/*
			Mencari nilai tertinggi di array yg menyimpan jumlah tampil/muncul
			mencari index untuk yang Tertinggi
			Mengambil Charak dengan Tampilan Terbanyak Berdasarkan index
		*/

		array_search(max($arrVal),$arrVal);
		echo($arrchar[array_search(max($arrVal),$arrVal)].' '.max($arrVal).'x');
	}
}

//$tes = new Terbanyak();
//$tes->run('in_aarray');
// $tes = new BesarKedua();
// $tes->run([1,3,6,8,4]);
// $tes->run([1,35,6,8,9]);
// $tes = new LampuMerah();
// $tes->run(10);
// echo "batas --------";
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();
// $tes->runByInc();