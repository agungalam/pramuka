<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Profile Gerakan Pramuka</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $assets; ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo $assets; ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo $assets; ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo $assets; ?>assets/css/custom.css" rel="stylesheet" />
    <link href="<?php echo $assets; ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo $assets; ?>assets/css/style.css">
    <style>
        .tb {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // session_start();
    // if (($_SESSION['status'] == 'user') || 1==1) { ?>
        <style>
            .tema {
                background-color: orange;
            }
        </style>
    <?php //} ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top tema" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand tema" style="padding-bottom:20px;" href="index.php">
                    <h3>KWARAN IBUN</h3>
                </a>
            </div>
        </nav>