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
      </div>
      <div class="modal-footer" style="display: none;">
      </div>
    </div>
  </div>
</div>

<?php echo $this->renderPartial('//partials/dialogs'); ?>
<script>
  function validate(data) {
    if (!data.status) {
      var text = '';
      $.each(data.data, function(key, value) {
        text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
      });
      $("#modal_error .modal-body .message").html(text);
      $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
      $("#modal_error").modal("show");
    } else if (undefined !== data.email) {
      var message = '<?php echo Yii::t('app', 'Registr successfully. Check [0] to confirm.'); ?>';
      message = message.replace("[0]", data.email);
      $("#modal_success .modal-body .message").text(message);
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
      $.each(data.data, function(key, value) {
        text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
      });
    } else if (data.data) {
      for (key in data.data) {
        text += "<strong style='color: red'>" + key + ":</strong> " + data.data[key].join("<br/>") + "<br/>";
      }
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
      $("#modal_success .modal-body .message").text(message);
      $("#modal_login, #modal_sign_up, #modal_forgot").modal("hide");
      $("#modal_success").modal("show");
    } else {
      showError(data);
    }
  }
  $(function() {
    
  });
  window.fbAsyncInit = function() {
      FB.init({
        appId: '322142577992142',
        xfbml: true,
        version: 'v2.1'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
          console.log('Good to see you, ' + response.name + '.');
        });
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
    
</script>