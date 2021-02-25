
<nav id="main-nav">
  <a class="logo" href="<?php echo ROOT_PATH .'/index.php'?>"></a>
  <ul :class="{'showNav' : showTheNav}">
    <li>
      <a href="<?php echo ROOT_PATH .'/index.php'?>">Home</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/about.php'?>">About</a>
    </li>

    <li class="dropdown">
      <div class="drop-toggle" @click.prevent="dropdownToggle" :class="{'line' : showDropdown}">
          <a href="">Programs</a>
          <div class="arrow" :class="{'flip' : showDropdown}"></div>
      </div>
      <div class="sub-menu" :class="{'showFlex' : showDropdown}">
        <a href="<?php echo ROOT_PATH .'/junior.php'?>">Junior</a>
        <a href="<?php echo ROOT_PATH .'/membership.php'?>">Membership</a>
      </div>
    </li>

    <li>
      <a href="<?php echo ROOT_PATH .'/events.php'?>">News</a>
    </li>
    <li>
      <a href="<?php echo ROOT_PATH .'/contact.php'?>">Contact</a>
    </li>
    <li class="cta-button">
      <a href="<?php echo ROOT_PATH .'/contact.php'?>">Apply Now</a>
    </li>
  </ul>

  <div @click="showNav" class="nav-btn" :class="{'showNav' : showTheNav}">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

</nav>
