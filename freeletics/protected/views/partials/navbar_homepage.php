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

    #top-menus li a {
      margin: auto;
      padding: 10px;
      margin-right: 5px;
    }

    .nav>li {
      display: inline-block !important;
    }

    #modal_search {
      top: 50px;
    }

    #modal_search .modal.in .modal-dialog {
      margin: auto;
    }

    #modal_search .modal-body {
      padding: 1px;
    }
    
    #dropdown-links .dropdown-menu {
      min-width: 50px;
      
    }
  </style>
  <script>
    
    var mouseEnter = false;
    $(document).ready(function () {

      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        if ($("#sidebar-wrapper").width() > 0) {
          $("#sidebar-wrapper").width(0);
        } else {
          $("#sidebar-wrapper").width(250);
        }
      });

      $("#menu-dropdown").click(function (e) {
        e.preventDefault();
        $("#top-menus").parent().toggle();
      });

      $("#dropdown-links").on('show.bs.dropdown', function () {
        $("#top-menus").parent().hide();
      });
      
      $("#sidebar-wrapper").mouseenter(function () {
        mouseEnter = true;
      });
      
      $("#sidebar-wrapper").mouseenter(function () {
        mouseEnter = false;
      });

      $(document).click(function () {
        var exit = false;
        $(event.target).closest("#menu-toggle").each(function () {
          exit = true;
        });
        if (!exit && !mouseEnter) {
          $("#sidebar-wrapper").width(0);
        }
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

<nav class="navbar navbar-custom navbar-fixed-top nav-menu-fixed" role="navigation" style="background-color: black">
  <div class="container top-fixed open-header-scroll" id="navbar-main">
    <div class="navbar-header page-scroll">
      <li class="logo" style="display: inline-block;">

      </li>
      <ul class="nav navbar-nav navbar-toggle" style="background-color: transparent;margin: 0; position: absolute; top: 5px;right: 0;">
        <li>
          <a class="" style="margin: auto; padding: 5px; top: -10px" data-toggle="modal" data-target="#modal_search">
            <i class="fa fa-search"></i></a>
        </li>
        <li>
          <a class="navbar-toggle" id="menu-toggle" style="margin: auto; padding: 5px; "><i class="fa fa-bars"></i></a>
        </li>
      </ul>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse collapse navbar-responsive-collapse" id="dropdown-links">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-link"></i></a>
          <ul class="dropdown-menu">
            <li><a class=""><i class="fa fa-facebook"></i></a></li>
            <li><a class=""><i class="fa fa-linkedin"></i></a></li>
            <li><a class=""><i class="fa fa-twitter"></i></a></li>
            <li><a class=""><i class="fa fa-youtube"></i></a></li>
          </ul>
        </li>
        <li>
          <a class="" id="menu-dropdown" style=""><i class="fa fa-bars"></i></a>
        </li>
      </ul>
      <form class="navbar-form navbar-right" style="margin: auto;">
        <input type="text" class="form-control col-lg-8" placeholder="<?php echo Yii::t("app", "Search"); ?>">
      </form>
    </div>
  </div>

  <div id="sidebar-wrapper" style="width: 0;">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a href="#"><?php echo Yii::t("app", 'Guild');?></a>
      </li>
      <li>
        <a href="#"><?php echo Yii::t("app", 'Articles');?></a>
      </li>
      <li>
        <a ><?php echo Yii::t("app", 'FAQ');?></a>
      </li>
      <li>
        <a data-toggle="modal" data-target="#modal_login"><?php echo Yii::t("app", 'Login');?></a>
      </li>
    </ul>
  </div>
  <!-- /.container -->
</nav>
<nav class="navbar navbar-custom navbar-fixed-top nav-menu-fixed" role="navigation" style="background-color: black; display: none;
     top: 50px;">
  <div class="container" id="top-menus">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="sign-up-collapse" id='sign_up_btn'>
          <a class="btn btn-primary" data-toggle="modal" data-target="#modal_sign_up">
            <?php echo _("Start your workout now"); ?>
          </a>
        </li>
        <li class="login-button">
          <a class="" data-toggle="modal" data-target="#modal_login">
            <?php echo Yii::t('app', "Login"); ?>
          </a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
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
  </div>
</nav>
<style>

</style>