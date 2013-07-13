<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class waktu extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_waktu($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("waktu/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['waktu'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("waktu/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_waktu'] = $id_param;
			$get = $this->db->get_where("dlmbg_waktu",$where)->row();
			
			$d['waktu'] = $get->waktu;
			
			$d['id_param'] = $get->id_waktu;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("waktu/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_waktu'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['waktu'] = $this->input->post("waktu");
				
				$this->db->insert("dlmbg_waktu",$in);
			}
			else if($tipe=="edit")
			{
					$in['waktu'] = $this->input->post("waktu");
					$this->db->update("dlmbg_waktu",$in,$id);
			}
			
			redirect("admin/waktu");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_waktu'] = $id_param;
			$this->db->delete("dlmbg_waktu",$where);
			redirect("admin/waktu");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
