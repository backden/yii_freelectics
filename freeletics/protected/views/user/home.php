<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
?>
<link href="/favicon.ico" type="image/x-icon" rel="icon" />
 <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/animate.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap_readable.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/main_style.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/horizontal.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/color/default.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/font_styles.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/hovereffect.css" />
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jssor.slider.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll_follow.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/custom.js"></script>
 <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/social.script.js"></script>

<!-- Section: intro -->
<section id="intro" class="intro">
  <div id="slider1_container" style="position: relative; margin: 0 auto;
       top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
    <!-- Loading Screen -->
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
      <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
           top: 0px; left: 0px; width: 100%; height: 100%;">
      </div>
      <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 0px; padding: 5px;
           text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
           color: #FFFFFF;">
      </div>
    </div>
    <!-- Slides Container -->
    <div class="slides" u="slides" style="position: relative; width: 1400px; height: 500px; top: 30px; left: 0px; padding: 0px;
         text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
         color: #FFFFFF;">
      <div>
        <img u="image" src="https://www.freeletics.com/images/landing_page/hero.jpg" style="left: 150px"/>
        <div class="slogan">
          <h1 translate="LANDING_PAGE_SLOGAN_1" class="ng-scope"><?php echo Yii::t('app', "The shape of your life. Period."); ?></h1>
        </div>
      </div>
      <div>
        <img u="image" src="https://www.freeletics.com/images/landing_page/hero.jpg" />
        <div class="slogan">
          <h1 translate="LANDING_PAGE_SLOGAN_1" class="ng-scope"><?php echo Yii::t('app', "The shape of your life. Period."); ?></h1>
        </div>
      </div>

      <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
        <!-- bullet navigator item prototype -->
        <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
      </div>
      <div data-u="navigator" class="jssorb21">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype"></div>
      </div>
      <span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
      </span>
      <!-- Arrow Right -->
      <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 100px">
      </span>
      <!-- Arrow Navigator Skin End -->
      <a style="display: none" href="http://www.jssor.com">javascript</a>
    </div>
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

<!-- Section: about -->
<section id="section1" class="home-section text-center">
  <div class="heading-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="" data-wow-delay="0.4s">
            <div class="section-heading">
              <h2 class="ng-binding">The #1 Training System</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div class="row wrapper">
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12" >
        <div class="box">
          <div class="box-header">
            <div class="icon-lg"><i class="fa fa-flash"></i></div>
          </div>
          <div class="box-body body-hover">
            <h3 translate="LANDING_PAGE_INTENSITY_WORKOUTS" class="ng-scope">High intensity workouts.</h3>
            <div class="hover-focus" style="position: absolute;">
              <div class="icon"><i class="fa fa-flash"></i></div>
              <p translate="LANDING_PAGE_YOU_AND_YOUR_PROGRESS" class="ng-scope">Freeletics workouts are tough and highly effective. They take between 15-45 min.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12" >
        <div class="box">
          <div class="box-header">
            <div class="icon-lg"><i class="fa fa-table"></i></div>
          </div>
          <div class="box-body body-hover">
            <h3 translate="LANDING_PAGE_PERSONAL_TRAINING" class="ng-scope">Personalized coaching.</h3>
            <div class="hover-focus" style="position: absolute;">
              <div class="icon"><i class="fa fa-flash"></i></div>
              <p translate="LANDING_PAGE_GUIDED_TRAINING" class="ng-scope">Training plans are personalized to your goals and progress. You can become a Free Athlete at every fitness level.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12" >
        <div class="box">
          <div class="box-header">
            <div class="icon-lg"><i class="fa fa-table"></i></div>
          </div>
          <div class="box-body body-hover">
            <h3 translate="LANDING_PAGE_TOTAL_FREEDOM" class="ng-scope">Total<br>freedom.</h3>
            <div class="hover-focus" style="position: absolute;">
              <div class="icon"><i class="fa fa-flash"></i></div>
              <p translate="LANDING_PAGE_WORKOUTS_EVERYWHERE" class="ng-scope">You exercise with your bodyweight only. Anywhere, anytime: at home, outside, in gyms, in hotel rooms.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12" >
        <div class="box">
          <div class="box-header">
            <div class="icon-lg"><i class="fa fa-table"></i></div>
          </div>
          <div class="box-body body-hover">
            <h3 translate="LANDING_PAGE_COMMUNITY" class="ng-scope">2,000,000+ Free Athletes.</h3>
            <div class="hover-focus" style="position: absolute;">
              <div class="icon"><i class="fa fa-flash"></i></div>
              <p translate="LANDING_PAGE_CHALLENGE" class="ng-scope">Stay in touch with the Freeletics community around the globe. Share your results and compete with your friends.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="padding-top: 50px;">
      <div id="fb-root"></div>
      <div class="fb-like" data-href="https://www.facebook.com/bbcnews" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
</section>
<!-- /Section: about -->

<!-- Section: contact -->
<section id="section2" class="home-section text-center">
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
  <div class="container" id="container-scroll-horizontal">

    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
    <div class="scrollbar">
      <div class="handle">
        <div class="mousearea"></div>
      </div>
    </div>
    <div id="content-scroll-h" class="frame" style="height: 400px;">
      <ul class="">
        <?php $i = 0;
        while ($i < 10) {
          ?>
          <li class="box-container">
            <div class="box box-solid box-success" style="max-height: 400px;">
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
          </li>
          <?php $i++;
        }
        ?>
      </ul>

    </div>
    <button class="prevPage"><i class="fa fa-chevron-left"></i></button>
    <button class="nextPage"><i class="fa fa-chevron-right"></i></button>
  </div>	
</section>
<!-- /Section: contact -->

<!-- section image -->
<section id="section3" class="" style="padding: 100px;">
  <div class="container">
    <button class="btn btn-primary btn-lg pull-right btn-specify-tab-3"><?php echo Yii::t('app', "button"); ?></button>
  </div>
</section>
<!-- section end -->

<!-- section metro UI -->
<section id="section4" class="">
  <div class="heading-contact">
    <div class="container">
      <div class="">
        <div class="col-lg-9 col-lg-offset-2">
          <div class="" data-wow-delay="">
            <div class="section-heading text-center">
              <h2 style="margin-bottom: 0;">MOTIVATING. AUTHENTIC.</h2>
              <h2>FREELETICS ATHLETE STORIES.</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-lg-6" style="padding-bottom: 20px;">
      <div class="" style="float: right">
        <div class="view effect">  
          <img src="http://placehold.it/460x220" />  
          <div class="mask"></div>
          <div class="content">  
            <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
          </div>  
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="" style="margin-left: -25px;">
        <div class="col-lg-5 col-lg-5-fix">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="col-lg-5 col-lg-5-fix">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-lg-5 col-lg-5-fix">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="col-lg-5 col-lg-5-fix">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="title-left">
        <div class="col-lg-6 col-xs-12 col-sm-12 tile-fixed-left">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12 tile-fixed-left">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12 tile-fixed-left">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
        <div class="col-lg-6  col-xs-12 col-sm-12 tile-fixed-left">
          <div class="view effect">  
            <img src="http://placehold.it/220x100"/>  
            <div class="mask"></div>
            <div class="content">  
              <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
            </div>  
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xs-12 col-sm-12">
      <div class="" style="margin-left: -10px; padding-left: 0;">
        <div class="view effect">  
          <img src="http://placehold.it/460x220" />  
          <div class="mask"></div>
          <div class="content">  
            <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
          </div>  
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section end -->

