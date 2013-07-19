<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penyiar extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_penyiar($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("penyiar/bg_home");
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
			$d['penyiar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("penyiar/bg_input");
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
			$where['id_penyiar'] = $id_param;
			$get = $this->db->get_where("dlmbg_penyiar",$where)->row();
			
			$d['penyiar'] = $get->penyiar;
			
			$d['id_param'] = $get->id_penyiar;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("penyiar/bg_input");
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
			$id['id_penyiar'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['penyiar'] = $this->input->post("penyiar");
				
				$this->db->insert("dlmbg_penyiar",$in);
			}
			else if($tipe=="edit")
			{
					$in['penyiar'] = $this->input->post("penyiar");
					$this->db->update("dlmbg_penyiar",$in,$id);
			}
			
			redirect("admin/penyiar");
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
			$where['id_penyiar'] = $id_param;
			$this->db->delete("dlmbg_penyiar",$where);
			redirect("admin/penyiar");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
