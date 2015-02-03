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
<?php
$this->renderPartial("//partials/scroll_dots", array(
    "sections" => array("intro", "section1", "section2", "section3", "section4", "section5")
));
?>
<?php
echo $this->renderPartial("//partials/section_intro_home", array(
    "width" => "70%"
));
?>
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
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" >
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
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" >
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
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" >
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
      <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" >
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

<?php echo $this->renderPartial("//partials/section_horizontal_scroll"); ?>
<!-- section end -->

<!-- section image -->
<section id="section3" class="" style="background: url(<?php echo Yii::app()->baseUrl; ?>/img/pattern.jpg);
         height: 400px;">
  <div class="container">
    <div class="col-md-8 col-xs-8 pull-left" style="">
      <div class="" style="background: url(<?php echo Yii::app()->baseUrl; ?>/img/anja-arne.png);
           background-size: contain; background-repeat: no-repeat;
           height: 350px; width: 50%; margin: auto;"></div>
    </div>
    <div class="col-md-4 col-xs-4">
      <h1 class="text-primary"><?php echo Yii::t("app", "FREELETICS ROLE MODELS"); ?></h1>
      <button class="btn btn-primary btn-lg btn-specify-tab-3">
        <?php echo Yii::t('app', "Success Stories"); ?>
      </button>
    </div>
  </div>
</section>
<!-- section end -->

<style>
  .dynamicTile .col-sm-2.col-xs-4{
    padding:5px;
  }

  .dynamicTile .col-sm-4.col-xs-8{
    padding:5px;
  }
</style>
<script>
  $(function() {
    $(".view.effect").width("100%");
    $(".view.effect img").width("100%");
  });
</script>
<script>

  $(function() {
    var array = {
      "title": '<?php echo "This is video This is video This is video"; ?>',
      "img": "<?php echo "http://placehold.it/460x220"; ?>",
      "href": "",
      "location": "from a location",
      "author": "name of blogger"
    };
    var tiles = $(".tiled");
    $.each([array, array, array, array, array, array, array, array, array, array, array, array], function(i, e) {
      var prototype = $("#prototype_tile").clone().removeAttr('id').show();
      $(prototype).find("img").attr("src", e.img);
      $(prototype).find(".content .title").text(e.title);
      $(prototype).find(".content a").attr("href", e.href);
      $(prototype).find(".content .location").text(e.location);
      $(prototype).find(".content .author").text(e.author);

      $(prototype).find(".content a").click(function(e) {

        return false;
      });

      if (i < tiles.length) {
        $(tiles[i]).append(prototype);
      } else {
//        return false;
      }
    });

    /* default settings */
    $('.venobox').venobox();


    /* custom settings */
    $('.venobox_custom').venobox({
      framewidth: '400px', // default: ''
      frameheight: '300px', // default: ''
      border: '10px', // default: '0'
      bgcolor: '#5dff5e', // default: '#fff'
      titleattr: 'data-title', // default: 'title'
      numeratio: true, // default: false
      infinigall: true            // default: false
    });

    /* auto-open #firstlink on page load */
    $("#firstlink").venobox().trigger('click');
  });
</script>
<div id="prototype_tile" class="tile" style="display: none;">
  <div class=""  style="/*  */">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="view effect">  
        <img src="http://placehold.it/460x220" />  
        <div class="mask"></div>
        <div class="content">
          <p class="title truncate"><?php echo ""; ?></p>
          <p class="author truncate"><?php echo ""; ?></p>
          <p class="location truncate"></p>
          <a href="#" class="btn btn-primary btn-transparent venobox"
             data-type="vimeo" href="http://vimeo.com/75976293">
               <?php echo Yii::t("app", 'Watch'); ?>
          </a>
        </div>  
      </div>
    </div>
  </div>
</div>
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
      <div class="col-lg-6 col-sm-6 col-xs-12 tiled">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>

      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>
    </div>
    <div class="row " style="">
      <div class="col-lg-6 col-sm-6 col-xs-12 tiled" style="
           float: right;
           ">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>

      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6 tiled">

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
            <?php echo $form->labelEx($model, 'first'); ?>
            <?php echo $form->textField($model, 'first', array('class' => 'form-control', 'placeholder' => Yii::t('app', "First"), 'size' => 20, 'maxlength' => 20)); ?>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php echo $form->labelEx($model, 'last'); ?>
            <?php echo $form->textField($model, 'last', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Last"), 'size' => 20, 'maxlength' => 20)); ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Password"), 'size' => 50, 'maxlength' => 50)); ?>
            <div class="checkbox">
              <label>
                <?php echo $form->checkBox($model, 'notice', array('class' => '',)); ?>
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
</section>
<!-- /Section: services -->

<?php echo $this->renderPartial('//partials/dialogs'); ?>