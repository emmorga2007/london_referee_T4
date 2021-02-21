<?php
require_once './load.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LRG | Programs</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <main>
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="logo-con">
        <img src="images/logo.svg" alt="logo image">
      </div>

      <div class="landing">

        <div class="scene">
          <div class="character" data-depth="0.1" >
            <img class="char3" src="" alt="player">
          </div>
          <div class="character" data-depth="0.2">
            <img class="char2" src="" alt="player">
          </div>
          <div class="character" data-depth="0.3">
            <img class="char1" src="" alt="player">
          </div>
        </div>

        <div class="landing-info">

          <h2>
            <span class="dark-text">join</span> the<br>
            <span class="big-text">stripes</span>
          </h2>

          <p>We provide Referee services for leagues all over Ontario! Young and Old, we provide training camps for aspiring Refs. Easily sign up to become part of the London Referee's Group</p>
          <!-- <div class="cta-button"><a href="">Learn More</a></div> -->
        </div>

      </div>
    </header>

    <h1>Programs</h1>

    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main></body>
</html>