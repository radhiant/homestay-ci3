<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="60">

    <title>Homestay - <?= $judul ?></title>

    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/icon/logo_homestay-circle.png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Select datepicker -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/plugin/bdaterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css" />

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/loder.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/matahari.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
    .bangunan {
        background-color: #d3d3d3;
        border: #d3d3d3;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        position: relative;

    }

    .checkout {
        animation-name:anmcheckout; 
        animation-direction: alternate;
        animation-duration: 1s; 
        animation-iteration-count: infinite;
    }

    @keyframes anmcheckout {
        from {
            background-color: #858796;
        }

        to {
            background-color: #e74a3b;
        }
    }

    body {
        background-color: #646464;
    }

    .booked {
        transform: translate(-45px, -60px);
    }

    .relatip {
        position: relative;
    }

    .matahari {
        position: absolute;
        right: 0px;
    }

    .bg-langit {
        background-image: linear-gradient(#d9f4fb, #d9f4fb);
    }

    .bg-grey {
        background-color: #B0BEC5;
        border: #B0BEC5;
    }

    .pintu {
        position: absolute;
        width: 95%;
        height: 225px;
        bottom: -48px;
    }

    .jendela {
        height: 130px;
    }

    /* body::-webkit-scrollbar {
        display: none;
    } */

    .moto1 {
        position: absolute;
        z-index: 9999;
        top: -100px;
        animation-name: motor1;
        animation-duration: 4s;
        animation-iteration-count: infinite;

    }

    .moto2 {
        position: absolute;
        z-index: 9999;
        top: 0px;
        right: -150px;
        animation-name: motor2;
        animation-duration: 5s;
        animation-delay: 1s;
        animation-iteration-count: infinite;
    }

    .car1 {
        position: absolute;
        z-index: 9999;
        top: 35px;
        right: -350px;
        animation-name: car1;
        animation-duration: 6s;
        animation-delay: 2s;
        animation-iteration-count: infinite;
    }

    .car2 {
        position: absolute;
        z-index: 9999;
        top: -110px;
        left: -300px;
        animation-name: car2;
        animation-duration: 6s;
        animation-delay: 2s;
        animation-iteration-count: infinite;
    }

    .tree1 {
        position: absolute;
        z-index: 9999;
        top: -298px;
        left: -50px;
    }

    .tree2 {
        position: absolute;
        z-index: 9999;
        top: -297px;
        right: -50px;
    }

    .awan1 {
        position: absolute;
        left: -200px;
        top: 20px;
        z-index: 99999;
        -webkit-animation: awan1 19s ease-out -19s infinite alternate forwards;
    }

    .awan2 {
        position: absolute;
        left: -200px;
        top: 130px;
        -webkit-animation: awan1 23s ease-out -23s infinite alternate-reverse;
    }

    .awan3 {
        position: absolute;
        left: -200px;
        top: -60px;
        z-index: 9999;
        -webkit-animation: awan1 20s ease-out -30s infinite alternate forwards;
    }

    .pintu {
        background-image: url('<?= base_url() ?>assets/upload/default/pintu1.png');
        background-size: cover;
    }


    #stage {
        overflow: hidden;
        position: relative;
        perspective: 500px;
    }

    #road {
        opacity: .9;
        width: 120vw;
        height: 15vw;
        min-height: 200px;
        background: #888;

        background-size: 19vw auto;
        transform-origin: center top;
        transform: rotateX(45deg) translate(-20vw);
    }

    @keyframes stripemove {
        to {
            transform: rotateX(45deg) translate(0vw);
        }
    }

    #stripes {
        position: absolute;
        opacity: 0.5;
        top: 50%;
        width: 120vw;
        min-width: 60vw;
        height: 5%;
        background: repeating-linear-gradient(to right,
                white,
                white 8vw,
                transparent 8vw,
                transparent 20vw);
    }

    /* The animation code */
    @keyframes motor1 {
        from {
            transform: translateX(-200px);
        }

        to {
            transform: translateX(1500px);
        }
    }

    /* The animation code */
    @keyframes motor2 {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(-1650px);
        }
    }

    /* The animation code */
    @keyframes car1 {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(-1800px);
        }
    }

    /* The animation code */
    @keyframes car2 {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(2000px);
        }
    }

    /* The animation code */
    @keyframes awan1 {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(1500px);
        }
    }
    </style>

</head>


<body id="body" style="overflow-x: hidden; background-color:white">

    <!-- Page Wrapper -->
    <div id="wrapper bg-light">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <input type="hidden" value="<?= base_url() ?>" id="baseurl">