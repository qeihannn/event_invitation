<?php
  session_start();

  $notification = $_SESSION['notificaton'] ?? null;
  if ($notification) {
    unset($_SESSION['notification']);
  }

  if (isset($_SESSION["username"]) || isset($_SESSION["role"])) {
    $_SESSION['notiication'] = [
      'type' => 'danger',
      'message' => 'Silakan Logout Terlebih Dahulu!'
      ];
      header('Location: ../dashboard.php');
  }

      if (isset($_SESSION["username"]) || isset($_SESSION["role"])) {
    $_SESSION['notiication'] = [
      'type' => 'danger',
      'message' => 'Silakan Logout Terlebih Dahulu!'
      ];
      header('Location: ../dashboard.php');
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>IdeKreatif</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
  <body>
    <!-- Content -->
    <?php include '../.includes/toast_notification.php'; ?>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">