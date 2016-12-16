<?php
include_once('header.php');
?>

<?php
if ($is_post) {
  $file_location = UPLOAD_DIR . basename($_FILES['file_to_upload']['name']);
  if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $file_location))
    echo('Archivo subido con éxito');
}
?>

<form action="pictures.php" method="post" enctype="multipart/form-data" onSubmit="if(document.getElementById('file_to_upload').value == '') return false;">
<input type="file" name="file_to_upload" id="file_to_upload" size="50" />
<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
<br />
<input type="submit" value="Subir archivo" />
</form>
<hr />

<div class="yoxview">
<?php
  $files = glob(UPLOAD_DIR . '*');
  foreach($files as $file) {
    if(is_file($file)) {
      ?>
      <a href="<?php echo $file?>"><img style="height:auto; width:auto; max-width:150px; max-height:150px;" src="<?php echo $file?>" /></a>
      <?php
    }
  }
?>
</div>
<script type="text/javascript" src="js/yoxview/yoxview-init.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$(".yoxview").yoxview();
	});
</script>

<?php
include_once('footer.inc');
?>
