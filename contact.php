<?php
require_once './load.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">

  <title>LRG | Contact</title>

</head>
<body>
  <main>
    <header class="main-header">
      <h2 class="hidden">Header</h2>

      <?php include_once './includes/nav.php' ?>

      <div class="landing">

        <div class="landing-img contact"></div>

        <div class="landing-info">
          <h2>
            <span class="dark-text">contact</span><br>
            <span class="big-text">us</span>
          </h2>
          <p>If you are interested in becoming a hockey official, enter the required information and send to get your officiating career started</p>
        </div>

      </div>
    </header>

    <section class="contact-con">

      <div>
        <div class="contact-info">
          <p>Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.<br><br>
            You will hear back from us within an amount of time. Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.<br><br>
            Privacy information Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.
          </p>
        </div>
      </div>

      <div class="form-con">
        <form id="contact-form" class="contact" method="post" action="">

          <div class="input-con">
            <label for="subject">Subject</label>
            <select name="subject" id="subject">
              <option selected value="General Inquiry">General Inquiry</option>
              <option value="Junior Mentorship">Junior Mentorship</option>
              <option value="Membership Application">Membership Application</option>
            </select>
          </div>

          <div class="input-con">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" placeholder="your name" required>
            <p>Invalid or empty, please try again.</p>
          </div>

          <div class="input-con">
            <label for="email">Your Name</label>
            <input type="email" name="email" id="email" placeholder="email" required>
            <p>Invalid or empty, please try again.</p>
          </div>

          <div class="input-con">
            <label for="subject">Subject</label>
            <textarea id="message" name="message" placeholder="message" required></textarea>
            <p>Invalid or empty, please try again.</p>
          </div>

          <button class="cta-button"><a href="">Send</a></button>

        </form>
      </div>

    </section>

    <!--! Footer -->
    <?php include_once './includes/footer.php' ?>
  </main>
</body>
</html>