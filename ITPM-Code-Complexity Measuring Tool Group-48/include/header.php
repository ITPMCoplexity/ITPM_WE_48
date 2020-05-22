<?php
$cookie_name = "UID";
$cookie_value = "User";
setcookie($cookie_name, $cookie_value,time() + (86400), "/"); // 86400 = 1 day
?>

<?php include 'include/db.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Code Complexity Measuring Tools G48</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<!--end::Fonts -->


        <!--begin::Page Vendors Styles(used by this page)
        <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
-->

        <!-- MDBootstrap Datatables  -->
        <link href="assets/mdb/css/addons/datatables2.min.css" rel="stylesheet">

        <!--begin::Page Custom Styles(used by login page) -->
        <link href="assets/css/pages/login/login-5.css" rel="stylesheet" type="text/css" />
		
		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />




        
        <style>
            @import url('https://fonts.googleapis.com/css?family=Fira+Code&display=swap');


            .overlay {
                height: 0%;
                width: 100%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0, 0.9);
                overflow-y: hidden;
                transition: 0.5s;
            }

            .overlay-content {
                position: relative;
                top: 25%;
                width: 120%;
                padding-left: 10%;
                padding-right: 20%;
                text-align: center;
                margin-top: 30px;
            }

            .overlay a {
                padding: 8px;
                text-decoration: none;
                font-size: 20px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .overlay a:hover, .overlay a:focus {
                color: #f1f1f1;
            }

            .overlay .closebtn {
                position: relative;
                top: 0px;

                font-size: 30px;
            }

            @media screen and (max-height: 450px) {
                .overlay {overflow-y: auto;}
                .overlay a {font-size: 20px}
                .overlay .closebtn {
                    font-size: 40px;
                    top: 15px;
                    right: 35px;
                }
            }

            .pointerImageChart {cursor: pointer;}

            #chart-container {
                width: 100%;
                height: auto;
            }

        </style>



        
	</head>

	<!-- end::Head -->
