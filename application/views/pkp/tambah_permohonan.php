<div class="panel panel-default">
	<div class="panel-heading"><h4>REKAM PEMOHONAN</h4></div>
	<div class="panel-body">
		<div class="tab-content">
			<div class="form-horizontal col-lg-10">
				<form id="form_permohonan">
					<div class="form-group">
						<label  class="col-lg-4 control-label">PILIH JENIS LAYANAN</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="jns_layanan" value="<?=$permohonan;?>" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-4 control-label">NO BPS</label>
						<div class="col-lg-5">
							<input type="text" class="form-control bps_pkp" name="no_bps"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-4 control-label">TGL BPS</label>
						<div class="col-lg-2">
							<input type="text" class="form-control text-center datepicker" name="tgl_bps" data-pmu-format="Y-m-d"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-4 control-label">N P W P</label>
						<div class="col-lg-4">
							<input type="text" class="form-control mask-npwp" name="npwp" id="npwp"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-4 control-label">NAMA WAJIB PAJAK</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="nama_wp"/>
						</div>
					</div>
					<div class="form-group">
						<button id="tmb_simpan_permohonan" class="btn btn-sm btn-info">Simpan Permohonan</button>
					</div>
				</form>
			</div>	
		</div>
	</div>
</div>