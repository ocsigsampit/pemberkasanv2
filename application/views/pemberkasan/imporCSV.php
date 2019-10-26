<?php if($this->session->flashdata('message')){?>
	<div align="center" class="alert alert-success">      
<?php echo $this->session->flashdata('message')?>
	</div>
<?php } ?>

<br><br>

<div align="center">
<form action="<?php echo base_url(); ?>pemberkasan/import" 
method="post" name="upload_excel" enctype="multipart/form-data">
<input type="file" name="berkas" id="file">
<button type="submit" id="submit" name="import">Import</button>
</form>
<br>
<div style="width:80%; margin:0 auto;" align="center">
<table id="t01">
  <tr>
    <th>Nama</th>
    <th>Email</th>
    <th>Input Date</th>
  </tr>
<?php
if(isset($data) && is_array($data) && count($data)): $i=1;
foreach ($data as $key => $data) { 
?>
  <tr>
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['email'] ?></td>
    <td><?php echo $data['input_date'] ?></td>
  </tr>
  <?php } endif; ?>
</table>
</div>
</div>