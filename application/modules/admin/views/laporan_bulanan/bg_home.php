	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> Laporan Bulanan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("admin/laporan_bulanan/set"); ?>

						<select name="bulanan">
						<?php for($i=1;$i<=12;$i++)
						{
							$add  = "" ;
							if($i<10){$add=0;}
							if($i==$this->session->userdata("bulanan"))
							{
								echo "<option value='".$add.$i."' selected>".$add.$i."</option>";
							}
							else
							{
								echo "<option value='".$add.$i."'>".$add.$i."</option>";
							}
						}
						?>
						</select>
						<select name="tahunan">
						<?php for($i=2011;$i<=date("Y");$i++)
						{
							if($i==$this->session->userdata("tahunan"))
							{
								echo "<option value='".$i."' selected>".$i."</option>";
							}
							else
							{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
						?>
						</select>

						<input type="submit" class="btn btn-inverse"> <a href="<?php echo base_url(); ?>admin/laporan_bulanan/cetak" class="btn btn-info">Cetak</a>
					<?php echo form_close(); ?>

					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>