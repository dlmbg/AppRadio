	<section class="container">
	<script type="text/javascript">
		function hitSisa()
		{
			var total = document.getElementById("jumlah_harga").value;
			var bayar = document.getElementById("bayar").value;
			var sisa = eval(bayar-total);
			document.frm_pesan.kembalian.value = sisa;
		}
	</script>
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pembayaran | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pembayaran/simpan",'name="frm_pesan"'); ?>
				
				<label for="menu">Kode</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="id_transaksi_pemasangan" name="id_transaksi_pemasangan" value="<?php echo $id_transaksi_pemasangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal Bayar</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal" name="tanggal_bayar" placeholder="nama_pelanggan" value="<?php echo $tgl_bayar; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pelanggan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $alamat_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promo</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $promo; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kategori</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $kategori; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Total</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="uang muka" value="<?php echo $jumlah_biaya; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Uang Muka</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="uang muka" value="<?php echo $uang_muka; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Sisa Pembayaran</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jumlah_harga" name="jumlah_harga" placeholder="uang muka" value="<?php echo $sisa_bayar; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Dibayar</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="bayar" name="bayar" placeholder="dibayar" onChange="hitSisa()" value="<?php echo $dibayar; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kembalian</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="kembalian" placeholder="kembali" value="<?php echo $dibayar-$sisa_bayar; ?>" />
				<div class="cleaner_h10"></div>
				
				
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="vol" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>