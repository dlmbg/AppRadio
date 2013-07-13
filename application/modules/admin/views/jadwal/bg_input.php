	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Jadwal | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/jadwal/simpan"); ?>
				
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
				
				<label for="menu">Acara</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="acara" name="acara" placeholder="Nama Acara" value="<?php echo $acara; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<input type="hidden" name="id_waktu" value="<?php echo $id_waktu; ?>" />
				<input type="hidden" name="id_hari" value="<?php echo $id_hari; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>