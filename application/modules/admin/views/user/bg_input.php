	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Status | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/user/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama_user" name="nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Username</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Password</label>
				<div class="cleaner_h5"></div>
				<input type="password" style="width:90%;" id="password" name="password" placeholder="Password" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Level</label>
				<div class="cleaner_h5"></div>
				<?php
					$a=''; $d='';
					if($level=="admin"){$a='selected'; $d='';}
					else if($level=="kasir"){$a=''; $d='selected';}
				?>
					<select name="level">
						<option value="admin" <?php echo $a; ?>>Admin</option>
						<option value="kasir" <?php echo $d; ?>>Ka'sir</option>
					</select>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>