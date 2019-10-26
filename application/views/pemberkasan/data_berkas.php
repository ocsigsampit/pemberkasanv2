		<div class="panel panel-default">
			<div class="panel-heading"><h4><strong>PEMINJAMAN BERKAS</strong></h4></div>
			<div class="panel-body">
				<div class="form-horizontal col-sm-12 col-lg-12">
					<p>Pencarian berdasarkan : </p>
					<!-- icheck Horizontal-->
					<fieldset class="radio-strip">
						<label class="checked">
							<input type="radio" class="pilihan_radio" name="pilihan_katakunci" id="kk_npwp" value="kk_npwp" checked>
							<span class="label-text">N P W P</span>
						</label>
						&nbsp;
						&nbsp;
						<label>
							<input type="radio" class="pilihan_radio" name="pilihan_katakunci" id="kk_namawp" value="kk_namawp">
							<span class="label-text">Nama Wajib Pajak</span>
						</label>
					</fieldset>
					<br/>
					<p>dengan kata kunci/NPWP : </p>
					<div class="form-group">
						<input class="form-control kapital" id="katakunci"/>
						<!--<input class="form-control kapital" id="nama_wp"/>-->
						<button class="btn btn-primary" id="tmb_cari_data"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Cari</button>
					</div>

				</div>
			</div>
		</div>
		<div class="panel panel-default">	
			<div class="panel-heading"><h4><strong>HASIL PENCARIAN</strong></h4></div>
			<div class="panel-body">
				<div id="load_display"></div>
				<div class="form-group">
					<div class="cek col-sm-12" id="wadah"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<p id="total_item" class="text-left"></p>
						<button class="btn btn-primary hidden" id="tmb_form_peminjaman"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Isi Formulir Peminjaman</button>
					</div>
				</div>
			</div>
		</div>