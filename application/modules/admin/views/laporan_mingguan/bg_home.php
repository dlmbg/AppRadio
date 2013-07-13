	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> Laporan Mingguan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("admin/laporan_mingguan/set"); ?>
						<input type="date" name="tgl_awal" value="<?php echo $this->session->userdata("mingguan_awal"); ?>"> 
						<input type="date" name="tgl_akhir" value="<?php echo $this->session->userdata("mingguan_akhir"); ?>"> 
						<input type="submit" class="btn btn-inverse"> <a href="<?php echo base_url(); ?>admin/laporan_mingguan/cetak" class="btn btn-info">Cetak</a>
					<?php echo form_close(); ?>

					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>