<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_user");

		$config['base_url'] = base_url() . 'superadmin/admin_dinas/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Superadmin Name</th>
					<th>Username</th>
					<th>Level</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user."</td>
					<td>".$h->username."</td>
					<td>".$h->level."</td><td>
					";
			if($this->session->userdata("level")=="admin"){
				$hasil .= "<a href='".base_url()."admin/user/edit/".$h->kode_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
				$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->kode_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a>";
			}
			$hasil .= "</td></tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pelanggan($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
					  <th>Telepon</th>
					  <th>jenis</th>
					  <th><a href='".base_url()."admin/pelanggan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_pelanggan");
		$config['base_url'] = base_url() . 'dashboard/pelanggan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("kode_pelanggan","DESC")->get("dlmbg_pelanggan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>
					<td class="center">'.$g->telepon.'</td>
					<td class="center">'.$g->jenis.'</td>
					<td class="center">';
			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/pelanggan/edit/'.$g->kode_pelanggan.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/pelanggan/hapus/'.$g->kode_pelanggan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_hari($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Hari</th>
					  <th><a href='".base_url()."admin/hari/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_hari");
		$config['base_url'] = base_url() . 'admin/hari/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_hari","DESC")->get("dlmbg_hari",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->hari.'</td>
					<td class="center">';
			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/hari/edit/'.$g->id_hari.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/hari/hapus/'.$g->id_hari.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_waktu($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>waktu</th>
					  <th><a href='".base_url()."admin/waktu/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_waktu");
		$config['base_url'] = base_url() . 'dashboard/waktu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_waktu","DESC")->get("dlmbg_waktu",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->waktu.'</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/waktu/edit/'.$g->id_waktu.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/waktu/hapus/'.$g->id_waktu.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_penyiar($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>penyiar</th>
					  <th><a href='".base_url()."admin/penyiar/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_penyiar");
		$config['base_url'] = base_url() . 'admin/penyiar/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_penyiar","DESC")->get("dlmbg_penyiar",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->penyiar.'</td>
					<td class="center">';
			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/penyiar/edit/'.$g->id_penyiar.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/penyiar/hapus/'.$g->id_penyiar.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_tarif($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Promo Item</th>
					  <th>Kategori</th>
					  <th>Biaya</th>
					  <th>Keterangan</th>
					  <th><a href='".base_url()."admin/tarif/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_tarif_iklan");
		$config['base_url'] = base_url() . 'admin/tarif/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_tarif_iklan","DESC")->get("dlmbg_tarif_iklan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->biaya.'</td>
					<td class="center">'.$g->keterangan.'</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/tarif/edit/'.$g->id_tarif_iklan.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/tarif/hapus/'.$g->id_tarif_iklan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}

						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pemasangan($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Biaya</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Status</th>
					  <th><a href='".base_url()."admin/pemasangan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->select("stts, id_transaksi_pemasangan, nama_pelanggan, kategori, biaya, durasi_iklan, volume_tayang, jumlah_biaya, uang_muka")->join("dlmbg_pelanggan", "dlmbg_pelanggan.kode_pelanggan=dlmbg_transaksi_pemasangan.kode_pelanggan")->join("dlmbg_tarif_iklan", "dlmbg_tarif_iklan.id_tarif_iklan=dlmbg_transaksi_pemasangan.id_tarif_iklan")->get("dlmbg_transaksi_pemasangan");

		$config['base_url'] = base_url() . 'admin/pemasangan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->select("stts, id_transaksi_pemasangan, nama_pelanggan, promo, kategori, biaya, durasi_iklan, volume_tayang, jumlah_biaya, uang_muka")->join("dlmbg_pelanggan", "dlmbg_pelanggan.kode_pelanggan=dlmbg_transaksi_pemasangan.kode_pelanggan")->join("dlmbg_tarif_iklan", "dlmbg_tarif_iklan.id_tarif_iklan=dlmbg_transaksi_pemasangan.id_tarif_iklan")->get("dlmbg_transaksi_pemasangan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.number_format($g->biaya,2,',','.').'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.$g->stts.'</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/pemasangan/edit/'.$g->id_transaksi_pemasangan.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/pemasangan/hapus/'.$g->id_transaksi_pemasangan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}

						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pemasangan_belum_lunas($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Biaya</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Status</th>
					  <th><a href='".base_url()."admin/pemasangan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->select("stts, id_transaksi_pemasangan, nama_pelanggan, kategori, biaya, durasi_iklan, volume_tayang, jumlah_biaya, uang_muka")->join("dlmbg_pelanggan", "dlmbg_pelanggan.kode_pelanggan=dlmbg_transaksi_pemasangan.kode_pelanggan")->join("dlmbg_tarif_iklan", "dlmbg_tarif_iklan.id_tarif_iklan=dlmbg_transaksi_pemasangan.id_tarif_iklan")->get_where("dlmbg_transaksi_pemasangan",array("stts"=>"Belum Lunas"));

		$config['base_url'] = base_url() . 'admin/pemasangan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->select("stts, id_transaksi_pemasangan, nama_pelanggan, promo, kategori, biaya, durasi_iklan, volume_tayang, jumlah_biaya, uang_muka")->join("dlmbg_pelanggan", "dlmbg_pelanggan.kode_pelanggan=dlmbg_transaksi_pemasangan.kode_pelanggan")->join("dlmbg_tarif_iklan", "dlmbg_tarif_iklan.id_tarif_iklan=dlmbg_transaksi_pemasangan.id_tarif_iklan")->get_where("dlmbg_transaksi_pemasangan",array("stts"=>"Belum Lunas"),$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.number_format($g->biaya,2,',','.').'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.$g->stts.'</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/pemasangan/edit/'.$g->id_transaksi_pemasangan.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/pemasangan/hapus/'.$g->id_transaksi_pemasangan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}

						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_transaksi($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Jenis Iklan</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Penyiar</th>
					  <th>Jadwal</th>
					  <th>Actions</th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_transaksi_jadwal");

		$config['base_url'] = base_url() . 'admin/transaksi_jadwal/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from dlmbg_transaksi_jadwal a left join (SELECT `id_transaksi_pemasangan`, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan left join dlmbg_penyiar d on a.id_penyiar=d.id_penyiar LIMIT ".$offset.",".$limit." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->penyiar.'</td>
					<td class="center">';

			$get_jadwal = $this->db->select("*")->join("dlmbg_hari","dlmbg_hari.id_hari=dlmbg_detail_transaksi_jadwal.id_hari")->join("dlmbg_waktu","dlmbg_waktu.id_waktu=dlmbg_detail_transaksi_jadwal.id_waktu")->join("dlmbg_acara","dlmbg_acara.id_acara=dlmbg_detail_transaksi_jadwal.acara")->get_where("dlmbg_detail_transaksi_jadwal",array("id_transaksi_jadwal"=>$g->id_transaksi_jadwal));

			foreach($get_jadwal->result() as $gj)
			{
				$hasil .= "<li>".$gj->hari." | ".$gj->tanggal." | ".$gj->waktu." | ".$gj->acara."</li>";
			}

			$hasil .= '</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/transaksi_jadwal/edit/'.$g->id_transaksi_jadwal.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>';
			}

						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pembayaran($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Jenis Iklan</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Bayar</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Bayar</th>
					  <th width=120>Actions</th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_transaksi_jadwal");

		$config['base_url'] = base_url() . 'admin/transaksi_jadwal/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan LIMIT ".$offset.",".$limit." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->tanggal.'</td>
					<td class="center">'.$g->tanggal_bayar.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.number_format($g->dibayar,2,',','.').'</td>
					<td class="center">';

			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/pembayaran/edit/'.$g->id_pembayaran.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-inverse" href="'.base_url().'admin/pembayaran/cetak/'.$g->id_pembayaran.'">
							<i class="halflings-icon edit halflings-icon"></i>  Cetak
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_laporan_harian($limit,$offset)
	{
		$hasil = "";
		$cari = "";
		if($this->session->userdata("harian")!="")
		{
			$cari = "where tanggal ='".$this->session->userdata("harian")."' ";
		}
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable' cellpadding='7'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Promo</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Bayar</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Bayar</th>
				  </tr>
			  </thead>";

		$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan ".$cari." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->tanggal.'</td>
					<td class="center">'.$g->tanggal_bayar.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.number_format($g->dibayar,2,',','.').'</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		return $hasil;
	}
	 
	public function generate_index_laporan_bulanan($limit,$offset)
	{
		$hasil = "";
		$cari = "";
		if($this->session->userdata("bulanan")!="" && $this->session->userdata("tahunan")!="")
		{
			$cari = "where tanggal like '%".$this->session->userdata("tahunan")."-".$this->session->userdata("bulanan")."%' ";
		}
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable' cellpadding='7'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Promo</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Bayar</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Bayar</th>
				  </tr>
			  </thead>";

		$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan ".$cari." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->tanggal.'</td>
					<td class="center">'.$g->tanggal_bayar.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.number_format($g->dibayar,2,',','.').'</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		return $hasil;
	}
	 
	public function generate_index_laporan_mingguan($limit,$offset)
	{
		$hasil = "";
		$cari = "";
		if($this->session->userdata("mingguan_awal")!="" && $this->session->userdata("mingguan_akhir")!="")
		{
			$cari = "where tanggal >='".$this->session->userdata("mingguan_awal")."' and tanggal <='".$this->session->userdata("mingguan_akhir")."' ";
		}
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable' cellpadding='7'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Promo</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Bayar</th>
					  <th>Biaya</th>
					  <th>Uang Muka</th>
					  <th>Bayar</th>
				  </tr>
			  </thead>";

		$get = $this->db->query("select * from dlmbg_pembayaran a left join (SELECT `id_transaksi_pemasangan`, tanggal, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan ".$cari." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->tanggal.'</td>
					<td class="center">'.$g->tanggal_bayar.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">'.number_format($g->uang_muka,2,',','.').'</td>
					<td class="center">'.number_format($g->dibayar,2,',','.').'</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		return $hasil;
	}
	 
	public function generate_index_laporan_daftar_tayang($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Pelanggan</th>
					  <th>Kategori</th>
					  <th>Promo</th>
					  <th>Durasi</th>
					  <th>Vol. Tayang</th>
					  <th>Penyiar</th>
					  <th>Biaya</th>
					  <th>Actions</th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_transaksi_jadwal");

		$config['base_url'] = base_url() . 'admin/transaksi_jadwal/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from dlmbg_transaksi_jadwal a left join (SELECT `id_transaksi_pemasangan`, `nama_pelanggan`, `promo`, `kategori`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka` FROM (`dlmbg_transaksi_pemasangan`) JOIN `dlmbg_pelanggan` ON `dlmbg_pelanggan`.`kode_pelanggan`=`dlmbg_transaksi_pemasangan`.`kode_pelanggan` JOIN `dlmbg_tarif_iklan` ON `dlmbg_tarif_iklan`.`id_tarif_iklan`=`dlmbg_transaksi_pemasangan`.`id_tarif_iklan`) b on a.id_transaksi_pemasangan=b.id_transaksi_pemasangan left join dlmbg_penyiar d on a.id_penyiar=d.id_penyiar LIMIT ".$offset.",".$limit." ");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->id_transaksi_pemasangan.'</td>
					<td class="center">'.$g->nama_pelanggan.'</td>
					<td class="center">'.$g->kategori.'</td>
					<td class="center">'.$g->promo.'</td>
					<td class="center">'.$g->durasi_iklan.'</td>
					<td class="center">'.$g->volume_tayang.'</td>
					<td class="center">'.$g->penyiar.'</td>
					<td class="center">'.number_format($g->jumlah_biaya,2,',','.').'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'admin/laporan_daftar_tayang/cetak/'.$g->id_transaksi_jadwal.'">
							<i class="halflings-icon edit halflings-icon"></i>  Cetak
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_acara($limit,$offset)
	{
		$hasil = "";
		$hasil .= "
			<table class='table table-striped table-bordered bootstrap-datatable datatable'>
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>acara</th>
					  <th><a href='".base_url()."admin/acara/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
				  </tr>
			  </thead>";
			  
		$tot_hal = $this->db->get("dlmbg_acara");
		$config['base_url'] = base_url() . 'admin/acara/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->order_by("id_acara","DESC")->get("dlmbg_acara",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td class="center">'.$g->acara.'</td>
					<td class="center">';
			if($this->session->userdata("level")=="admin"){
				$hasil .= '<a class="btn btn-info" href="'.base_url().'admin/acara/edit/'.$g->id_acara.'">
							<i class="halflings-icon edit halflings-icon"></i>  Edit
						</a>
						<a class="btn btn-danger" href="'.base_url().'admin/acara/hapus/'.$g->id_acara.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> Hapus
						</a>';
			}
						
					$hasil .= '</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

















	public function getMaxKodePesanan()
	{
		$q = $this->db->query("select MAX(RIGHT(id_transaksi_pemasangan,8)) as kd_max from dlmbg_transaksi_pemasangan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PS".$kd;
	}
	
	public function getMaxKodePembayaran()
	{
		$q = $this->db->query("select MAX(RIGHT(id_pembayaran,8)) as kd_max from dlmbg_pembayaran");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PM".$kd;
	}
	 
}
