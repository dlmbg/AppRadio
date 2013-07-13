	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-wrench"></span> Pelanggan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("admin/pelanggan/simpan",'class="form-horizontal"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Nama Pelanggan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $nama_pelanggan; ?>" name="nama_pelanggan" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Telepon</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $telepon; ?>" name="telepon" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Alamat</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $alamat; ?>" name="alamat" required />
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
			  <input type="hidden" name="st" value="<?php echo $st; ?>" />
			<?php echo form_close(); ?> 
				</div>
			</div>
		</section>