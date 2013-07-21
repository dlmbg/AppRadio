	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> JAdwal | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<table border=1 cellpadding=5 cellspacing=0 width=100%>
					<?php
						echo "<tr><td>Waktu/Hari</td>";
						$hari  = $this->db->get("dlmbg_hari");
						foreach($hari->result() as $h)
						{
							echo "<td>".$h->hari."</td>";
						}
						echo "</tr>";
						$waktu  = $this->db->get("dlmbg_waktu");
						foreach($waktu->result() as $w)
						{
							echo "<tr>";
							echo "<td>".$w->waktu."</td>";
							$hari  = $this->db->get("dlmbg_hari");
							foreach($hari->result() as $h)
							{
								$cek['dlmbg_jadwal.id_hari'] = $h->id_hari;
								$cek['dlmbg_jadwal.id_waktu'] = $w->id_waktu;
								$g = $this->db->select("*")->join("dlmbg_detail_transaksi_jadwal","dlmbg_detail_transaksi_jadwal.id_detail_transaksi_jadwal=dlmbg_jadwal.id_acara")->get_where("dlmbg_jadwal",$cek)->num_rows();
								
								$g_det = $this->db->select("*")->join("dlmbg_detail_transaksi_jadwal","dlmbg_detail_transaksi_jadwal.id_detail_transaksi_jadwal=dlmbg_jadwal.id_acara")->join("dlmbg_penyiar","dlmbg_penyiar.id_penyiar=dlmbg_jadwal.id_penyiar")->join("dlmbg_acara","dlmbg_acara.id_acara=dlmbg_jadwal.id_acara")->get_where("dlmbg_jadwal",$cek)->row();
								if($g>0)
								{
									echo "<td>
									Penyiar : ".$g_det->penyiar."<br>
									Acara : ".$g_det->acara."<br>
									<a href='".base_url()."admin/jadwal/edit/".$w->id_waktu."/".$h->id_hari."' class='btn btn-small btn-danger'>Edit</a>
									<a href='".base_url()."admin/jadwal/hapus/".$w->id_waktu."/".$h->id_hari."' class='btn btn-small btn-inverse'>Hapus</a>
									</td>";
								}
								else
								{
									echo "<td><a href='".base_url()."admin/jadwal/tambah/".$w->id_waktu."/".$h->id_hari."' class='btn btn-small  btn-success'>Tambah</a></td>";
								}
							}
							echo "</tr>";
						}
					?>
					</table>
				</div>
			</div>
		</section>