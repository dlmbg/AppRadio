<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
 			$this->load->view("bg_header");
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah($id_waktu,$id_hari)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['id_penyiar'] = "";
			$d['acara'] = "";
			$d['id_waktu'] = $id_waktu;
			$d['id_hari'] = $id_hari;
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			$d['penyiar'] = $this->db->get("dlmbg_penyiar");
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_input");
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
			$where['id_hari'] = $id_param;
			$get = $this->db->get_where("dlmbg_hari",$where)->row();
			
			$d['hari'] = $get->hari;
			
			$d['id_param'] = $get->id_hari;
			$d['tipe'] = "edit";
			$d['penyiar'] = $this->db->get("dlmbg_penyiar");
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_input");
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
			$id['id_hari'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_waktu'] = $this->input->post("id_waktu");
				$in['id_hari'] = $this->input->post("id_hari");
				$in['id_penyiar'] = $this->input->post("id_penyiar");
				$in['acara'] = $this->input->post("acara");
				
				$this->db->insert("dlmbg_jadwal",$in);
			}
			else if($tipe=="edit")
			{
					$in['hari'] = $this->input->post("hari");
					$this->db->update("dlmbg_hari",$in,$id);
			}
			
			redirect("admin/jadwal");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_waktu,$id_hari)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_waktu'] = $id_waktu;
			$where['id_hari'] = $id_hari;
			$this->db->delete("dlmbg_jadwal",$where);
			redirect("admin/jadwal");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
