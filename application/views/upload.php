<form action="<?= base_url() ?>upload/proses" enctype="multipart/form-data" method="post">
	<input type="file" name="files[]" multiple="">
	<input type='submit' value='Upload' name='upload' />
</form>