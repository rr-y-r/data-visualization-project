<!DOCTYPE html>
<html>
<body>
<?php echo $error;?>
<form action="<?=site_url('admin/doupload/'); ?>" method="post" enctype="multipart/form-data">
    Select Data to upload:
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>