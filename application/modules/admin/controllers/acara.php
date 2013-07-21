<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acara extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_acara($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("acara/bg_home");
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
			$d['acara'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("acara/bg_input");
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
			$where['id_acara'] = $id_param;
			$get = $this->db->get_where("dlmbg_acara",$where)->row();
			
			$d['acara'] = $get->acara;
			
			$d['id_param'] = $get->id_acara;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("acara/bg_input");
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
			$id['id_acara'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['acara'] = $this->input->post("acara");
				
				$this->db->insert("dlmbg_acara",$in);
			}
			else if($tipe=="edit")
			{
					$in['acara'] = $this->input->post("acara");
					$this->db->update("dlmbg_acara",$in,$id);
			}
			
			redirect("admin/acara");
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
			$where['id_acara'] = $id_param;
			$this->db->delete("dlmbg_acara",$where);
			redirect("admin/acara");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
