<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_pembayaran($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pembayaran/bg_home");
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
			$where['id_pembayaran'] = $id_param;
			$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, alamat_pelanggan, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan where a.id_pembayaran='".$id_param."' ")->row();
			

			$d['id_transaksi_pemasangan'] = $get->id_transaksi_pemasangan;
			$d['jumlah_biaya'] = $get->jumlah_biaya;
			$d['tgl_bayar'] = $get->tanggal_bayar;
			$d['nama_pelanggan'] = $get->nama_pelanggan;
			$d['alamat_pelanggan'] = $get->alamat_pelanggan;
			$d['kategori'] = $get->kategori;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['promo'] = $get->promo;
			$d['uang_muka'] = $get->uang_muka;
			$d['sisa_bayar'] = $get->jumlah_biaya-$get->uang_muka;
			$d['dibayar'] = $get->dibayar;
			
			$d['id_param'] = $get->id_pembayaran;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pembayaran/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function cetak($id_param)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_pembayaran'] = $id_param;
			$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, alamat_pelanggan, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan where a.id_pembayaran='".$id_param."' ")->row();
			

			$d['id_transaksi_pemasangan'] = $get->id_transaksi_pemasangan;
			$d['jumlah_biaya'] = $get->jumlah_biaya;
			$d['tgl_bayar'] = $get->tanggal_bayar;
			$d['nama_pelanggan'] = $get->nama_pelanggan;
			$d['alamat_pelanggan'] = $get->alamat_pelanggan;
			$d['promo'] = $get->promo;
			$d['kategori'] = $get->kategori;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['promo'] = $get->promo;
			$d['uang_muka'] = $get->uang_muka;
			$d['sisa_bayar'] = $get->jumlah_biaya-$get->uang_muka;
			$d['dibayar'] = $get->dibayar;
			
			$d['id_param'] = $get->id_pembayaran;
			$d['tipe'] = "edit";
			
			$html = $this->load->view("pembayaran/bg_cetak",$d, true);
			pdf_create($html,time()."");
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
			$id['id_pembayaran'] = $this->input->post("id_param");

			$in['tanggal_bayar'] = $this->input->post("tanggal_bayar");
			$in['dibayar'] = $this->input->post("bayar");
			$this->db->update("dlmbg_pembayaran",$in,$id);

			$id_up['id_transaksi_pemasangan'] = $this->input->post("id_transaksi_pemasangan");
			$in_up['stts'] = "Lunas";
			$this->db->update("dlmbg_transaksi_pemasangan",$in_up,$id_up);
			
			redirect("admin/pembayaran");
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
			$where['id_transaksi_transaksi'] = $id_param;
			$this->db->delete("dlmbg_transaksi_transaksi",$where);
			redirect("admin/transaksi");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
