<div class="panel panel-default">
	<div class="panel-heading"><h4>REKAM PEMOHONAN</h4></div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#tab_wp">Data Wajib Pajak</a></li>
			<li><a data-toggle="tab" href="#tab_pengurus">Data Penanggung Jawab</a></li>
		</ul>

		<div class="tab-content">
			&nbsp;&nbsp;&nbsp;
			<br/>
			<!-- Tab Data Wajib Pajak -->
			<div role="tabpanel" id="tab_wp" class="tab-pane fade in active">
				<div class="form-horizontal col-lg-12">
				<form id="form_data_wp">
					<div class="form-group">
						<label  class="col-lg-2 control-label">PILIH JENIS LAYANAN</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="jns_layanan" value="Pengukuhan PKP" readonly/>
						</div>
						<label  class="col-lg-2 control-label">JENIS WAJIB PAJAK</label>
						<div class="col-lg-5">
							<div class="radio-inline"> 
								<input type="radio" name="jenis_wp" id="opsi1" value="OP">&nbsp;Orang Pribadi 
							</div>
							<div class="radio-inline">
								<input type="radio" name="jenis_wp" id="opsi2" value="BADAN" checked>&nbsp;Badan
							</div>
							<div class="radio-inline">
								<input type="radio" name="jenis_wp" id="opsi2" value="CAB">&nbsp;Cabang 
							</div>
							<div class="radio-inline">
								<input type="radio" name="jenis_wp" id="opsi2" value="JO">&nbsp;JO 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">NO BPS</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="no_bps"/>
						</div>
						<label  class="col-lg-2 control-label">TGL BPS</label>
						<div class="col-lg-2">
							<input type="text" class="form-control text-center datepicker" name="tgl_bps" data-pmu-format="Y-m-d" value="<?=date('Y-m-d');?>"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">N P W P</label>
						<div class="col-lg-3">
							<input type="text" class="form-control mask-npwp" name="npwp" id="npwp"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">NAMA WAJIB PAJAK</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="nama_wp" name="nama_wp"/>
							<input type="hidden" id="status_permohonan" name="status_permohonan"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">ALAMAT WAJIB PAJAK</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="alamat1" name="alamat1"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">ALAMAT WAJIB PAJAK 1</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" id="alamat2" name="alamat2"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">TGL TERDAFTAR</label>
						<div class="col-lg-2">
							<input type="text" class="form-control text-center datepicker" id="tgl_daftar" name="tgl_daftar" data-pmu-format="Y-m-d"/>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">KLU</label>
						<div class="col-lg-1">
							<input type="text" class="form-control" id="kode_klu" name="kode_klu"/>
						</div>
						<div class="col-lg-6">
							<textarea class="form-control" name="uraian_klu" id="uraian_klu"></textarea>
						</div>
						<div class="col-lg-2">
							<input type="hidden" id="status_klu" name="status_klu"/>
							<!--<button id="btn_simpan_klu" class="btn btn-sm btn-info">Simpan KLU</button>-->
						</div>
					</div>
				</form>
				</div>	
			</div>
			<!-- end of Tab Data Wajib Pajak -->
			
			<!-- Tab Pengurus -->
			<div role="tabpanel" id="tab_pengurus" class="tab-pane fade in">
				<p>Data Pengurus</p>
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label">No Akta</label>
							<div class="col-lg-1">
								<input type="text" class="form-control" id="no_akta" name="no_akta"/>
							</div>
							<label  class="col-lg-2 control-label">Tempat Akta</label>
							<div class="col-lg-3">
								<input type="text" class="form-control" id="tempat_akta" name="tempat_akta"/>
							</div>
							<label  class="col-lg-2 control-label">Tgl Akta</label>
							<div class="col-lg-2">
								<input type="text" class="form-control text-center datepicker" id="tgl_akta" name="tgl_akta" data-pmu-format="Y-m-d"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label">Notaris</label>
							<div class="col-lg-5">
								<input type="text" class="form-control" id="notaris" name="notaris"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label"></label>
							<div class="col-lg-5">
								<button id="tmb_simpan_data_akta" class="btn btn-sm btn-info">Simpan Data Akta</button>
							</div>
						</div>
					</div>
				</div>
				
				<div id="form_pengurus">
					<div class="form-horizontal col-lg-12" id="wadah">
						<div class="row">
							<div class="form-group">
								<label  class="col-lg-1 control-label">Pengurus 1</label>
								<div class="col-lg-4">
									<input type="text" class="form-control nama_pengurus" name="nama_pengurus" placeholder="Nama Pengurus"/>
								</div>
								<div class="col-lg-2">
									<input type="text" class="form-control nik_pengurus" name="nik_pengurus"  placeholder="NIK" maxlength="16"/>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control mask-npwp npwp_pengurus" name="npwp_pengurus"  placeholder="NPWP"/>
								</div>
								<div class="col-lg-1">
									<button class="btn btn-sm btn-info tambah_baris">Tambah</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label">NO LHP</label>
							<div class="col-lg-2">
								<input type="text" class="form-control text-center" id="no_lhp" name="no_lhp"/>
							</div>
							<label  class="col-lg-1 control-label">TGL LHP</label>
							<div class="col-lg-2">
								<input type="text" class="form-control text-center datepicker" id="tgl_lhp" name="tgl_lhp" data-pmu-format="Y-m-d" value="<?=date('Y-m-d');?>"/>
							</div>
							<div class="col-lg-2">
								<button id="tmb_simpan_data_lhp" class="btn btn-sm btn-info">Simpan Data LHP</button>	
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label"></label>
							<div class="col-lg-5">
								<button id="tmb_simpan_data_wp" class="btn btn-sm btn-info">Simpan Data WP</button>	
							</div>
						</div>
					</div>
				</div>
				<div class="form-horizontal col-lg-12">
					<div class="row">
						<div class="form-group">
							<label  class="col-lg-1 control-label"></label>
							<div class="col-lg-5">
								<button id="tmb_simpan_data_pengurus" class="btn btn-sm btn-info">Simpan Data Pengurus</button>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of Tab Pengurus -->
		</div>
	</div>
</div>