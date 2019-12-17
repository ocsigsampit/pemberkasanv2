$(document).ready(function(){
	var base   = 'http://127.0.0.1:4001/pekape/';
	var total  = 0;
	var urutan = 2;
	
	$("#form_pengurus").hide();
	$("#tmb_simpan_data_akta").hide();
	$("#tmb_simpan_data_pengurus").hide();
	$("#btn_simpan_klu").hide();
	
	$('.mask-npwp').mask('00.000.000.0-000.000');
	
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true,
		todayHighlight: true
	});
	
	$('input').iCheck({
		checkboxClass: 'icheckbox_square',
		radioClass: 'iradio_square',
		increaseArea: '20%'
	});
	
	//Tombol "Simpan Data WP"
	$("#tmb_simpan_data_wp").click(function(){
		let data = $("#form_data_wp").serialize();
		
		$.ajax({
			url  : base + "/pkp/simpan_data_wp", 
			type : "POST",
			data : data,
			success: function(hasil){
				if(hasil === "1"){
					alert("Data Permohonan berhasil disimpan");
					$("#tmb_simpan_data_akta").show();
					$("#tmb_simpan_data_wp").hide();
				}else if(hasil === "11"){
					alert("Data Permohonan Baru berhasil disimpan");
					$("#tmb_simpan_data_akta").show();
					$("#tmb_simpan_data_wp").hide();
				}else if(hasil === "111"){
					alert("Data Permohonan Baru dan KLU Baru berhasil disimpan !");
					$("#tmb_simpan_data_akta").show();
					$("#tmb_simpan_data_wp").hide();
				}
			}
		});
	});

	//Tombol "Tambah Baris" form pengurus
	$("body").on("click",".tambah_baris", function(){
		let kerangka = `<div class="row" id="baris_pengurus${urutan}">
							<div class="form-group">
								<label  class="col-lg-1 control-label">Pengurus ${urutan}</label>
								<div class="col-lg-4">
									<input type="text" class="form-control nama_pengurus" name="nama_pengurus" placeholder="Nama Pengurus"/>
								</div>
								<div class="col-lg-2">
									<input type="text" class="form-control nik_pengurus" name="nik_pengurus"  placeholder="NIK"  maxlength="16"/>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control npwp_pengurus mask-npwp" name="npwp_pengurus"  placeholder="NPWP"/>
								</div>
								<div class="col-lg-2">
									<button class="btn btn-sm btn-info tambah_baris">Tambah</button>
									<button class="btn btn-sm btn-danger hapus_baris" baris="${urutan}">Hapus</button>
								</div>
							</div>
						</div>`;
		urutan++;
		$("#wadah").append(kerangka);
		$('.mask-npwp').mask('00.000.000.0-000.000');
		$('.nik_pengurus').attr("maxlength", "16");
	});
	
	//Tombol "Hapus Baris" form pengurus
	$("body").on("click",".hapus_baris",function(){
		const baris = $(this).attr("baris");
		$("#baris_pengurus" + baris).hide();
	});
	
	//Tombol "Simpan Data Pengurus"
	$("#tmb_simpan_data_pengurus").click(function(){
		var npwp_badan = $("#npwp").val();
		let arr_nama = [];
		let arr_nik  = [];
		let arr_npwp = [];
		
		//alert("npwp_badan : " + npwp_badan);

		$(".nama_pengurus").each(function(){
			arr_nama.push($(this).val());
		});
		
		$(".nik_pengurus").each(function(){
			arr_nik.push($(this).val());
		});
		
		$(".npwp_pengurus").each(function(){
			arr_npwp.push($(this).val());
		});
		
		$.post({
			type : "POST",
			url  : base + "/pkp/simpan_data_pengurus",
			data : {
				npwp_badan : npwp_badan,
				nama : arr_nama,
				nik  : arr_nik,
				npwp : arr_npwp
			},
			success : function(hasil){
				alert(hasil)
			}
		});
	});
	
	
	//AUTOCOMPLETE DATA NPWP
	$("#npwp").focusout(function(){
		var npwp = $(this).val();
		
		$.ajax({
			url  : base + "pkp/data_NPWP/",
			type : "POST",
			data : "npwp=" + npwp,
			success : function(hasil){
				var jsonHasil = JSON.parse(hasil);
				
				if(jsonHasil.length > 0){
					
					var a = jsonHasil[0].nama;
					var b = jsonHasil[0].jenis_wp;
					var c = jsonHasil[0].alamat1;
					var d = jsonHasil[0].alamat2;
					var e = jsonHasil[0].alamat3;
					var f = jsonHasil[0].kode_klu;
					var g = jsonHasil[0].tgl_daftar;
					
					$("#nama_wp").val(a);
					$("#alamat1").val(c);
					$("#alamat2").val(d);
					$("#kode_klu").val(f);
					$("#tgl_daftar").val(g);
					
					$("#status_permohonan").val("ulang");
					
					$("#nama_wp").attr('readonly', true); 
					$("#alamat1").attr('readonly', true); 
					$("#alamat2").attr('readonly', true);
					$("#kode_klu").attr('readonly', true);
					$("#tgl_daftar").attr('disabled', true);
				}else{
					$("#nama_wp").focus();
				}
			}
			
		});
	});
	
	// Tombol "Simpan Data Akta"
	$("#tmb_simpan_data_akta").click(function(){
		var no_akta     = $("#no_akta").val();
		var tempat_akta = $("#tempat_akta").val();
		var tgl_akta    = $("#tgl_akta").val();
		var notaris     = $("#notaris").val();
		
		$.ajax({
			url  : base + "/pkp/simpan_akta", 
			type : "POST",
			data : "no_akta=" + no_akta + "&tempat_akta=" + tempat_akta + "&tgl_akta=" + tgl_akta + "&notaris=" + notaris,
			success : function(data){
				if(data == "1"){
					alert("Data Akta berhasil disimpan!");
					$("#form_pengurus").show();
					$("#tmb_simpan_data_pengurus").show();
					$("#tmb_simpan_data_akta").hide();
				}
			}
		});
	});
	
	//Tombol "Simpan Data LHP"
	$("#tmb_simpan_data_lhp").click(function(){
		var no_lhp   = $("#no_lhp").val();
		var tgl_lhp  = $("#tgl_lhp").val();
		
		$.ajax({
			url  : base + "/pkp/simpan_lhp", 
			type : "POST",
			data : "no_lhp=" + no_lhp + "&tgl_lhp=" + tgl_lhp,
			success : function(data){
				if(data == "1"){
					alert("Data LHP berhasil disimpan!");
					$("tmb_simpan_data_lhp").hide();
				}
			}
		});
	});
	
	// Cek kode KLU
	$("#kode_klu").focusout(function(){
		var kode_klu = $(this).val();
		
		$.ajax({
			url  : base + "pkp/data_KLU/",
			type : "POST",
			data : "kode_klu=" + kode_klu,
			success : function(hasil){
				var jsonHasil = JSON.parse(hasil);
				
				if(jsonHasil.length > 0){
					var a = jsonHasil[0].kode;
					var b = jsonHasil[0].uraian_klu;
					
					$("#status_klu").val("ulang");
					
					$("#uraian_klu").val(b);
					$("#uraian_klu").attr('readonly', true);
				}else{
					$("#uraian_klu").focus();
					//$("#btn_simpan_klu").show();
				}
			}
			
		});
	});

	
	//Tombol "Simpan KLU"
	$("body").on("click","#btn_simpan_klu",function(){
		//a.preventDefault();
		alert("Tes!");
		// var kode_klu   = $("#kode_klu").val();
		// var uraian_klu = $("#uraian_klu).val();
		
		// $.ajax({
			// url  : base + "/pkp/simpan_klu", 
			// type : "POST",
			// data : "kode_klu=" + kode_klu + "&uraian_klu=" + uraian_klu,
			// success : function(data){
				// if(data == "1"){
					// alert("Data KLU berhasil disimpan!");
					// $("#btn_simpan_klu").hide();
				// }
			// }
		// });
	});
});