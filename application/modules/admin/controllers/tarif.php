<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tarif extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_tarif($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("tarif/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['promo'] = "";
			$d['kategori'] = "";
			$d['biaya'] = "";
			$d['keterangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("tarif/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_tarif_iklan'] = $id_param;
			$get = $this->db->get_where("dlmbg_tarif_iklan",$where)->row();
			
			$d['promo'] = $get->promo;
			$d['kategori'] = $get->kategori;
			$d['biaya'] = $get->biaya;
			$d['keterangan'] = $get->keterangan;
			
			$d['id_param'] = $get->id_tarif_iklan;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("tarif/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$tipe = $this->input->post("tipe");
			$id['id_tarif_iklan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['promo'] = $this->input->post("promo");
				$in['biaya'] = $this->input->post("biaya");
				$in['kategori'] = $this->input->post("kategori");
				$in['keterangan'] = $this->input->post("keterangan");
				
				$this->db->insert("dlmbg_tarif_iklan",$in);
			}
			else if($tipe=="edit")
			{
				$in['promo'] = $this->input->post("promo");
				$in['biaya'] = $this->input->post("biaya");
				$in['kategori'] = $this->input->post("kategori");
				$in['keterangan'] = $this->input->post("keterangan");
					$this->db->update("dlmbg_tarif_iklan",$in,$id);
			}
			
			redirect("admin/tarif");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_tarif_iklan'] = $id_param;
			$this->db->delete("dlmbg_tarif_iklan",$where);
			redirect("admin/tarif");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
