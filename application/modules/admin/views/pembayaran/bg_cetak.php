<table cellpadding="10" cellspacing="0">
	<tr>
		<td>Kode Pemesanan</td>
		<td>:</td>
		<td><?php echo $id_transaksi_pemasangan; ?></td>
	</tr>
	<tr>
		<td>Tanggal Bayar</td>
		<td>:</td>
		<td><?php echo $tgl_bayar; ?></td>
	</tr>
	<tr>
		<td>Nama Pelanggan</td>
		<td>:</td>
		<td><?php echo $nama_pelanggan; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $alamat_pelanggan; ?></td>
	</tr>
	<tr>
		<td>Jenis Iklan</td>
		<td>:</td>
		<td><?php echo $st; ?></td>
	</tr>
	<tr>
		<td>Promo</td>
		<td>:</td>
		<td><?php echo $promo; ?></td>
	</tr>
	<tr>
		<td>Prime Time</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($prime_time,2,",","."); ?></td>
	</tr>
	<tr>
		<td>Regular Time</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($regular_time,2,",","."); ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($jumlah_biaya,2,",","."); ?></td>
	</tr>
	<tr>
		<td>Uang Muka</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($uang_muka,2,",","."); ?></td>
	</tr>
	<tr>
		<td>Sisa Pembayaran</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($sisa_bayar,2,",","."); ?></td>
	</tr>
	<tr>
		<td>Dibayar</td>
		<td>:</td>
		<td>Rp. <?php echo number_format($dibayar,2,",","."); ?></td>
	</tr>
</table>
