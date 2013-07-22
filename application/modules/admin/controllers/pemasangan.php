<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemasangan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!="")
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
		if($this->session->userdata("logged_in")!="")
		{
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			$d['tarif'] = $this->db->order_by("kategori","ASC")->get("dlmbg_tarif_iklan");
			$d['kode'] = $this->app_global_admin_model->getMaxKodePesanan();

			$d['tanggal'] = "";
			$d['kode_pelanggan'] = "";
			$d['id_tarif_iklan'] = "";
			$d['durasi_iklan'] = "";
			$d['volume_tayang'] = "";
			$d['jumlah_biaya'] = "";
			$d['uang_muka'] = "";
			$d['harga_lain'] = "";
			$d['id_transaksi_jadwal'] = "";
			$d['pajak'] = "";
			$d['stts'] = "Belum Lunas";
			
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
		if($this->session->userdata("logged_in")!="")
		{
			$where['id_transaksi_pemasangan'] = $id_param;
			$get = $this->db->get_where("dlmbg_transaksi_pemasangan",$where)->row();
			$get_det = $this->db->get_where("dlmbg_transaksi_jadwal",$where)->row();
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			$d['tarif'] = $this->db->order_by("kategori","ASC")->get("dlmbg_tarif_iklan");

			$d['id_transaksi_jadwal'] = $get_det->id_transaksi_jadwal;
			$d['tanggal'] = $get->tanggal;
			$d['kode_pelanggan'] = $get->kode_pelanggan;
			$d['id_tarif_iklan'] = $get->id_tarif_iklan;
			$d['durasi_iklan'] = $get->durasi_iklan;
			$d['volume_tayang'] = $get->volume_tayang;
			$d['jumlah_biaya'] = $get->jumlah_biaya;
			$d['uang_muka'] = $get->uang_muka;
			$d['jenis_iklan'] = $get->jenis_iklan;
			$d['kode'] = $get->id_transaksi_pemasangan;
			$d['stts'] = $get->stts;
			$d['pajak'] = $get->pajak;
			$d['harga_lain'] = $get->harga_lain;
			
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

   public function ambil_harga()
   {
   		if($this->session->userdata("logged_in")!="")
		{
			$kd['id_tarif_iklan'] = $_GET["id_tarif_iklan"];
			$q = $this->db->get_where("dlmbg_tarif_iklan",$kd)->row();
			echo $q->biaya;
		}

   }

   public function hitung_total()
   {
   		if($this->session->userdata("logged_in")!="")
		{
			$kd['kode_pelanggan'] = $_GET["kode_pelanggan"];
			$q = $this->db->get_where("dlmbg_pelanggan",$kd)->row();
			if($q->jenis=="Perusahaan")
			{
				echo "Pajak : <input type='text' name='pajak' id='pajak' onchange='hitSisa();'>";
			}
			else
			{
				echo "<input type='hidden' name='pajak' id='pajak'>";
			}

		}

   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!="")
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
				$in['jenis_iklan'] = $this->input->post("jenis_iklan");
				$in['pajak'] = $this->input->post("pajak");

				$in['stts'] = "Belum Lunas";
				if($in['uang_muka']>=$in['jumlah_biaya'])
				{
					$in['stts'] = "Lunas";
				}
				$in['harga_lain'] = $this->input->post("biaya");
				
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
				$in['jenis_iklan'] = $this->input->post("jenis_iklan");
				$in['pajak'] = $this->input->post("pajak");


				$in['stts'] = "Belum Lunas";
				if($in['uang_muka']>=$in['jumlah_biaya'])
				{
					$in['stts'] = "Lunas";
				}
				$in['harga_lain'] = $this->input->post("biaya");

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
 
   public function set()
   {
		if($this->session->userdata("logged_in")!="")
		{
			$id['cari_data'] = $this->input->post("key");
			$this->session->set_userdata($id);
			
			redirect("admin/pemasangan");
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
