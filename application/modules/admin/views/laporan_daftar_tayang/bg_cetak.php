
<table cellpadding="10" cellspacing="0">
	<tr>
		<td>Kode Pemesanan</td>
		<td>:</td>
		<td><?php echo $id_transaksi_pemasangan; ?></td>
	</tr>
	<tr>
		<td>Pelanggan</td>
		<td>:</td>
		<td><?php echo $nama_pelanggan; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $alamat_pelanggan; ?></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>:</td>
		<td><?php echo $kategori; ?></td>
	</tr>
	<tr>
		<td>Promo</td>
		<td>:</td>
		<td><?php echo $promo; ?></td>
	</tr>
	<tr>
		<td>Penyiar</td>
		<td>:</td>
		<td>
			<select name="id_penyiar">
					<?php 
					foreach($penyiar->result_array() as $p)
					{
						if($id_penyiar==$p['id_penyiar'])
						{
							echo '<option value="'.$p['id_penyiar'].'" selected>'.$p['penyiar'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['id_penyiar'].'">'.$p['penyiar'].'</option>';
						}
					}	
					?>
				</select>
		</td>
	</tr>
</table>
			

				<table class='table table-striped table-bordered bootstrap-datatable datatable' cellpadding="7">
					<tr>
						<td>Hari</td>
						<td>Tanggal</td>
						<td>Jam</td>
						<td>Disisipkan Pada Acara</td>
					</tr>
					<?php $i=1; foreach($detail->result_array() as $d){ ?>
					<tr>
						<td>
							<select name="id_hari[]">
								<?php 
								foreach($hari->result_array() as $h)
								{
									if($d['id_hari']==$h['id_hari'])
									{
										echo '<option value="'.$h['id_hari'].'" selected>'.$h['hari'].'</option>';
									}
									else
									{
										echo '<option value="'.$h['id_hari'].'">'.$h['hari'].'</option>';
									}
								}	
								?>
							</select>
						</td>
						<td><?php echo $d['tanggal']; ?></td>
						<td><select name="waktu[]">
								<?php 
								foreach($waktu->result_array() as $w)
								{
									if($d['id_waktu']==$w['id_waktu'])
									{
										echo '<option value="'.$w['id_waktu'].'" selected>'.$w['waktu'].'</option>';
									}
									else
									{
										echo '<option value="'.$w['id_waktu'].'">'.$w['waktu'].'</option>';
									}
								}	
								?>
							</select></td>
						<td>
							<div id="acara-<?php echo $i; ?>">
							<?php
								$kd['id_waktu'] = $d['id_waktu'];
								$kd['id_hari'] = $d["id_hari"];
								$get = $this->db->select("*")->join("dlmbg_acara","dlmbg_acara.id_acara=dlmbg_jadwal.id_acara")->get_where("dlmbg_jadwal",$kd);
								$q = $get->row();
								if($get->num_rows()>0)
								{
									echo $q->acara;
									echo "<input type='hidden' name='acara[]' id='acara' value='".$q->id_acara."'>";
								}
								else
								{
									echo "Tidak ada acara di menu jadwal";
									echo "<input type='hidden' name='acara[]' id='acara' value=''>";
								}
							?>
						</div>
						</td>
						<input type="hidden" name="id_detail_transaksi_jadwal[]" value="<?php echo $d['id_detail_transaksi_jadwal']; ?>" />
					</tr>
					<?php $i++; } ?>
				</table>
				
				