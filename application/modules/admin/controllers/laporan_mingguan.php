<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_mingguan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_mingguan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_mingguan/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function set()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$id['mingguan_awal'] = $this->input->post("tgl_awal");
			$id['mingguan_akhir'] = $this->input->post("tgl_akhir");
			$this->session->set_userdata($id);
			
			redirect("admin/laporan_mingguan");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function cetak($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_mingguan($GLOBALS['site_limit_small'],$uri);

			$html = $this->load->view("laporan_mingguan/bg_cetak",$d, true);
			pdf_create($html,time()."");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
