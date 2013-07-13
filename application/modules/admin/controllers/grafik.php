<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik extends CI_Controller {

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
 			$this->load->view("grafik/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function set()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$set['tahun_chart'] = $this->input->post("tahun_chart");
			$this->session->set_userdata($set);
			
			redirect("admin/grafik");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
