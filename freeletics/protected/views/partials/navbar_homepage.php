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
  <script>
    $(document).ready(function () {
      $("#dot-nav").affix({
        offset: {
          top: 190
        }
      });

      $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
      });
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
      });
    });
  </script>
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
      <!--      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
            </button>-->
      <button type="button" class="navbar-toggle" id="menu-toggle">
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
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a href="#">Project name</a>
      </li>
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#about">About</a>
      </li>
      <li>
        <a href="#contact">Contact</a>
      </li>
    </ul>
  </div>
  <!-- /.container -->
</nav>
<style>
  #sidebar-wrapper {
    margin-right: -250px;
    right: 0;
    width: 250px;
    background: rgb(0,0,0);
    position: fixed;
    height: 100%;
    overflow-y: auto;
    z-index: 1000;
    transition: all 0.5s ease-in 0s;
    -webkit-transition: all 0.5s ease-in 0s;
    -moz-transition: all 0.5s ease-in 0s;
    -ms-transition: all 0.5s ease-in 0s;
    -o-transition: all 0.5s ease-in 0s;
  }

  .sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .sidebar-nav li {
    line-height: 50px;
    text-indent: 20px;
  }

  .sidebar-nav li a {
    color: #999999;
    display: block;
    text-decoration: none;
  }

  .sidebar-nav li a:hover {
    color: #fff;
    background: rgba(255,255,255,0.2);
    text-decoration: none;
  }

  .sidebar-nav li a:active, .sidebar-nav li a:focus {
    text-decoration: none;
  }

  .sidebar-nav > .sidebar-brand {
    height: 55px;
    line-height: 55px;
    font-size: 18px;
  }

  .sidebar-nav > .sidebar-brand a {
    color: #999999;
  }

  .sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
  }

  #menu-toggle {
    top: 0;
    right: 0;
    position: fixed;
    z-index: 1;
  }

  #sidebar-wrapper.active {
    right: 250px;
    width: 250px;
    margin-right: 0;
    transition: all 0.5s ease-out 0s;
    -webkit-transition: all 0.5s ease-out 0s;
    -moz-transition: all 0.5s ease-out 0s;
    -ms-transition: all 0.5s ease-out 0s;
    -o-transition: all 0.5s ease-out 0s;
  }

  .toggle {
    margin: 5px 5px 0 0;
  }
</style>