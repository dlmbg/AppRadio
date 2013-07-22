<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_jadwal extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_transaksi($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("transaksi/bg_home");
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
			$where['id_transaksi_jadwal'] = $id_param;
			$get = $this->db->query("select * from dlmbg_transaksi_jadwal a left join (SELECT `id_transaksi_pemasangan`, `nama_pelanggan`, alamat_pelanggan, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan left join dlmbg_penyiar d on a.id_penyiar=d.id_penyiar where id_transaksi_jadwal='".$id_param."' ")->row();
			

			$d['penyiar'] = $this->db->get("dlmbg_penyiar");
			$d['hari'] = $this->db->get("dlmbg_hari");
			$d['waktu'] = $this->db->get("dlmbg_waktu");
			$d['acara_ms'] = $this->db->get("dlmbg_acara");
			$d['detail'] = $this->db->get_where("dlmbg_detail_transaksi_jadwal",$where);

			$d['nama_pelanggan'] = $get->nama_pelanggan;
			$d['id_transaksi_pemasangan'] = $get->id_transaksi_pemasangan;
			$d['alamat_pelanggan'] = $get->alamat_pelanggan;
			$d['promo'] = $get->promo;
			$d['kategori'] = $get->kategori;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['id_penyiar'] = $get->id_penyiar;
			
			$d['id_param'] = $get->id_transaksi_jadwal;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("transaksi/bg_input");
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
			$id['id_transaksi_jadwal'] = $this->input->post("id_param");

			$in['id_penyiar'] = $this->input->post("id_penyiar");
			$this->db->update("dlmbg_transaksi_jadwal",$in,$id);

			$vol = $this->input->post("vol");

			for($i=0;$i<$vol;$i++)
			{
				$id_up['id_detail_transaksi_jadwal'] = $_POST['id_detail_transaksi_jadwal'][$i];

				$in_det['id_hari'] = $_POST['id_hari'][$i];
				$in_det['id_waktu'] = $_POST['waktu'][$i];
				$in_det['tanggal'] = $_POST['tanggal'][$i];
				$in_det['acara'] = $_POST['acara'][$i];

				$this->db->update("dlmbg_detail_transaksi_jadwal",$in_det,$id_up);
			}
			
			redirect("admin/transaksi_jadwal");
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
			$id['cari_data'] = $this->input->post("key");
			$this->session->set_userdata($id);
			
			redirect("admin/transaksi_jadwal");
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
