	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Hari | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/hari/simpan"); ?>
				
				<label for="menu">Hari</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="hari" name="hari" placeholder="Nama Hari" value="<?php echo $hari; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>