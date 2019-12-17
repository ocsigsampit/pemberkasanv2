<div class="panel panel-default">
	<div class="panel-heading"><h4>DAFTAR PERMOHONAN PKP</h4><a href="<?=base_url('pkp/tambah');?>" class="btn btn-sm btn-primary">Tambah</a></strong></h4></div>
	<div class="panel-body">
		<table id="table-data" class='table display compact table-bordered table-condensed table-striped tbl-ga tablesorter'>
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">NAMA WAJIB PAJAK</th>
					<th class="text-center">N P W P</th>
				</tr>
			</thead>
			<tbody id="table-body">
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script>
$(function(){
	$("#table-data").tablesorter();
});
</script>