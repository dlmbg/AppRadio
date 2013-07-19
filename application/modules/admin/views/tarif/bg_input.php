	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Tarif Iklan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/tarif/simpan"); ?>
				
				<label for="menu">Promo Item</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="promo" name="promo" placeholder="promo" value="<?php echo $promo; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">kategori</label>
				<div class="cleaner_h5"></div>
				<?php $a=''; $b='';
					if($kategori=="Prime Time"){$a='selected'; $b='';}
					else if($kategori=="Regular Time"){$a=''; $b='selected';}
				?>
				<select name="kategori">
					<option value="Prime Time" <?php echo $a; ?>>Prime Time</option>
					<option value="Regular Time" <?php echo $b; ?>>Regular Time</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">biaya</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="biaya" name="biaya" placeholder="biaya" value="<?php echo $biaya; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">keterangan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="keterangan" name="keterangan" placeholder="keterangan" value="<?php echo $keterangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>