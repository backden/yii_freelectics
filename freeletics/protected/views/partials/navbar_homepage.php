<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-scroll">
  <style>
    .dot-scroll-vertical {
      /*              display: inline-block;*/
      padding: 2px;
      cursor: pointer;
    }
  </style>
  <!--bullet navigator container--> 
  <div class="bullet-vertical" style="position: absolute;bottom: 42%;right: 1px;">
    <!--bullet navigator item prototype--> 
    <div class="dot-scroll-vertical"><i class="fa fa-circle" ref="#intro"></i></div>
    <a href="#intro" class="btn btn-square btn-top-scroll">
      <i class="fa fa-chevron-up animated"></i>
    </a>
  </div>
</div>

<!--    <div class="dotstyle dotstyle-flip" style="position: absolute; right: 1px; z-index: 999;">
      <h2>Flip</h2>
      <ul>
        <li class=" current"><a href="#">intro</a></li>
        <li><a href="#">section1</a></li>
        <li><a href="#">section2</a></li>
        <li class=""><a href="#">section3</a></li>
        <li><a href="#">section4</a></li>
        <li><a href="#">section5</a></li>
      </ul>
    </div>-->

<nav class="navbar navbar-custom navbar-fixed-top nav-menu-fixed" role="navigation" style="background-color: black">
  <div class="container top-fixed open-header-scroll">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <div class="icon-socials">
        <a class=""><i class="fa fa-bitbucket"></i></a>
        <a class=""><i class="fa fa-dropbox"></i></a>
        <a class=""><i class="fa fa-facebook"></i></a>
        <a class=""><i class="fa fa-flickr"></i></a>
        <a class=""><i class="fa fa-foursquare"></i></a>
        <a class=""><i class="fa fa-github"></i></a>
        <a class=""><i class="fa fa-google-plus"></i></a>
        <a class=""><i class="fa fa-instagram"></i></a>
        <a class=""><i class="fa fa-linkedin"></i></a>
        <a class=""><i class="fa fa-tumblr"></i></a>
        <a class=""><i class="fa fa-twitter"></i></a>
        <a class=""><i class="fa fa-vk"></i></a>
      </div>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
  <div class="container" id="top-menus">
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="index.html">
        <h1>LOGO HERE</h1>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="" style="display: none;">
          <div class="input-group" style="width: 96%; padding-top: 2px;">
            <input type="text" name="q" class="form-control" placeholder="Search...">
          </div>
        </li>
        <li class=""><div class="separate-ver-line"></div></li>
        <li class="sign-up-collapse" id='sign_up_btn'>
          <a class="btn btn-primary" data-toggle="modal" data-target="#modal_sign_up">
            <?php echo _("Start your workout now"); ?>
          </a>
        </li>
        <li class="">
          <a href="#" class="" data-toggle="modal" data-target="#modal_search" style="padding: 3px 10px 3px;">
            <i class="fa fa-search" style="font-size: 20px; color: white;"></i>
          </a>
        </li>
        <li class="login-button">
          <a href="#" class="" data-toggle="modal" data-target="#modal_login">
<?php echo Yii::t('app', "Login"); ?>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!--<i class="fa fa-gear" style="font-size: 20px; color: white;"></i>-->
            EN
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">English</a></li>
            <li><a href="#">Dutch</a></li>
            <li><a href="#">Laos</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
