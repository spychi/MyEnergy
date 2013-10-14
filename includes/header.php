<?php

    function getHTMLHeader ( $pageID ) {

        $return = '
            <!DOCTYPE html>
            <html>
            <head>
                <title>MyEnergy</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- Bootstrap -->
                <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

                <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                <script src="../../assets/js/html5shiv.js"></script>
                <script src="../../assets/js/respond.min.js"></script>
                <![endif]-->
            </head>
            <body id="'.$pageID.'">
        ';

       return $return;

    }


