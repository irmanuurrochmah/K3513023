<?php
class Siswa_model extends CI_Model
{
	private $primary_key='id';
	private $table_name='siswa';

	function __construct(){
		parent::__construct();
	}
	
	function tampil(){
		$tampil = $this->db->get('siswa');
		if ($tampil->num_rows() > 0){
			foreach ($tampil->result() as $data){
				$hasil[] = $data;				
			}
			return $hasil;
		}
	}

	function save(){
		$nama = $this->input->post('nama', true);
		$alamat = $this->input->post('alamat', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$tanggal_lahir = $this->input->post('tanggal_lahir', true);
		$prodi = $this->input->post('prodi', true);
		
		if (!$this->input->post('Blender', true)){} else {$blender = $this->input->post('Blender', true);}
		if (!$this->input->post('3DMax', true)){} else {$max = $this->input->post('3DMax', true);}
		if (!$this->input->post('MS_Office', true)){} else {$office = $this->input->post('MS_Office', true);}
		if (!$this->input->post('Photoshop', true)){} else {$photoshop = $this->input->post('Photoshop', true);}
		if (!$this->input->post('Corel_Draw', true)){} else {$corel = $this->input->post('Corel_Draw', true);}
		if (!$this->input->post('PHP', true)){} else {$php = $this->input->post('PHP', true);}
		if (!$this->input->post('Pascal', true)){} else {$pascal = $this->input->post('Pascal', true);}
		if (!$this->input->post('Java', true)){} else {$java = $this->input->post('Java', true);}
		
		$keahlian = $blender.$max.$office.$photoshop.$corel.$php.$pascal.$java;
		$detail = $this->input->post('detail', true);
		
		$tanggal_lahir2 = explode("/", $tanggal_lahir);
		$bulan = $tanggal_lahir2[0];
		$tanggal = $tanggal_lahir2[1];
		$tahun = $tanggal_lahir2[2];
		$tanggal_lahir3 = $tahun."-".$bulan."-".$tanggal;
		
		$siswa = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
			'tanggal_lahir' => $tanggal_lahir3,
			'prodi' => $prodi,
			'keahlian' => $keahlian,
			'detail' => $detail
		);
		
		$this->db->insert('siswa', $siswa);
	}
	
	function ambil_data($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('siswa');
		return $query->result();
	}
	
	function update(){
		$nama = $this->input->post('nama', true);
		$alamat = $this->input->post('alamat', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$tanggal_lahir = $this->input->post('tanggal_lahir', true);
		$prodi = $this->input->post('prodi', true);
		
		$tanggal_lahir2 = explode("/", $tanggal_lahir);
		$bulan = $tanggal_lahir2[0];
		$tanggal = $tanggal_lahir2[1];
		$tahun = $tanggal_lahir2[2];
		$tanggal_lahir3 = $tahun."-".$bulan."-".$tanggal;
		
		$keahlian = $this->input->post('keahlian', true);
		$detail = $this->input->post('detail', true);
		
		$siswa = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
			'tanggal_lahir' => $tanggal_lahir3,
			'prodi' => $prodi,
			'keahlian' => $keahlian,
			'detail' => $detail
		);
		
		$this->db->where(id, $id);
		$this->db->update('siswa', $siswa);
	}
	
	function update2($id,$data_input)
	{
		$this->db->where('id',$id);
		$this->db->update('siswa',$data_input);
	}	
}