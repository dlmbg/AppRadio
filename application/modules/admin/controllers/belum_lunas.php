<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class belum_lunas extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_pemasangan_belum_lunas($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("belum_lunas/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
