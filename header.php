<?php
include_once('db.php');
// session_start();
if(empty($_SESSION['adminId']))
{
    header("location: index.php?Please_enter_correct_username&password");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>HMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">

        <!-- light-box -->
        <link rel="stylesheet" href="dist/css/lightbox.min.css">
        <link rel="stylesheet" href="dist/css/lightbox.css">

        <!-- third party css -->
        <link href="css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- <title>Classic editor with fixed UI</title> -->
        <!-- <script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script> -->
      
        <script src="https://cdn.ckeditor.com/4.10.0/standard-all/ckeditor.js"></script>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        
          <!-- plugins css-->
        <link href="css/vendor/switchery.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/app.min.css" rel="stylesheet" type="text/css" />

        <!-- datepicker -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


    </head>

    <body>
        <style type="text/css">
            /*.img{
                width: 300px;
                height: 300px;
            }*/
            .img-fluid {
                max-width: 100%;
                height: 150px;
            }
        </style>