
<nav id="main-nav">
  <a class="logo" href="<?php echo ROOT_PATH .'/index.php'?>"></a>
  <ul>
    <li>
      <a href="<?php echo ROOT_PATH .'/index.php'?>">Home</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/about.php'?>">About</a>
    </li>

    <li class="dropdown">
      <div class="drop-toggle" @click.prevent="dropdownToggle">
        <a>Programs</a>
        <div class="arrow"></div>
      </div>
      <div class="sub-menu" :class="{'showFlex' : showDropdown}">
        <a href="<?php echo ROOT_PATH .'/junior.php'?>">Junior</a>
        <a href="<?php echo ROOT_PATH .'/membership.php'?>">Membership</a>
      </div>
    </li>

    <li>
      <a href="<?php echo ROOT_PATH .'/events.php'?>">Announcements</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/contact.php'?>">Contact</a>
    </li>
    <li class="cta-button">
      <a href="<?php echo ROOT_PATH .'/contact.php'?>">Apply Now</a>
    </li>
  </ul>
</nav>
