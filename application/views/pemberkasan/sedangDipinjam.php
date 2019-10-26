<div class="panel panel-default">
	<div class="panel-heading"><h4>DAFTAR BERKAS DALAM PEMINJAMAN</h4></div>
	<div class="panel-body">
		<table id="table-data" class='table display compact table-bordered table-condensed table-striped tbl-ga tablesorter'>
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">N P W P</th>
					<th class="text-center">NAMA WP</th>
					<th class="text-center">PEMINJAM</th>
					<th class="text-center">TGL PINJAM</th>
				</tr>
			</thead>
			<tbody id="table-body">
			<?php
			$no=1;
			foreach($semua as $r){
				echo "<tr>";
				echo "<td class='text-center'>".$no."</td>";
				echo "<td class='text-center'>".$r->npwp."</td>";
				echo "<td class='text-left'>".$r->nama_wp."</td>";
				echo "<td class='text-left'>".$r->nama."</td>";
				echo "<td class='text-left'>".$r->tgl_pinjam."</td>";
				echo "</tr>";
				$no++;
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<script>
$(function(){
	$("#table-data").tablesorter();
});
</script>