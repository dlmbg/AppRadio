<script type="text/javascript">
function hitSisa()
{
	var pajak = document.getElementById("pajak").value;
	if(pajak=="")
	{
		var volume_tayang = document.getElementById("volume_tayang").value;
		var durasi_iklan = document.getElementById("durasi_iklan").value;
		var biaya = document.getElementById("biaya").value;
		var total = eval((volume_tayang*durasi_iklan*biaya));
		document.frm_pesan.jumlah_biaya.value = total;
	}
	else
	{
		var pajak = document.getElementById("pajak").value;
		var volume_tayang = document.getElementById("volume_tayang").value;
		var durasi_iklan = document.getElementById("durasi_iklan").value;
		var biaya = document.getElementById("biaya").value;
		var hit_pajak = eval(((volume_tayang*durasi_iklan*biaya)/100)*pajak);
		var total = eval((volume_tayang*durasi_iklan*biaya)+hit_pajak);
		var nominal_pajak = eval(hit_pajak);
		document.frm_pesan.jumlah_biaya.value = total;
		document.frm_pesan.hit_pajak.value = nominal_pajak;
	}
}
</script>
	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pemasangan Iklan | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pemasangan/simpan",'name="frm_pesan"'); ?>
				
				<label for="menu">Kode</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="id_transaksi_pemasangan" name="id_transaksi_pemasangan" value="<?php echo $kode; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">tanggal</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pelanggan</label>
				<div class="cleaner_h5"></div>
				<select name="kode_pelanggan" id="kode_pelanggan" style="width:90%;" data-placeholder="Pelanggan..." class="chzn-select2" style="width:400px;" tabindex="2">
					<option value=""></option>
					<?php 
					foreach($pelanggan->result_array() as $p)
					{
						if($kode_pelanggan==$p['kode_pelanggan'])
						{
							echo '<option value="'.$p['kode_pelanggan'].'" selected>'.$p['nama_pelanggan'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['kode_pelanggan'].'">'.$p['nama_pelanggan'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>

				<div id="isi" style="padding:10px;">
					<?php if($pajak!=""){ ?>
						Pajak : <input type="text" name="pajak" onchange="hitSisa();" id="pajak" value="<?php echo $pajak; ?>"> %
				<div class="cleaner_h10"></div>
						Nominal Pajak : <input type="text" name="hit_pajak" readonly id="hit_pajak" value="<?php echo $hit_pajak; ?>">
					<?php } else{ ?>
						<input type="hidden" name="pajak" id="pajak">
						<input type="hidden" name="hit_pajak" id="hit_pajak">
					<?php } ?>
				</div>
				
				<label for="menu">Iklan</label>
				<div class="cleaner_h5"></div>

			
				<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
				<select name="id_tarif_iklan" id="id_tarif_iklan" style="width:90%;" data-placeholder="Promo..." class="chzn-select" style="width:400px;" tabindex="2">
					<option value=""></option>
					<?php 
					foreach($tarif->result_array() as $p)
					{
						if($id_tarif_iklan==$p['id_tarif_iklan'])
						{
							echo '<option value="'.$p['id_tarif_iklan'].'" selected>'.$p['kategori'].' - '.$p['promo'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['id_tarif_iklan'].'">'.$p['kategori'].' - '.$p['promo'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Harga</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="biaya" name="biaya" onchange="hitSisa();" placeholder="biaya" value="<?php echo $harga_lain; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Durasi</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="durasi_iklan" onchange="hitSisa();" name="durasi_iklan" placeholder="Durasi Iklan" value="<?php echo $durasi_iklan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Volume Tayang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="volume_tayang" onchange="hitSisa();" name="volume_tayang" placeholder="volume tayang" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jumlah Biaya</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jumlah_biaya" onchange="hitSisa();" name="jumlah_biaya" placeholder="jumlah biaya" value="<?php echo $jumlah_biaya; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Uang Muka</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="uang_muka" name="uang_muka" placeholder="Uang Muka" value="<?php echo $uang_muka; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Status Pembayaran : <?php echo $stts; ?></label>
				<div class="cleaner_h5"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<input type="hidden" name="id_transaksi_jadwal" value="<?php echo $id_transaksi_jadwal; ?>" />
				<input type="hidden" style="width:90%;" id="volume_tayang" name="volume_tayang_temp" placeholder="volume tayang" value="<?php echo $volume_tayang; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
				<script type="text/javascript"> 
				$(".chzn-select").chosen().change(function(){ 
							var id_tarif_iklan = $("#id_tarif_iklan").val(); 
							$.ajax({ 
							url: "<?php echo base_url(); ?>admin/pemasangan/ambil_harga", 
							data: "id_tarif_iklan="+id_tarif_iklan, 
							cache: false, 
							success: function(msg){ 
								$("#biaya").val(msg);
							} 
						})
					});
				$(".chzn-select2").chosen().change(function(){ 
							var kode_pelanggan = $("#kode_pelanggan").val(); 
							$.ajax({ 
							url: "<?php echo base_url(); ?>admin/pemasangan/hitung_total", 
							data: "kode_pelanggan="+kode_pelanggan, 
							cache: false, 
							success: function(msg){ 
								$("#isi").html(msg);
							} 
						})
					});
				</script>
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>