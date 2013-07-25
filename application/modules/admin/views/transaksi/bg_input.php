<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Transaksi Jadwal | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/transaksi_jadwal/simpan"); ?>
				
				<label for="menu">Kode</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="id_transaksi_pemasangan" name="id_transaksi_pemasangan" value="<?php echo $id_transaksi_pemasangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pelanggan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $alamat_pelanggan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kategori</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $kategori; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promo</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="tanggal" name="tanggal" placeholder="alamat" value="<?php echo $promo; ?>" />
				<div class="cleaner_h10"></div>
				
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
				
				<label for="menu">Pemasangan Jadwal</label>
				<div class="cleaner_h5"></div>
				<div class="cleaner_h10"></div>

				<table class='table table-striped table-bordered bootstrap-datatable datatable'>
					<tr>
						<td>Hari</td>
						<td>Tanggal</td>
						<td>Jam</td>
						<td>Disisipkan Pada Acara</td>
					</tr>
					<?php $i=1; 
					foreach($detail->result_array() as $d){ ?>
					<tr>
						<td>
							<select name="id_hari[]" id="id_hari-<?php echo $i; ?>" data-placeholder="Hari..." class="chzn-select-<?php echo $i; ?>"  tabindex="2">
								<option value=""></option>
								<?php 
								foreach($hari->result_array() as $h)
								{
									if($d['id_hari']==$h['id_hari'])
									{
										echo '<option value="'.$h['id_hari'].'" selected>'.$h['hari'].'</option>';
									}
									else
									{
										echo '<option value="'.$h['id_hari'].'">'.$h['hari'].'</option>';
									}
								}	
								?>
							</select>
						</td>
						<td><input type="date" name="tanggal[]" value="<?php echo $d['tanggal']; ?>"></td>
						<td><select name="waktu[]" id="waktu-<?php echo $i; ?>" data-placeholder="Waktu..." class="chzn-select-<?php echo $i; ?>"  tabindex="2">
								<option value=""></option>
								<?php 
								foreach($waktu->result_array() as $w)
								{
									if($d['id_waktu']==$w['id_waktu'])
									{
										echo '<option value="'.$w['id_waktu'].'" selected>'.$w['waktu'].'</option>';
									}
									else
									{
										echo '<option value="'.$w['id_waktu'].'">'.$w['waktu'].'</option>';
									}
								}	
								?>
							</select></td>
						<td>

						<div id="acara-<?php echo $i; ?>">
							<?php
								$kd['id_waktu'] = $d['id_waktu'];
								$kd['id_hari'] = $d["id_hari"];
								$get = $this->db->select("*")->join("dlmbg_acara","dlmbg_acara.id_acara=dlmbg_jadwal.id_acara")->get_where("dlmbg_jadwal",$kd);
								$q = $get->row();
								if($get->num_rows()>0)
								{
									echo $q->acara;
									echo "<input type='hidden' name='acara[]' id='acara' value='".$q->id_acara."'>";
								}
								else
								{
									echo "Tidak ada acara di menu jadwal";
									echo "<input type='hidden' name='acara[]' id='acara' value=''>";
								}
							?>
						</div>
						</td>
						<input type="hidden" name="id_detail_transaksi_jadwal[]" value="<?php echo $d['id_detail_transaksi_jadwal']; ?>" />
					</tr>

				<script type="text/javascript"> 
				$(".chzn-select-<?php echo $i; ?>").chosen().change(function(){ 
							var waktu = $("#waktu-<?php echo $i; ?>").val(); 
							var hari = $("#id_hari-<?php echo $i; ?>").val(); 
							$.ajax({ 
							url: "<?php echo base_url(); ?>admin/transaksi_jadwal/ambil_acara", 
							data: "waktu="+waktu+"&id_hari="+hari, 
							cache: false, 
							success: function(msg){ 
								$("#acara-<?php echo $i; ?>").html(msg);
							} 
						})
					});
				</script>
					<?php 
									$i++; } ?>
				</table>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="vol" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>