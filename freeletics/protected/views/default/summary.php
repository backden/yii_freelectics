<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$action = Yii::app()->controller->action->id;
?>

<?php
echo $this->renderPartial("//partials/section_intro_articles", array(
    "width" => "auto",
    "height" => "300px",
    "data" => array(
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD.", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => 'Caption2', "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD. 2", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link")
    )
));
?>
<style>
  #navbar-summary {
    position: absolute;
    top: 60px;
    padding: 0;
    z-index: 1;
    width: 100%;
  }

</style>
<nav class="nav navbar-fixed-middle">
  <div class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-summary"
              style="color: black;">
        <i class="fa fa-list-ul"></i>
      </button>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse" id="navbar-summary">
      <div class="list-group">
        <?php if ($action == 'legal') { ?>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Term'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Privacy'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Copyright'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Cookies'); ?></a>
          <?php } else if ($action == 'company') { ?>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Company'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Values'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Team'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Job'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Contact'); ?></a>
        <?php } else if ($action == 'guild') { ?>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Training Coach'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Upgraded coach'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Training methodology'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Training group'); ?></a>
            <a href="#" class="list-group-item"><?Php echo Yii::t("app", 'Fundamentals'); ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>

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
  $(function () {
    $(window).on("scroll", function () {
      if ($(this).scrollTop() > $("#section_content").offset().top) {
        $("#nav_left").addClass('sidebar-fixed-top');
        $("#nav_left").css("bottom", "");
        $("#nav_left").css("top", "");
      } else {
        $("#nav_left").removeClass('sidebar-fixed-top');
      }
      if ($("#nav_left").offset().top + $("#nav_left").outerHeight(true) > $("footer").first().offset().top) {
        $("#nav_left").css("bottom", $("footer").first().offset().top + 50 + "px");
        $("#nav_left").css("top", "0");
      }
    });
  });
</script>
<section id="section_content">
  <div class="container">
    <div class="col-md-3 col-sm-3 col-disappear">
      <div class="" id="nav_left">
        <div id="sidebar_left">
          <ul class="sidebar-nav">
            <?php if ($action == 'legal') { ?>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Term'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Privacy'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Copyright'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Cookies'); ?></a>
              </li>
              <li>
              <?php } else if ($action == 'company') { ?>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Company'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Values'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Team'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Job'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Contact'); ?></a>
              </li>
            <?php } else if ($action == 'guild') { ?>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Training Coach'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Upgraded coach'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Training methodology'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Training group'); ?></a>
              </li>
              <li>
                <a href="#"><?Php echo Yii::t("app", 'Fundamentals'); ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12" style="height: 1000px;">
      <?php if ($action == 'legal') { ?>
        Squarespace Logo Terms
        Last updated: January 2, 2014

        These terms (“Logo Terms”) apply to your use the Squarespace Logo service (“Squarespace Logo”), through which you can use certain symbols to create and customize your own logo.  These Logo Terms are in addition to the Terms of Services Agreement located at www.squarespace.com/terms-of-service and any other terms applicable to your use of Squarespace Logo available through Squarespace, Inc.’s (“Squarespace”) websites, and collectively shall be referred to as the “Agreement”. If any of these Logo Terms conflict with the Terms of Services Agreement, the terms set forth herein shall control to the extent they relate only to your use of Squarespace Logo, and otherwise the Terms of Services Agreement shall control. 

        Use of Services

        Squarespace Logo and its contents may only be used in accordance with the terms of this Agreement. Squarespace Logo makes available to you certain symbols (“Symbols”) fonts, colors and other design elements (collectively with the Symbols, “Design Elements”) that you may use to create and customize your own Logo.  Through Squarespace Logo, you may access the Design Elements and, subject to the terms and conditions of the Agreement, Squarespace Logo permits you to (i) use and create derivative works of the Design Elements solely in connection with your creation of your own logo (each, a “Logo”) and (ii) reproduce, display, perform and distribute the Design Elements solely in connection with your Logo.  Low resolution versions of the Symbols are provided free of charge, but may be used for non-commercial use only.  High resolution versions require payment and may be used for commercial use.  If you desire to use the Symbols for commercial use you must pay for the high resolution version. 

        Prior to creating and using any Logo, Squarespace encourages you to perform due diligence to determine that the use of the Symbols is free of any adverse claims and is not subject to any third party rights.  Symbols are provided through our third party content provider, currently The Noun Project, who obtains the Symbols from other third party contributors (each, a “Contributor”) and all use of the Symbols is AT YOUR OWN RISK.

        You shall abide by all copyright notices, trademark rules, i
      <?php } else if ($action == 'company') { ?>

      <?php } else if ($action == 'guild') { ?>

      <?php } ?>
    </div>
  </div>
</section>