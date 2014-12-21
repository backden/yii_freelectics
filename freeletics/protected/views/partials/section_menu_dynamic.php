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
</style>
<script>
  $(function () {
    $('#list-articles-first').slimScroll({
      height: '400px',
      alwaysVisible: false
    });
    $('#list-articles-second').slimScroll({
      height: '400px',
      alwaysVisible: false
    });

    $(window).on("scroll", function () {
      if ($(this).scrollTop() > $("section:first").height()) {
        $("#section_menu").addClass("section-fixed-top-second");
        $("#section_menu").find(".sub-container").css("top", 50 + $("#section_menu").outerHeight(true));
      } else {
        $("#section_menu").removeClass("section-fixed-top-second");
        $("#section_menu").find(".sub-container").css("top", $("#section_menu").offset().top - $(window).scrollTop() + $("#section_menu").outerHeight(true));
      }
    });

    $("#section_menu div.container:first a").click(function () {
      if ($($(this).attr("href")) !== undefined) {
        $($(this).attr("href")).toggleClass("closed");
        $($(this).attr("href")).css("position", "fixed");
        $($(this).attr("href")).css("top", $("#section_menu").offset().top - $(window).scrollTop() + $("#section_menu").outerHeight(true));
      }
      return false;
    });

  });
</script>
<section id="section_menu" class="">
  <div class="container">
    <div class="btn-group">
      <?php
      $subs = array();
      foreach ($menus as $name => $menu) {
        if (count($menu) == 0) {
          ?>
          <a href="#" class="btn btn-default"><?php echo Yii::t("app", $name); ?></a>
        <?php } else { ?>
          <a href="#<?php echo $menu["id"]; ?>" class="btn btn-default"><?php echo Yii::t("app", $name); ?>&nbsp;<span class="caret"></span></a>
          <?php
          $subs[] = $menu;
        }
        ?>
      <?php } ?>
    </div>
  </div>
  <?php foreach ($subs as $sub) : ?>
    <div class="container sub-container closed" id="<?php echo $sub["id"]; ?>">
      <div class="btn-group">
        <?php foreach ($sub["menus"] as $menu) : ?>
          <a href="#" class="btn btn-default"><?php echo Yii::t("app", $menu); ?></a>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>