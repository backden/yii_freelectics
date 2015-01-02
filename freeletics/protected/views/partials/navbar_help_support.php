<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--<div class="page-scroll">
  <style>
    .dot-scroll-vertical {
      /*              display: inline-block;*/
      padding: 2px;
      cursor: pointer;
    }
  </style>
  bullet navigator container 
  <div class="bullet-vertical" style="position: absolute;bottom: 42%;right: 1px;">
    bullet navigator item prototype 
    <div class="dot-scroll-vertical"><i class="fa fa-circle" ref="#intro"></i></div>
    <a href="#intro" class="btn btn-square btn-top-scroll">
      <i class="fa fa-chevron-up animated"></i>
    </a>
  </div>
</div>-->

<?php $this->renderPartial("//partials/script_css");?>

<script>
  $(function () {
    jQuery("#preloader").delay(100).fadeOut("slow");
    jQuery("#load").delay(100).fadeOut("slow");
    $(window).scroll(function () {
      var scrollTo = $(window).scrollTop() + $(window).height();
      var offsetBottom = $(".roll-bottom").height() - $(window).height();
      if ($(window).height() > $(".roll-bottom").height()) {
        if ($(window).scrollTop() < $("#navbar-container").outerHeight(true)) {
          $(".roll-bottom").css("top", "0");
        } else {
          $(".roll-bottom").css("top", $(window).scrollTop() - $("#navbar-container").outerHeight(true) + "px");
        }
      } else {
        if (scrollTo - $(".roll-bottom").height() > offsetBottom) {
          $(".roll-bottom").css("bottom", -$(window).scrollTop() + offsetBottom + $("#navbar-container").outerHeight(true) + "px");
        } else {
          $(".roll-bottom").css("bottom", "auto");
        }
      }

    });

    $("#helpContainter .panel-body:first").css('min-height', $(window).height() -
            $("#navbar-container").outerHeight(true) -
            $("footer").outerHeight(true));
  });
</script>

<style>

  .logo {
    /*    margin-top: 5px;
        margin-left: -5px;*/
    background-position: 52px 0px;
    width: 52px;
    height: 37px;
    background-image: url('https://www.freeletics.com/images/freeletics-logo.svg');
  }
  
  nav.navbar {
    padding: 5px 0;
  }
  
  nav.navbar .container {
    margin-left: 5px;
    width: 99%;
  }
  
  .nav.navbar-nav li a {
    font-size: 12px;
    margin: 2px 6px;
    border-radius: 50%;
  }
  .navbar.navbar-custom.nav-menu-fixed {
    /*margin-bottom: 20px;*/
    min-height: 40px !important;
    border-radius: 0;
  }

  footer nav.navbar{
    border-radius: 0;
    max-height: 40px;
  }
  /*  .nav .open>a, .nav .open>a:hover, .nav .open>a:focus {
      background-color: black;
    }*/

  nav ul li a:hover {
    background: rgba(255, 255, 255, 0.9) !important;
    color: black !important;
  }
</style>
<nav class="navbar navbar-custom nav-menu-fixed" id="navbar-container" role="navigation" style="background-color: black">
  <div class="container top-fixed open-header-scroll" style="display: none;">
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
      <ul class="nav navbar-nav">
        <li class="logo" style="">
        </li>
        <li class="" style="">
        </li>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="" style="">
          <div class="input-group" style="width: 96%; padding-top: 2px;">
            <input type="text" name="q" class="form-control" placeholder="Search...">
          </div>
        </li>
        <li class="">
          <a class="btn btn-primary" href="#" style="border-radius: 2px;">
            <?php echo Yii::t('app', "Submit a request"); ?>
          </a>
        </li>
        <li class="btn-primary sign-up-collapse" id='sign_up_btn' style="display: none;"><a class="" data-toggle="modal" data-target="#modal_sign_up"><?php echo _("Start your workout now"); ?></a></li>
        <li class="" style="display: none;">
          <a href="#" class="" data-toggle="modal" data-target="#modal_search">
            <i class="fa fa-search" style="font-size: 20px; color: white;"></i>
          </a>
        </li>
        <li class="login-button" style="display: none;">
          <a href="#" class="" data-toggle="modal" data-target="#modal_login">
            <?php echo Yii::t('app', "Login"); ?>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 7px 9px;">
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
