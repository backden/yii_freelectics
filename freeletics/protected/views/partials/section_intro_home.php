<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<style>
  .col-sm-3, .col-xs-12 {
    margin-bottom: 1%;
  }

  .tiled .content {
    width: 100%;
    margin: auto;
    padding: 50px;
  }

  #content-scroll-h img{
    width: <?php echo $width; ?>;
    margin: auto;
  }

  @media (max-width: 480px) {
    #content-scroll-h .caption {
      text-align: center;
      margin: auto;
      margin-top: -10px;
      margin-bottom: 0px;
      color: white;
    }

    #content-scroll-h .caption > span{
      font-size: 20px;
      font-weight: 700;
    }

    #content-scroll-h .caption > span > p{
      font-size: 10px;
      font-weight: 700;
    }
  }
  
  @media (min-width: 480px) {
    #content-scroll-h .caption {
      text-align: center;
      margin: auto;
      margin-top: -10px;
      margin-bottom: 0px;
      color: white;
    }

    #content-scroll-h .caption > span{
      font-size: 20px;
      font-weight: 700;
    }

    #content-scroll-h .caption > span > p{
      font-size: 10px;
      font-weight: 700;
    }
  }

  @media (min-width: 900px) {
    #content-scroll-h .caption {
      text-align: center;
      margin: auto;
      margin-top: -90px;
      margin-bottom: 20px;
      color: white;
    }

    #content-scroll-h .caption > span{
      font-size: 40px;
      font-weight: 700;
    }

    #content-scroll-h .caption > span > p{
      font-size: 25px;
      font-weight: 700;
    }
  }
  
</style>
<script>
  var IMG_WIDTH = 1000;
  var currentImg = 0;
  var maxImages = 3;
  var speed = 500;
  var imgs;

  var swipeOptions = {
    autoplay: true,
    infinite: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false
  };

  $(function () {
    $('.single-item').slick(swipeOptions);
    $("#content-scroll-h .prevPage").click(function() {
      $("#content-scroll-h").slickPrev();
    });
    $("#content-scroll-h .nextPage").click(function() {
      $("#content-scroll-h").slickNext();
    });
  });

</script>
<!-- Section: intro -->
<section id="intro" class="intro">
  <div id="content-scroll-h" class="slider single-item" style="">
    <!-- Wrapper for slides -->
    <div class="">
      <img src="https://www.freeletics.com/images/landing_page/hero.jpg" alt="...">
      <div class="caption">
        <span class=""><?php echo Yii::t("app", "THE SHAPE OF YOUR LIFE. PERIOD."); ?>
          <p><?php echo Yii::t("app", "Your individual training plan. High intensity workouts. Perfectly adapted to you."); ?></p>
        </span>
      </div>
    </div>
    <div class="">
      <img src="https://www.freeletics.com/images/landing_page/hero.jpg" alt="...">
      <div class="caption">
        <span class=""><?php echo Yii::t("app", "THE SHAPE OF YOUR LIFE. PERIOD."); ?>
          <p><?php echo Yii::t("app", "Your individual training plan. High intensity workouts. Perfectly adapted to you."); ?></p>
        </span>
      </div>
    </div>

    <button class="prevPage"><i class="fa fa-chevron-circle-left"></i></button>
    <button class="nextPage"><i class="fa fa-chevron-circle-right"></i></button>
  </div>
  <div style="text-align: center;">
    <button id='btnSignUp' data-toggle="modal" data-target="#modal_sign_up" class="btn btn-primary">
      <span class="ng-binding"><?php echo Yii::t('app', "Start your workout now"); ?></span>
    </button>
  </div> 
  <div class="page-scroll">
    <a order="1" href="#section1" class="btn btn-circle first-next-section">
      <i class="fa fa-chevron-down animated"></i>
    </a>
  </div>
</section>
<!-- /Section: intro -->