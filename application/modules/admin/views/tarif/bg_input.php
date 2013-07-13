	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Tarif Iklan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/tarif/simpan"); ?>
				
				<label for="menu">Jenis</label>
				<div class="cleaner_h5"></div>
				<?php $a=''; $b='';
					if($st=="Tarif Iklan Program"){$a='selected'; $b='';}
					else if($st=="Tarif Iklan Kontrak Bulanan"){$a=''; $b='selected';}
				?>
				<select name="st">
					<option value="Tarif Iklan Program" <?php echo $a; ?>>Tarif Iklan Program</option>
					<option value="Tarif Iklan Kontrak Bulanan" <?php echo $b; ?>>Tarif Iklan Kontrak Bulanan</option>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promo Item</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="promo" name="promo" placeholder="promo" value="<?php echo $promo; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">durasi</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="durasi" name="durasi" placeholder="durasi" value="<?php echo $durasi; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">prime time</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="prime_time" name="prime_time" placeholder="prime time" value="<?php echo $prime_time; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">regular time</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="regular_time" name="regular_time" placeholder="Regular Time" value="<?php echo $regular_time; ?>" />
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