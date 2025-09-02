<?php

include 'config.php';

include "init_session.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard &mdash; Event Invitation</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon/1.webp" />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />


    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    

    <link rel="stylesheet" href="assets/vendor/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    
    <link rel="stylesheet" href="assets/vendor/css/summernote.min.css">
    
    <script src="assets/vendor/js/helpers.js"></script>
    
    <script src="assets/js/config.js"></script>
  </head>
  <body>
    
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "sidemenu.php"; ?>
    
        <div class="layout-page">
          <?php include "navbar.php"; ?>
    
          <div class="content-wrapper">
    