<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= ($site) ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= ($BASE.'/'.$media_css.'/sb-admin-2/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/morrisjs/morris.css') ?>" rel="stylesheet">
    
    <!-- Bootstrap datetimepicker -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/bootstrap-datetimepicker/bootstrap-datetimepicker.css') ?>" rel="stylesheet">
    
    <!-- Bootstrap responsive -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/bootstrap-responsive/bootstrap-responsive.css') ?>" rel="stylesheet">
    
    <!-- Calendar -->
    <script src="<?= ($BASE.'/'.$media_js.'/calendar/calendar.js') ?>"></script>
    <link href="<?= ($BASE.'/'.$media_css.'/calendar/calendar.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= ($BASE.'/'.$media_vendor.'/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <?php echo $this->render($navigation,NULL,get_defined_vars(),0); ?>
        