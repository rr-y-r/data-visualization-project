<html>
<head>
<title>Upload Form</title>
</head>
<body>
<?php echo $error;?>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<span>Click here to return to <a href="<?=site_url('admin/chart/'); ?>">3G PERFORMANCE MONITORING PAGE</a></span>

</body>
</html>