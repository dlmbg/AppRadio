<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restore extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Controller untuk manajemen restore data ke database
	 **/
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
 			$this->load->view("bg_header");
 			$this->load->view("bg_menu");
 			$this->load->view("restore/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'app');
			}
			else
			{
				header('location:'.base_url().'front');
			}
		}
	}
	
	public function upload()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$acak=rand(00000000000,99999999999);
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
			$nama_murni=date('Ymd-His');
			$ekstensi_kotor = $pisah[1];
			
			$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
			$file_type_baru = strtolower($file_type);
			
			$ubah=$acak; //tanpa ekstensi
			$n_baru = $ubah.'.'.$file_type_baru;
			
			$in['gbr'] = $n_baru;
		
			$config['upload_path'] = './asset/db-temp/';
			$config['allowed_types'] = 'txt';
			$config['max_size'] = '1000000';
			$config['max_width'] = '100';
			$config['max_height'] = '100';		
			$config['file_name'] = $n_baru;						
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload())
			{
				echo $this->upload->display_errors();
			}
			else 
			{
				$this->db->query("TRUNCATE TABLE dlmbg_detail_transaksi_jadwal");
				$this->db->query("TRUNCATE TABLE dlmbg_hari");
				$this->db->query("TRUNCATE TABLE dlmbg_jadwal");
				$this->db->query("TRUNCATE TABLE dlmbg_pelanggan");
				$this->db->query("TRUNCATE TABLE dlmbg_pembayaran");
				$this->db->query("TRUNCATE TABLE dlmbg_penyiar");
				$this->db->query("TRUNCATE TABLE dlmbg_setting");
				$this->db->query("TRUNCATE TABLE dlmbg_tarif_iklan");
				$this->db->query("TRUNCATE TABLE dlmbg_transaksi_jadwal");
				$this->db->query("TRUNCATE TABLE dlmbg_transaksi_pemasangan");
				$this->db->query("TRUNCATE TABLE dlmbg_user");
				$this->db->query("TRUNCATE TABLE dlmbg_waktu");
				$direktori = "./asset/db-temp/".$config['file_name'];
				$isi_file=file_get_contents($direktori);
				$string_query=rtrim($isi_file, "\n;" );
				$array_query=explode(";", $string_query);
				foreach($array_query as $query)
				{
					$this->db->query($query);
				}
				unlink($direktori);
				header('location:'.base_url().'admin/restore');
			}
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'app');
			}
			else
			{
				header('location:'.base_url().'front');
			}
		}
	}
}

/* End of file restore.php */
/* Location: ./application/controllers/restore.php */