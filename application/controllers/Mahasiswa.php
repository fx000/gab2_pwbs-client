<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    
	public function index()
	{
		$data["tampil"] = json_decode($this->client->simple_get(APIMAHASISWA));
		// foreach($data["tampil"]->mahasiswa as $result){
		// 	echo $result->npm_mhs."<br>";
		// }
		$this->load->view('vw_mahasiswa', $data);
	}

	function setDelete(){
		// Buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);
		
		$delete = json_decode($this->client->simple_delete(APIMAHASISWA, array("npm_mhs" => $hasil->npmnya)));

		// $err = 0;

		// Kirim hasil ke "vw_mahasiswa
		echo json_encode(array("statusnya" => $delete->status));
	}

	function addMahasiswa(){

		$this->load->view('en_mahasiswa');
	}

	// Buat fungsi untuk simpan data mahasiswa
	function setSave(){
		// baca nilai dari fetch
		$data = array(
			"npm_mhs" => $this->input->post("npmnya"),
			"nama_mhs" => $this->input->post("namanya"),
			"telepon_mhs" => $this->input->post("teleponnya"),
			"jurusan_mhs" => $this->input->post("jurusannya")
			// Token sudah di generate di sisi server
		);

		$save = json_decode($this->client->simple_post(APIMAHASISWA, $data));

		echo json_encode(array("statusnya" => $save->status));

	}


}
