<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
  .nav-menu-fixed{
    padding: 0px;
  }
  .section-fixed-top-second {
    top: 40px !important;
  }
</style>
<script>

  var mouseEnter = false;
  $(function() {

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      if ($("#sidebar-wrapper").width() > 0) {
        $("#sidebar-wrapper").width(0);
      } else {
        $("#sidebar-wrapper").width(250);
      }
    });

    $("#menu-dropdown").click(function(e) {
      e.preventDefault();
      $("#top-menus").parent().animate({width: 'toggle'}, 350);
    });

    $("#dropdown-links").on('show.bs.dropdown', function() {
      $("#top-menus").parent().hide();
    });

    $("#sidebar-wrapper").hover(function() {
      mouseEnter = true;
    }, function() {
      mouseEnter = false;
    });

    $(document).click(function() {
      var exit = false;
      $(event.target).closest("#menu-toggle").each(function() {
        exit = true;
      });
      if (!exit && !mouseEnter) {
        $("#sidebar-wrapper").width(0);
      }
    });
  });
</script>

<nav class="navbar navbar-custom navbar-fixed-top nav-menu-fixed" role="navigation" style="background-color: black; max-height: 40px; padding: 0;">
  <div class="container top-fixed open-header-scroll" id="navbar-main">
    <div class="navbar-header">
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
      <ul class="nav navbar-nav navbar-left" style="padding: 5px;">
        <li class="sign-up-collapse" id='sign_up_btn'>
          <?php if (!Yii::app()->user->isGuest) { ?>
            <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('user'); ?>" >
              <?php echo _("Get Coach"); ?>
            </a>
          <?php } else { ?>
            <a class="btn btn-primary" data-toggle="modal" data-target="#modal_sign_up">
              <?php echo _("Start your workout now"); ?>
            </a>
          <?php } ?>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a class="btn-search-form" ><i class="fa fa-search"></i></a>
        </li>
        <li class="dropdown">
          <?php if (!Yii::app()->user->isGuest) { ?>
            <a class="dropdown-toggle" data-toggle="dropdown" style="margin: 0; padding: 7px 8px 1px 10px;">
              <canvas id="canvas_<?php echo Yii::app()->user->id; ?>" width="30" height="30" class="lower-canvas"></canvas>
            </a>
            <ul class="dropdown-menu">
              <li><a class="" href="<?php echo Yii::app()->createUrl("user/personal"); ?>"><?php echo Yii::t("app", "Personal"); ?></a></li>
              <li><a class="" href="<?php echo Yii::app()->createUrl("user/profile"); ?>"><?php echo Yii::t("app", "Profile"); ?></a></li>
              <li><a class="" href="<?php echo Yii::app()->createUrl("user/settings"); ?>"><?php echo Yii::t("app", "Setting"); ?></a></li>
              <li><a class="" href="<?php echo Yii::app()->createUrl("blog") . '?user=' . Yii::app()->user->id; ?>"><?php echo Yii::t("app", "Blog"); ?></a></li>
              <li><a class="" href="<?php echo Yii::app()->createUrl("user/physical"); ?>"><?php echo Yii::t("app", "Physical"); ?></a></li>
              <li><a class="" href="<?php echo Yii::app()->createUrl("user/logout"); ?>"><?php echo Yii::t("app", "Log out"); ?></a></li>
            </ul>
          <?php } else { ?>
            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-link"></i></a>
            <ul class="dropdown-menu">
              <li><a class=""><i class="fa fa-facebook"></i></a></li>
              <li><a class=""><i class="fa fa-linkedin"></i></a></li>
              <li><a class=""><i class="fa fa-twitter"></i></a></li>
              <li><a class=""><i class="fa fa-youtube"></i></a></li>
            </ul>
          <?php } ?>
        </li>
        <li>
          <a class="" id="menu-dropdown" style=""><i class="fa fa-bars"></i></a>
        </li>
      </ul>
      <form class="navbar-form navbar-right search-hidden" style="margin: auto;display: none;" id="search">
        <input type="text" class="form-control col-lg-8" placeholder="<?php echo Yii::t("app", "Search"); ?>">
      </form>
    </div>
  </div>

  <div id="sidebar-wrapper" style="width: 0;">
    <ul class="sidebar-nav">
      <li class="">
        <a href="<?php echo Yii::app()->createUrl("default/guild"); ?>"><?php echo Yii::t("app", 'Guild'); ?></a>
      </li>
      <li>
        <a href="<?php echo Yii::app()->createUrl("default/articles"); ?>"><?php echo Yii::t("app", 'Articles'); ?></a>
      </li>
      <li>
        <a href="<?php echo Yii::app()->createUrl("default/support"); ?>"><?php echo Yii::t("app", 'FAQ'); ?></a>
      </li>
      <?php if (Yii::app()->user->isGuest) { ?>
        <li>
          <a data-toggle="modal" data-target="#modal_login"><?php echo Yii::t("app", 'Login'); ?></a>
        </li>
      <?php } ?>
    </ul>
  </div>
  <!-- /.container -->
</nav>
<nav class="navbar navbar-custom navbar-fixed-top nav-menu-fixed" role="navigation" style="background-color: black; display: none;
     top: 42px;">
  <div class="container" id="top-menus">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">

        <li class="">
          <a href="<?php echo Yii::app()->createUrl("default/guild"); ?>"><?php echo Yii::t("app", 'Guild'); ?></a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->createUrl("default/articles"); ?>"><?php echo Yii::t("app", 'Articles'); ?></a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->createUrl("default/support"); ?>"><?php echo Yii::t("app", 'FAQ'); ?></a>
        </li>
        <?php if (Yii::app()->user->isGuest) { ?>
          <li class="login-button">
            <a class="" data-toggle="modal" data-target="#modal_login">
              <?php echo Yii::t('app', "Login"); ?>
            </a>
          </li>
        <?php } ?>
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
<script>
  $(function() {
    var urlAvatar = 'https://freeletics-storage.s3.amazonaws.com/medium/69866fb18adca9ad8f0d178797e2c2af2807e46b.jpg?1421167497';
    loadCanvas("canvas_<?php echo Yii::app()->user->id; ?>", urlAvatar, 0.2);
  });
  $(function() {
    $(".navbar-form.navbar-right").hide("slide", {direction: "right"}, "slow");
    $(".btn-search-form").click(function() {
      if ($(".navbar-form.navbar-right").hasClass("search-hidden")) {
        $(".navbar-form.navbar-right").show("slide", {direction: "right"}, "slow");
        $(".navbar-form.navbar-right").removeClass("search-hidden");
        $(this).find("i").removeClass("fa-search");
        $(this).find("i").addClass("fa-times");
      } else {
        $(".navbar-form.navbar-right").hide("slide", {direction: "right"}, "slow");
        $(".navbar-form.navbar-right").addClass("search-hidden");
        $(this).find("i").removeClass("fa-times");
        $(this).find("i").addClass("fa-search");
      }
    });

//    setInterval(function() {
//      $.get(
//              "<?php echo Yii::app()->createUrl("checkNotification"); ?>",
//              function(data) {
//                if (data.status == '<?php echo Constant::RS_ST_OK; ?>') {
//                  if (data.hasNew) {
//                    //$("#modal_notification").find(".modal-title").html(data.);
//                  }
//                }
//              },
//              'json'
//              );
//    }, 10000);
  });
</script>

<div class="modal" id="modal_notification">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
