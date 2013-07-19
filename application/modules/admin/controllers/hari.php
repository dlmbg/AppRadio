<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hari extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_hari($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hari/bg_home");
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
			$d['hari'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hari/bg_input");
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
			$where['id_hari'] = $id_param;
			$get = $this->db->get_where("dlmbg_hari",$where)->row();
			
			$d['hari'] = $get->hari;
			
			$d['id_param'] = $get->id_hari;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("hari/bg_input");
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
			$id['id_hari'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['hari'] = $this->input->post("hari");
				
				$this->db->insert("dlmbg_hari",$in);
			}
			else if($tipe=="edit")
			{
					$in['hari'] = $this->input->post("hari");
					$this->db->update("dlmbg_hari",$in,$id);
			}
			
			redirect("admin/hari");
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
			$where['id_hari'] = $id_param;
			$this->db->delete("dlmbg_hari",$where);
			redirect("admin/hari");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
