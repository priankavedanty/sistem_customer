<?php

require 'function.php';

?>

<style>
	@media print {
		input.noPrint {
			display: none;
		}
	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">


	<caption>
		<h3>CV. NAMPI REJEKI <br>
			Jl. Rajawali 14 Selemadeg Tabanan <br>
			Telp. 0362819533</h3>
		<hr>
		<h3>LAPORAN PEMESANAN</h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Pelanggan</th>
			<th>Alamat</th>
			<th>Jumlah transaksi</th>
			<th>Total transaksi</th>
		</tr>
	</thead>
	<tbody>
		<?php


		$no = 1;
		$sql = $conn->query("SELECT * FROM tb_pemesanan order by id_laporan asc ");
		while ($data = mysqli_fetch_array($sql))

		?>
		<tr>
			<td style="text-align: center;"><?php echo $no++; ?></td>
			<td style="text-align: center;"><?php echo $data['nama']; ?></td>
			<td style="text-align: center;"><?php echo $data['alamat']; ?></td>
			<td style="text-align: center;"><?php echo "Rp" . "&nbsp" . number_format($data['jumlah_transaksi']); ?></td>
			<td style="text-align: center;"><?php echo "Rp" . "&nbsp" . number_format($data['total_transaksi']); ?></td>

		</tr>

	</tbody>

</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Tabanan, <?php echo date("d M Y"); ?> <br>
	Mengetahui <br>
	Direktur CV NAMPI REJEKI <br><br><br><br>
	Hanadi </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">