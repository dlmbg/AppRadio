	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Transaksi Jadwal | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/transaksi_jadwal/simpan"); ?>
				
				<label for="menu">Kode</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="id_transaksi_pemasangan" name="id_transaksi_pemasangan" value="<?php echo $id_transaksi_pemasangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pelanggan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $alamat_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kategori</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $kategori; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promo</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $promo; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Penyiar</label>
				<div class="cleaner_h5"></div>
				<select name="id_penyiar" style="width:100%;">
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
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pemasangan Jadwal</label>
				<div class="cleaner_h5"></div>
				<div class="cleaner_h10"></div>

				<table class='table table-striped table-bordered bootstrap-datatable datatable'>
					<tr>
						<td>Hari</td>
						<td>Tanggal</td>
						<td>Jam</td>
						<td>Disisipkan Pada Acara</td>
					</tr>
					<?php foreach($detail->result_array() as $d){ ?>
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
						<td><input type="date" name="tanggal[]" value="<?php echo $d['tanggal']; ?>"></td>
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

						<select name="acara[]" style="width:100%;">
							<?php 
							foreach($acara_ms->result_array() as $p)
							{
								if($acara==$p['id_acara'])
								{
									echo '<option value="'.$p['id_acara'].'" selected>'.$p['acara'].'</option>';
								}
								else
								{
									echo '<option value="'.$p['id_acara'].'">'.$p['acara'].'</option>';
								}
							}	
							?>
						</select>
						</td>
						<input type="hidden" name="id_detail_transaksi_jadwal[]" value="<?php echo $d['id_detail_transaksi_jadwal']; ?>" />
					</tr>
					<?php } ?>
				</table>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="vol" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>