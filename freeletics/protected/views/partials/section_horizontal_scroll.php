<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
  $(function () {

    $('.responsive.horizontal').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      prevArrow: $("#section2 .prevPage"),
      nextArrow: $("#section2 .nextPage"),
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

  });
</script>
<style>
  .box-new-freeletics {
    max-height: 600px;
    margin: 0 10px;
  }

  .prevPage.slick-disabled {
    display: none !important;
  }

  .nextPage.slick-disabled {
    display: none !important;
  }

  .prevPage, .nextPage{
    background: transparent;
    border: 0;
    color: #fff;
    opacity: 1;
    font-size: 60px;
    position: absolute;
    left: 15px;
    top: 35%;
    display: block;
  }
  
  .nextPage {
    left: auto !important;
    right: 15px;
  }

</style>
<!-- Section: contact -->
<section id="section2" class="home-section text-center">
  <div class="container">
    <div class="responsive horizontal">
      <?php
      $i = 0;
      while ($i < 10) {
        ?>
        <div class="box box-solid box-success box-new-freeletics" style="">
          <div class="box-header">
            <h3 class="box-title">Primary Solid Box <?php echo $i; ?></h3>
            <div class="box-tools pull-right">
            </div>
          </div>
          <div class="box-body">
            <p>Box class: <code>.box.box-solid.box-primary</code>
              amber, microbrewery abbey hydrometer, brewpub ale lauter tun saccharification oxidized barrel.
              berliner weisse wort chiller adjunct hydrometer alcohol aau!
              sour/acidic sour/acidic chocolate malt ipa ipa hydrometer.
            </p>
          </div><!-- /.box-body -->
        </div>
        <?php
        $i++;
      }
      ?>
    </div>
    <button class="prevPage"><i class="fa fa-chevron-left"></i></button>
    <button class="nextPage"><i class="fa fa-chevron-right"></i></button>
  </div>
  <div class="heading-contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="" data-wow-delay="">
            <div class="section-heading">
              <!--<h2>Get in touch</h2>-->
              <!--<i class="fa fa-2x fa-angle-down"></i>-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /Section: contact -->

<!-- section image -->
<section id="section3" class="" style="">
  <div class="container">
    <button class="btn btn-primary btn-lg pull-right btn-specify-tab-3"><?php echo Yii::t('app', "button"); ?></button>
  </div>
</section>