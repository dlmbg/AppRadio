
	<!-- Main navigation bar
		================================================== -->
	<header class="navbar navbar-fixed-top" id="main-navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="logo" href="#"><img alt="Af_logo" src="<?php echo base_url().'asset/theme/'; ?>/dashboard/images/af-logo.png"></a>

				<a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-reorder"></span>
				</a>

				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Dashboard</a></li>
						<li class="divider-vertical"></li>
						<?php if($this->session->userdata("level")=="admin"){?>
						<li><a href="<?php echo base_url(); ?>admin/sistem"><i class="icon-wrench"></i> System</a></li>
						<li class="divider-vertical"></li>
						<?php } ?>
						<li><a href="<?php echo base_url(); ?>admin/pelanggan"><i class="icon-tasks"></i> Pelanggan</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo base_url(); ?>admin/hari"><i class="icon-leaf"></i> Hari</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo base_url(); ?>admin/waktu"><i class="icon-gift"></i> Waktu</a></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo base_url(); ?>admin/penyiar"><i class="icon-th"></i> Penyiar</a></li>
					</ul>
					<ul class="nav pull-right">
					<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
								<i class="icon-wrench"></i> Utility <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>admin/backup"><i class="icon-wrench"></i> Backup</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>admin/restore"><i class="icon-wrench"></i> Restore</a>
								</li>
							</ul>
						</li>
					<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
								<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user_login"); ?> <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>global/profil"><i class="icon-user"></i> Ubah Profil</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>global/password"><i class="icon-wrench"></i> Ubah Password</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url(); ?>login/login/logout"><i class="icon-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- / Main navigation bar -->
	
	<!-- Left navigation panel
		================================================== -->
	<nav id="left-panel">
		<div id="left-panel-content">
			<ul>
				<li>
					<a href="<?php echo base_url(); ?>admin/jadwal"><span class="icon-dashboard"></span>Jadwal</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/tarif"><span class="icon-file-alt"></span>Tarif Iklan</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/pemasangan"><span class="icon-font"></span> Pemasangan</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/transaksi_jadwal"><span class="icon-edit"></span>Transaksi Jadwal</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/pembayaran"><span class="icon-table"></span>Pembayaran</a>
				</li>
				<li class="lp-dropdown">
					<a href="#" class="lp-dropdown-toggle" id="laporan"><span class="icon-file-alt"></span>Data Laporan</a>
					<ul class="lp-dropdown-menu simple" data-dropdown-owner="laporan">
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_harian"><i class="icon-th"></i>&nbsp;&nbsp;Laporan Harian</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_mingguan"><i class="icon-signin"></i>&nbsp;&nbsp;Laporan Mingguan</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_bulanan"><i class="icon-file"></i>&nbsp;&nbsp;Laporan Bulanan</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>admin/laporan_daftar_tayang"><i class="icon-folder-open"></i>&nbsp;&nbsp;Laporan Daftar Tayang</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>admin/grafik"><span class="icon-th-large"></span>Grafik</a>
				</li>
						<?php if($this->session->userdata("level")=="admin"){?>
				<li>
					<a href="<?php echo base_url(); ?>admin/user"><span class="icon-cog"></span>Data User</a>
				</li>
						<?php } ?>
			</ul>
		</div>
		<div class="icon-caret-down"></div>
		<div class="icon-caret-up"></div>
	</nav>