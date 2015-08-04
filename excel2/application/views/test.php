<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Telkomsel</title>

    <link href="<?=base_url('assets/tablesorter/tablesorter.css'); ?>" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/css/simple-sidebar.css'); ?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="<?=base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/animate.css'); ?>" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="<?=base_url('assets/css/style.css'); ?>" rel="stylesheet">
	<link href="<?=base_url('assets/color/default.css'); ?>" rel="stylesheet">

    <script src="<?=base_url('assets/js/jquery.js'); ?>"></script>
    
    <script src="<?=base_url('assets/js/bootstrap.js'); ?>"></script>
    <link href="<?=base_url('assets/css/datepicker.css'); ?>" rel="stylesheet" type="text/css"> 
</head>
    <body>
        <table id="dataTable" class="table table-hover table-striped table-condensed"> 
            <thead style="background-color:#FF6666;"> 
            <tr> 
            <? foreach($data_test as $row => $val): ?>
                <th><?=$val;?></th>
            <? endforeach; ?>
            </tr> 
            </thead> 
            <tbody> 


            </tbody> 
        </table> 
    

    </body>
<script>
    function loadTable()
    {
        $('#dataTable tbody').fadeOut(200).empty();
        var url = '<?=site_url("admin/test_get_data"); ?>';
        $.get(url, function(data){
            var data_test = jQuery.parseJSON(data);
            //var data = data_test['data'];
            $.each(data_test['data_tab'], function (i,d) {

                var row='<tr>';
                row+='<tr>';

               $.each(d, function(j, e) {

                    row+='<td><b>'+e+'</b></td>';

               })

               row+='</tr>';
               $('#dataTable tbody').fadeIn(1000).append(row);

            })
        }); 
    };  
    
    $(document).ready(function() {
      loadTable();  
    });

</script>