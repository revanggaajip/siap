<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title><?= $this->renderSection('title'); ?> - <?= config('App')->name; ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/vendors/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/select2/css/select2.min.css'); ?>">
    <!-- Main styles for this application-->
    <link href="<?= base_url('css/style.min.css') ?>" rel="stylesheet">
    <?= $this->renderSection('styles'); ?>
</head>

<body>
    <?= $this->include('layouts/_partials/sidebar'); ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?= $this->include('layouts/_partials/header'); ?>
        <div class="body flex-grow-1 px-3">
            <?= $this->include('layouts/_partials/notification'); ?>
            <?= $this->renderSection('content'); ?>
        </div>
        <?= $this->include('layouts/_partials/footer'); ?>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('vendors/jquery/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('vendors/simplebar/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('vendors/select2/js/select2.min.js') ?>"></script>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>