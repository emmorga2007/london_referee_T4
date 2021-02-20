<?php
require_once './load.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>London Referee Group</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <main>
    <header class="header">
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
          <h2>become part of the team</h2>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis fugit amet repellendus tempore, nihil ut!</p>
          <div class="cta-button">
            <a href="">Learn More</a>
          </div>
        </div>

      </div>
    </header>

    <section class="brief-con">

      <div class="brief-img-con">
        <img src="" alt="">
      </div>

      <div class="brief-info">
        <h2>Who is LRG</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
        <div class="cta-button">
          <a href="">Learn More</a>
        </div>
      </div>

    </section>

    <section class="member-con">
      <div class="angle-img">
        <img src="" alt="">
      </div>
      <div class="member-info adult">
        <h2>Membership</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
        <div class="cta-button">
          <a href="">Learn More</a>
        </div>
      </div>
    </section>

    <section class="member-con">
      <div class="angle-img">
        <img src="" alt="">
      </div>
      <div class="member-info junior">
        <h2>Junior Mentorship</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
        <div class="cta-button">
          <a href="">Learn More</a>
        </div>
      </div>
    </section>

    <section class="brief-con">
      <div class="brief-info">
        <h2>Who We Serve</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque deserunt exercitationem in minus aut, iusto accusamus voluptatem et cupiditate eveniet!</p>
      </div>

  <!-- Make Vue or PHP Render List -->
      <div class="brief-img-con">
        <a href="">
          <img src="images/HAlliance.png" alt="">
        </a>
        <a href="">
          <img src="images/Hockey_Canada.png" alt="">
        </a>
        <a href="">
          <img src="images/logo_smallOHMA.png" alt="">
        </a>
        <a href="">
          <img src="images/OHA.png" alt="">
        </a>
        <a href="">
          <img src="images/ohf.png" alt="">
        </a>
        <a href="">
          <img src="images/SportAbility.png" alt="">
        </a>
      </div>
    </section>


    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
  <script src="js/main.js" type="module"></script>
</body>
</html>