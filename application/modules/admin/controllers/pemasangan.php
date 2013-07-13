<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemasangan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_pemasangan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemasangan/bg_home");
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
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			$d['tarif'] = $this->db->get("dlmbg_tarif_iklan");
			$d['kode'] = $this->app_global_admin_model->getMaxKodePesanan();

			$d['tanggal'] = "";
			$d['kode_pelanggan'] = "";
			$d['id_tarif_iklan'] = "";
			$d['durasi_iklan'] = "";
			$d['volume_tayang'] = "";
			$d['jumlah_biaya'] = "";
			$d['uang_muka'] = "";
			$d['id_transaksi_jadwal'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemasangan/bg_input");
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
			$where['id_transaksi_pemasangan'] = $id_param;
			$get = $this->db->get_where("dlmbg_transaksi_pemasangan",$where)->row();
			$get_det = $this->db->get_where("dlmbg_transaksi_jadwal",$where)->row();
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			$d['tarif'] = $this->db->get("dlmbg_tarif_iklan");

			$d['id_transaksi_jadwal'] = $get_det->id_transaksi_jadwal;
			$d['tanggal'] = $get->tanggal;
			$d['kode_pelanggan'] = $get->kode_pelanggan;
			$d['id_tarif_iklan'] = $get->id_tarif_iklan;
			$d['durasi_iklan'] = $get->durasi_iklan;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['jumlah_biaya'] = $get->jumlah_biaya;
			$d['uang_muka'] = $get->uang_muka;
			$d['kode'] = $get->id_transaksi_pemasangan;
			
			$d['id_param'] = $get->id_transaksi_pemasangan;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemasangan/bg_input");
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
			$id['id_transaksi_pemasangan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_transaksi_pemasangan'] = $this->input->post("id_transaksi_pemasangan");
				$in['tanggal'] = $this->input->post("tanggal");
				$in['kode_pelanggan'] = $this->input->post("kode_pelanggan");
				$in['id_tarif_iklan'] = $this->input->post("id_tarif_iklan");
				$in['durasi_iklan'] = $this->input->post("durasi_iklan");
				$in['volume_tayang'] = $this->input->post("volume_tayang");
				$in['jumlah_biaya'] = $this->input->post("jumlah_biaya");
				$in['uang_muka'] = $this->input->post("uang_muka");
				
				$this->db->insert("dlmbg_transaksi_pemasangan",$in);

				$in_tr['id_transaksi_pemasangan'] = $in['id_transaksi_pemasangan'];
				$this->db->insert("dlmbg_transaksi_jadwal",$in_tr);

				$param = $this->db->insert_id();
				for($i=1;$i<=$in['volume_tayang'];$i++)
				{
					$in_det['id_transaksi_jadwal'] = $param;
					$this->db->insert("dlmbg_detail_transaksi_jadwal",$in_det);
				}

				$in_bayar['id_transaksi_pemasangan'] = $this->input->post("id_transaksi_pemasangan");
				$this->db->insert("dlmbg_pembayaran",$in_bayar);
			}
			else if($tipe=="edit")
			{
				$in['tanggal'] = $this->input->post("tanggal");
				$in['kode_pelanggan'] = $this->input->post("kode_pelanggan");
				$in['id_tarif_iklan'] = $this->input->post("id_tarif_iklan");
				$in['durasi_iklan'] = $this->input->post("durasi_iklan");
				$in['volume_tayang'] = $this->input->post("volume_tayang");
				$in['jumlah_biaya'] = $this->input->post("jumlah_biaya");
				$in['uang_muka'] = $this->input->post("uang_muka");

				$id_hapus['id_transaksi_jadwal'] = $this->input->post("id_transaksi_jadwal");

				$vol_temp = $this->input->post("volume_tayang_temp");
				if($in['volume_tayang']!=$vol_temp)
				{
					$this->db->delete("dlmbg_detail_transaksi_jadwal",$id_hapus);

					$param = $this->input->post("id_transaksi_jadwal");
					for($i=1;$i<=$in['volume_tayang'];$i++)
					{
						$in_det['id_transaksi_jadwal'] = $param;
						$this->db->insert("dlmbg_detail_transaksi_jadwal",$in_det);
					}
				}

				$this->db->update("dlmbg_transaksi_pemasangan",$in,$id);
			}
			
			redirect("admin/pemasangan");
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
			$where['id_transaksi_pemasangan'] = $id_param;
			$this->db->delete("dlmbg_transaksi_pemasangan",$where);
			$this->db->delete("dlmbg_pembayaran",$where);
			$this->db->delete("dlmbg_transaksi_jadwal",$where);
			redirect("admin/pemasangan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
