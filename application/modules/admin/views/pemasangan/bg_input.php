	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pemasangan Iklan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pemasangan/simpan"); ?>
				
				<label for="menu">Kode</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="id_transaksi_pemasangan" name="id_transaksi_pemasangan" value="<?php echo $kode; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">tanggal</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pelanggan</label>
				<div class="cleaner_h5"></div>
				<select name="kode_pelanggan" style="width:100%;">
					<?php 
					foreach($pelanggan->result_array() as $p)
					{
						if($kode_pelanggan==$p['kode_pelanggan'])
						{
							echo '<option value="'.$p['kode_pelanggan'].'" selected>'.$p['nama_pelanggan'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['kode_pelanggan'].'">'.$p['nama_pelanggan'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Iklan</label>
				<div class="cleaner_h5"></div>
				<select name="id_tarif_iklan" style="width:100%;">
					<?php 
					foreach($tarif->result_array() as $p)
					{
						if($id_tarif_iklan==$p['id_tarif_iklan'])
						{
							echo '<option value="'.$p['id_tarif_iklan'].'" selected>'.$p['st'].' - '.$p['promo'].' - Rp. '.$p['prime_time'].' - Rp. '.$p['regular_time'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['id_tarif_iklan'].'">'.$p['st'].' - '.$p['promo'].' - Rp. '.$p['prime_time'].' - Rp. '.$p['regular_time'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Durasi</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="durasi_iklan" name="durasi_iklan" placeholder="Durasi Iklan" value="<?php echo $durasi_iklan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Volume Tayang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="volume_tayang" name="volume_tayang" placeholder="volume tayang" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jumlah Biaya</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jumlah_biaya" name="jumlah_biaya" placeholder="jumlah biaya" value="<?php echo $jumlah_biaya; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Uang Muka</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="uang_muka" name="uang_muka" placeholder="Uang Muka" value="<?php echo $uang_muka; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<input type="hidden" name="id_transaksi_jadwal" value="<?php echo $id_transaksi_jadwal; ?>" />
				<input type="hidden" style="width:90%;" id="volume_tayang" name="volume_tayang_temp" placeholder="volume tayang" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>