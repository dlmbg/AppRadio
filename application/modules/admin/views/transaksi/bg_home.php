	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> Transaksi Pemasangan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
			<?php echo form_open("admin/transaksi_jadwal/set"); ?>
			<input type="text" class="input-xlarge" value="<?php echo $this->session->userdata("cari_data"); ?>" name="key" />
			<input type="submit" value="Cari Data" class="btn" />
			<?php echo form_close(); ?>
					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>