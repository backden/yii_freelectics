<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<style>
  #section_menu {
    padding: 0 !important;
  }
  #section_menu .container {
    text-align: center;
  }

  #section_content .container {
    background-color: whitesmoke;
  }

  #first-article-top > div, #first-article > div, #list-articles-first, #list-articles-second{
    padding: 5px 5px;
  }

  #list-articles-first, #list-articles-second {
    min-height: 0;
    overflow-y: auto;
  }

  .list-group {
    margin-bottom: 0px !important;
  }

  .list-group .list-group-item-text {
    font-size: 16px;
  }

  .list-group .list-group-item img {
    margin-right: 5px;
  }

  .slimScrollBar {
    right: 5px !important;
  }

  .section-fixed-top-second {
    top: 50px;
    width: 100%;
    position: fixed;
    z-index: 999 !important;
  }

  .sub-container{
    width: 100%;
    background-color: whitesmoke;
  }

  .sub-container.closed {
    display: none;
  }

  a.title-article {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: #cc0033;
    display: block;
  }

  div.image-cover {
    background-image:url('http://placehold.it/600x300');
    background-repeat:no-repeat;
    background-size:cover;
    width: 100%;
    height: 300px;
  }

  div.image-cover.image-cover-sm {
    background-image:url('http://placehold.it/600x300');
    background-repeat:no-repeat;
    background-size:cover;
    width: 100%;
    height: 200px;
  }

  #sub-menus-dynamic {
    float: none;
    margin: auto;
    width: <?php echo isset($width) ? $width : '70%'; ?>;
  }

  #sub-menus-dynamic a {
    margin: 0;
  }
</style>
<script>
  $(function() {
    $('#list-articles-first').slimScroll({
      height: '450px',
      alwaysVisible: false
    });
    $('#list-articles-second').slimScroll({
      height: '450px',
      alwaysVisible: false
    });

<?php if (isset($fixed) && $fixed == true) { ?>
      $("#section_menu").addClass("section-fixed-top-second");
<?php } else { ?>
      $(window).on("scroll", function() {
        if ($(this).scrollTop() > $("section:first").height()) {
          $("#section_menu").addClass("section-fixed-top-second");
          $("#section_menu").find(".sub-container").css("top", 40 + $("#section_menu").outerHeight(true));
        } else {
          $("#section_menu").removeClass("section-fixed-top-second");
          $("#section_menu").find(".sub-container").css("top", $("#section_menu").offset().top - $(window).scrollTop() + $("#section_menu").outerHeight(true));
        }
      });
<?php } ?>
    $("#section_menu div.container:first a").click(function() {
      if ($($(this).attr("href")).length > 0) {
        $($(this).attr("href")).toggleClass("closed");
        $($(this).attr("href")).css("position", "fixed");
        $($(this).attr("href")).css("top", $("#section_menu").offset().top - $(window).scrollTop() + $("#section_menu").outerHeight(true));
        return false;
      } else {
        return true;
      }
    });

  });
</script>
<section id="section_menu" class="col-disappear"  style="background: whitesmoke">
  <div class="container">
    <ul class="nav navbar-nav" id="sub-menus-dynamic">
      <?php
      $subs = array();
      $subLinks = array();
      $controller = Yii::app()->baseUrl . '/index.php/' . ((isset($controller) ? $controller : Yii::app()->controller->id) . '/');
      foreach ($menus as $name => $menu) {
        if (isset($menu['menus']) == false || count($menu['menus']) == 0) {
          ?>
          <li class="">
            <a href="<?php echo $controller . (isset($menu['links']) && isset($menu['links'][0]) ? $menu['links'][0] : ""); ?>" class="btn btn-default"><?php echo Yii::t("app", $name); ?></a>
          </li>
        <?php } else { ?>
          <li class="dropdown">
            <a href="#<?php echo isset($menu["id"]) ? $menu["id"] : ""; ?>" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <?php echo Yii::t("app", $name); ?>
            </a>
            <ul class="dropdown-menu">
              <?php
              if (isset($menu['menus'])) {
                foreach ($menu['menus'] as $index => $subs) {
                  $subController = $controller . (isset($actionName) ? $actionName . "/?c=" : "");
                  ?>
                  <li>
                    <a href="<?php echo $subController . (isset($menu['links']) && isset($menu['links'][$index]) ? $menu['links'][$index] : ""); ?>">
                      <?php echo Yii::t("app", $subs); ?>
                    </a>
                  </li>
                <?php } ?>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
<!--    <div class="container sub-container closed" id="<?php echo isset($sub["id"]) ? $sub["id"] : ""; ?>">
<div class="btn-group">
  <?php
//  if (isset($sub['menus'])) {
//    foreach ($sub["menus"] as $index => $menu) :
  ?>
            <a href="<?php // echo $controller . '/' . isset($sub['links']) && isset($sub['links'][$index]) ? $sub['links'][$index] : "";            ?>" class="btn btn-default"><?php // echo Yii::t("app", $menu);  ?></a>
  <?php
//    endforeach;
//  }
  ?>
</div>-->
  <!--</div>-->
</section>
<style>
  #navbar-summary {
    position: absolute;
    top: 60px;
    padding: 0;
    z-index: 1;
    width: 100%;
  }

</style>
<style>
  .sidebar-fixed-top {
    position: fixed;
    height: 100%;
    top: 50px;
  }

  @media (min-width: 700px) {
    .navbar-fixed-middle {
      display: none;
    }
  }
  @media (max-width: 700px) {
    .col-disappear {
      display: none;
    }
  }
</style>
<script>
</script>
<nav class="nav navbar-fixed-middle" style="<?php echo isset($fixed) ? "margin-top: 40px" : ""; ?>">
  <div class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-summary"
              style="color: black;">
        <i class="fa fa-list-ul"></i>
      </button>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse" id="navbar-summary">
      <div class="list-group">
        <?php
        $subs = array();
        $subLinks = array();
        foreach ($menus as $name => $menu) {
          if (isset($menu['menus']) == false || count($menu['menus']) == 0) {
            ?>
            <a href="<?php echo $controller . (isset($menu['links']) && isset($menu['links'][0]) ? $menu['links'][0] : ""); ?>" class="list-group-item" class="btn btn-default"><?php echo Yii::t("app", $name); ?></a>
          <?php } else { ?>
            <li class="dropdown">
              <a href="#<?php echo isset($menu["id"]) ? $menu["id"] : ""; ?>" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo Yii::t("app", $name); ?>
              </a>
              <ul class="dropdown-menu">
                <?php
                if (isset($menu['menus'])) {
                  foreach ($menu['menus'] as $index => $subs) {
                    $subController = $controller . (isset($actionName) ? $actionName . "/?c=" : "");
                    ?>
                    <li>
                      <a href="<?php echo $subController . (isset($menu['links']) && isset($menu['links'][$index]) ? $menu['links'][$index] : ""); ?>">
                        <?php echo Yii::t("app", $subs); ?>
                      </a>
                    </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            </li>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>