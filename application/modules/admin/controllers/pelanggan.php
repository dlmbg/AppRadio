<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pelanggan extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "active";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['data_retrieve'] = $this->app_global_admin_model->indexs_data_pelanggan($GLOBALS['site_limit_medium'],$uri);
			

 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pelanggan/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "active";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['id_param'] = "";
			$d['nama_pelanggan'] = "";
			$d['alamat'] = "";
			$d['telepon'] = "";
			$d['st'] = "tambah";

 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pelanggan/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "active";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$id['kode_pelanggan'] = $id_param;
			$get = $this->db->get_where("dlmbg_pelanggan",$id)->row();
			$d['id_param'] = $get->kode_pelanggan;
			$d['nama_pelanggan'] = $get->nama_pelanggan;
			$d['alamat'] = $get->alamat_pelanggan;
			$d['telepon'] = $get->telepon;
			$d['st'] = "edit";
			

 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pelanggan/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_pelanggan'] = $_POST['id_param'];
			$dt['nama_pelanggan'] = $_POST['nama_pelanggan'];
			$dt['alamat_pelanggan'] = $_POST['alamat'];
			$dt['telepon'] = $_POST['telepon'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_pelanggan",$dt);
				redirect("admin/pelanggan");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_pelanggan",$dt,$id);
				redirect("admin/pelanggan");
			}
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_pelanggan'] = $id_param;
			$get = $this->db->delete("dlmbg_pelanggan",$id);
			redirect("admin/pelanggan");
		}
		else
		{
			redirect("login");
		}
	}
}
