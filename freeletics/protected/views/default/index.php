<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of index HomePage no login
 *
 * @author My PC
 */
$baseUrl = Yii::app()->baseUrl;
?>
<style>
  .col-sm-3, .col-xs-12 {
    margin-bottom: 20px;
  }
  
</style>
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
      <div class="fb-like" data-href="https://www.facebook.com/bbcnews" data-width="100%" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
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
        <?php
        $i = 0;
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
          <?php
          $i++;
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
<section id="section3" class="" style="">
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
    <div class="row ">
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div id="tile1" class="tile" style="/*  */">

          <div class="carousel slide" data-ride="carousel" style="/*  */">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile2" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile3" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile5" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile6" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row " style="">
      <div class="col-lg-6 col-sm-6 col-xs-12" style="
           float: right;
           ">
        <div id="tile1" class="tile" style="/*  */">

          <div class="carousel slide" data-ride="carousel" style="/*  */">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile2" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="view effect">  
                <img src="http://placehold.it/460x300" />  
                <div class="mask"></div>
                <div class="content">  
                  <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile3" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="view effect">  
              <img src="http://placehold.it/460x300" />  
              <div class="mask"></div>
              <div class="content">  
                <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
              </div>  
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile5" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="view effect">  
              <img src="http://placehold.it/460x300" />  
              <div class="mask"></div>
              <div class="content">  
                <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
              </div>  
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div id="tile6" class="tile" style="">

          <div class="carousel slide" data-ride="carousel" style="">
            <!-- Wrapper for slides -->
            <div class="view effect">  
              <img src="http://placehold.it/460x300" />  
              <div class="mask"></div>
              <div class="content">  
                <a href="#" class="info" title="Full Image"><i class="fa fa-eye-"></i></a>  
              </div>  
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- section end -->

<!-- Section: services -->
<section id="section5" class="text-center bg-black">

  <div class="heading-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
            <div class="section-heading">
              <i class="fa fa-2x fa-angle-down"></i>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container log-in">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="section_sign_in_form">
      <form class="form-horizontal">
        <fieldset>
          <legend><?php echo Yii::t('app', "START YOUR WORKOUT"); ?></legend>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-12 control-label">Name</label>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <input type="text" class="form-control" id="inputEmail" placeholder="<?php echo Yii::t('app', "First"); ?>">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <input type="text" class="form-control" id="inputEmail" placeholder="<?php echo Yii::t('app', "Last"); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-12 control-label">Email</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="inputEmail" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-lg-12 control-label">Password</label>
            <div class="col-lg-12">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> <?php echo Yii::t('app', "Yes Freeletics, send me emails with training-specific tips and information regarding new Freeletics features, products & specials!"); ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary" style="width: 100%;">
                <?php echo Yii::t('app', "Free Sign Up"); ?>
              </button>
            </div>
          </div>
          Already a user? <a href="#">Sign In</a>
          <br/>
          By creating an account, I agree to Freeletics'
          <a href="https://www.freeletics.com/en/pages/terms">Terms of Service</a>
          and <a href="https://www.freeletics.com/en/pages/privacy" >Privacy Policy</a>.
        </fieldset>
      </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="description-sign-up">
        <h2 class="text-aqua"><?php echo Yii::t('app', "AFTER YOUR REGISTRATION"); ?></h2>
        <p><b class="text-aqua"><strong><?php echo Yii::t('app', "FREE"); ?></strong></b>: Workouts to start exercising immediately.</p>
        <p><b class="text-aqua"><strong><?php echo Yii::t('app', "OPTIONAL"); ?></strong></b>: Premium training and nutrition plans for maximum progress, individually adapted to you.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /Section: services -->


<!-- Login modal-->
<div class="modal modal-sm fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
     style="width: 100%">
  <div class="modal-dialog">
    <div class="close-modal-icon">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-content">
      <div class="modal-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableClientValidation' => false,
            //'action' => Yii::app()->createUrl('/user/create'),
            'method' => 'POST',
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => false,
                'validateOnChange' => false,
                'validateOnType' => false
            ),
        ));
        ?>
        <fieldset>
          <legend style="text-transform: uppercase;"><?php echo Yii::t('app', "Login"); ?></legend>
          <div class="form-group">
            <div class="col-lg-12">
              <?php echo $form->textField($model, 'email', array('id' => "inputEmail", 'class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <?php echo $form->passwordField($model, 'password', array('id' => "inputPassword", 'class' => 'form-control', 'placeholder' => Yii::t('app', "Password"), 'size' => 50, 'maxlength' => 50)); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <?php echo $form->checkBox($model, 'remember'); ?> <?php echo Yii::t('app', "Remember me"); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <a href="#" ><?php echo Yii::t('app', "Forgot password"); ?></a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <?php
              echo CHtml::ajaxSubmitButton(Yii::t('app', "Login"), CHtml::normalizeUrl(array('/user/login', 'form' => 'user-form')), array(
                  'dataType' => 'json',
                  'type' => 'post',
                  'success' => 'loginResult',
                  'beforeSend' => 'function(){                        
                           }'
                ), array('class' => 'btn btn-primary', "style" => "width: 100%;"));
              ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <?php echo Yii::t('app', "Not registered yet?"); ?>&nbsp;
              <a href="#" data-toggle="modal" data-target="#modal_sign_up"><?php echo Yii::t('app', "Sign up to get started"); ?></a>
            </div>
          </div>
        </fieldset>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-sm fade" id="modal_forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
     style="width: 100%">
  <div class="modal-dialog">
    <div class="close-modal-icon">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-content">
      <div class="modal-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableClientValidation' => false,
            //'action' => Yii::app()->createUrl('/user/forgot'),
            'method' => 'POST',
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => false,
                'validateOnChange' => false,
                'validateOnType' => false
            ),
        ));
        ?>
        <fieldset>
          <legend style="text-transform: uppercase;"><?php echo Yii::t('app', "Forgot password"); ?></legend>
          <div class="form-group">
            <div class="col-lg-12">
              <?php echo $form->textField($model, 'email', array('id' => "inputEmail", 'class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <?php
              echo CHtml::ajaxSubmitButton(Yii::t('app', "Send Password"), CHtml::normalizeUrl(array('/user/forgot', 'form' => 'forgot-form')), array(
                  'dataType' => 'json',
                  'type' => 'post',
                  'success' => 'forgotResult',
                  'beforeSend' => 'function(){                        
                           }'
                ), array('class' => 'btn btn-primary', "style" => "width: 100%;"));
              ?>
            </div>
          </div>
        </fieldset>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</div>
<!-- End login modal -->

<!-- Modal -->
<div class="modal fade" id="modal_sign_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
     style="width: 100%">
  <div class="modal-dialog">
    <div class="close-modal-icon">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-content">
      <div class="modal-header" style="display: none;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id="myTabContent" class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="sign_in_form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'enableClientValidation' => false,
                'action' => Yii::app()->createUrl('/user/create'),
                'method' => 'POST',
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => false,
                    'validateOnChange' => false,
                    'validateOnType' => false
                ),
            ));
            ?>
            <fieldset>
              <legend style="font-weight: 700; font-size: 30px"><?php echo Yii::t('app', "START YOUR WORKOUT"); ?></legend>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <?php echo $form->textField($model, 'first', array('class' => 'form-control', 'placeholder' => Yii::t('app', "First"), 'size' => 20, 'maxlength' => 20)); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <?php echo $form->textField($model, 'last', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Last"), 'size' => 20, 'maxlength' => 20)); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Password"), 'size' => 50, 'maxlength' => 50)); ?>
                  <div class="checkbox">
                    <label>
                      <?php echo $form->checkBox($model, 'notice', array('class' => '')); ?>
                      <?php echo Yii::t('app', "Yes Freeletics, send me emails with training-specific tips and information regarding new Freeletics features, products & specials!"); ?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <?php
                  echo CHtml::ajaxSubmitButton(Yii::t('app', "Free Sign Up"), CHtml::normalizeUrl(array('/user/create', 'form' => 'user-form')), array(
                      'dataType' => 'json',
                      'type' => 'post',
                      'success' => 'validate',
                      'beforeSend' => 'function(){                        
                             
                           }'
                    ), array('class' => 'btn btn-primary', "style" => "width: 100%;"));
                  ?>
                </div>
              </div>
              Already a user? <a href="#" data-toggle="modal" data-target="#modal_login"><?php Yii::t('app', "Sign In"); ?></a>
              <br/>
              By creating an account, I agree to Freeletics'
              <a href="https://www.freeletics.com/en/pages/terms">Terms of Service</a>
              and <a href="https://www.freeletics.com/en/pages/privacy" >Privacy Policy</a>.
            </fieldset>
            <?php $this->endWidget(); ?>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="description-sign-up">
              <h2 class="text-aqua"><?php echo Yii::t('app', "AFTER YOUR REGISTRATION"); ?></h2>
              <p><b class="text-aqua"><strong><?php echo Yii::t('app', "FREE"); ?></strong></b>: Workouts to start exercising immediately.</p>
              <p><b class="text-aqua"><strong><?php echo Yii::t('app', "OPTIONAL"); ?></strong></b>: Premium training and nutrition plans for maximum progress, individually adapted to you.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="display: none;">
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<footer class="main-footer" id="section-footer">
  <div class="footer-sidebars-wrapper">

    <div id="footer-sidebars" data-rows="5">
      <div class="row" data-num="0" style="margin-right: 0px">
        <aside class="col-lg-2" style="border-right: whitesmoke 1px solid;">
          <div id="text-2" class="widget widget_text">			<div class="textwidget"><img style="margin-top: 100px;" src="http://medigenehomoeocare.com/PBYINC/wp-content/uploads/2014/09/f_logo.png"></div>
          </div>						</aside>
        <aside class="col-lg-2">
          <div id="text-3" class="widget widget_text"><h4 class="widget-title">CONTACT  US</h4>			<div class="textwidget"><p>P.O. Box 3036<br>
                Hyattsville, Maryland 20784<br>
                United States</p>
              <p>Tel: 240-459-8265<br>
                E-mail:info@pbyinc.com</p>
              <p><a style="color:#ED2B94;" href="">Get Directions on the map</a></p>
            </div>
          </div>						</aside>
        <aside class="col-lg-2">
          <div id="nav_menu-13" style="border-right: whitesmoke 1px solid;" class="widget widget_nav_menu"><h4 class="widget-title">MAIN LINKS</h4><div class="menu-bottom-links-container"><ul id="menu-bottom-links" class="menu"><li id="menu-item-22573" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-22472 current_page_item menu-item-22573"><a href="http://medigenehomoeocare.com/PBYINC/">HOME</a></li>
                <li id="menu-item-22734" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22734"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=22619">ABOUT US</a></li>
                <li id="menu-item-22748" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22748"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=22178">PROGRAM</a></li>
                <li id="menu-item-22733" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22733"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=22546">GET INVOLVED</a></li>
                <li id="menu-item-22577" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22577"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=22548">MEDIA</a></li>
                <li id="menu-item-22735" class="menu-item menu-item-type-taxonomy menu-item-object-tribe_events_cat menu-item-22735"><a href="http://medigenehomoeocare.com/PBYINC/?tribe_events_cat=events">EVENTS</a></li>
                <li id="menu-item-22731" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22731"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=277">BLOG</a></li>
                <li id="menu-item-22732" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22732"><a href="http://medigenehomoeocare.com/PBYINC/?page_id=22179">CONTACT US</a></li>
              </ul></div></div>						</aside>
        <aside class="col-lg-6" style="border-right: whitesmoke 1px solid;">
          <div id="text-5" class="widget widget_text"><h4 class="widget-title">WHY US</h4>			<div class="textwidget">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>
          </div>						</aside>
      </div>
    </div>

  </div>
</footer>

<?php echo $this->renderPartial('//partials/dialogs'); ?>
<script>
  function validate(data) {
    if (!data.status) {
      var text = '';
      $.each(data.data, function (key, value) {
        text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
      });
      $("#modal_error .modal-body").html(text);
      $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
      $("#modal_error").modal("show");
    } else if (undefined !== data.email) {
      var message = '<?php echo Yii::t('app', 'Registr successfully. Check [0] to confirm.'); ?>';
      message = message.replace("[0]", data.email);
      $("#modal_success .modal-body").text(message);
      $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
      $("#modal_success").modal("show");
    }
  }

  function loginResult(data) {
    if (data.status == true) {
      window.location.href = '<?php echo Yii::app()->createUrl('/user'); ?>';
    } else {
      showError(data);
    }
  }

  function showError(data) {
    var text = '';
    if (data.data && $.isArray(data.data)) {
      $.each(data.data, function (key, value) {
        text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
      });
    }
    if (data.message) {
      text = data.message;
    }
    $("#modal_error .modal-body .message").html(text);
    $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
    $("#modal_error").modal("show");
  }

  function forgotResult(data) {
    if (data.status == true && (undefined !== data.email)) {
      var message = '<?php echo Yii::t('app', 'Send successfully. Check [0] to confirm.'); ?>';
      message = message.replace("[0]", data.email);
      $("#modal_success .modal-body").text(message);
      $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
      $("#modal_success").modal("show");
    } else {
      showError(data);
    }
  }
</script>

