<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_daftar_tayang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_daftar_tayang($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_daftar_tayang/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function cetak($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_transaksi_jadwal'] = $id_param;
			$get = $this->db->query("select * from dlmbg_transaksi_jadwal a left join (SELECT `id_transaksi_pemasangan`, `nama_pelanggan`, alamat_pelanggan, `promo`, `st`, `prime_time`, `regular_time`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan left join dlmbg_penyiar d on a.id_penyiar=d.id_penyiar where id_transaksi_jadwal='".$id_param."' ")->row();
			

			$d['penyiar'] = $this->db->get("dlmbg_penyiar");
			$d['hari'] = $this->db->get("dlmbg_hari");
			$d['waktu'] = $this->db->get("dlmbg_waktu");
			$d['detail'] = $this->db->get_where("dlmbg_detail_transaksi_jadwal",$where);

			$d['nama_pelanggan'] = $get->nama_pelanggan;
			$d['id_transaksi_pemasangan'] = $get->id_transaksi_pemasangan;
			$d['alamat_pelanggan'] = $get->alamat_pelanggan;
			$d['st'] = $get->st;
			$d['promo'] = $get->promo;
			$d['prime_time'] = $get->prime_time;
			$d['regular_time'] = $get->regular_time;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['id_penyiar'] = $get->id_penyiar;
			
			$d['id_param'] = $get->id_transaksi_jadwal;
			$d['tipe'] = "edit";
			
			$html = $this->load->view("laporan_daftar_tayang/bg_cetak",$d, true);
			pdf_create($html,time()."");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
