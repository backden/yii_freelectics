<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js"></script>
  </head>
  <body id="page-top" class="main" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>
    <?php $this->renderPartial("//partials/modal_user", array('model' => isset($model) ? $model : new User)); ?>
    <?php $this->renderPartial("//partials/navbar_homepage"); ?>

    <?php echo $content; ?>

    <?php $this->renderPartial("//partials/footer"); ?>
    <style>
      .menu-bottom-links-container ul {
        list-style: none !important;
        padding: 5px;
      }
      .prevPage, .nextPage{
        background: transparent;
        border: 0;
        opacity: 1;
        font-size: 60px;
        position: absolute;
        left: 1%;
        top: 35%;
        display: block;
      }

      .nextPage {
        left: auto !important;
        right: 1%;
      }

    </style>
    <nav class="navbar navbar-custom nav-footer-fixed" role="navigation" style="background-color: black;">
      <div class="">
        <h5 class="text-center" style="color: #ffffff;">Copyright © 2014. All Rights Reserved.</h5>
      </div>
    </nav>

    <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display: none">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <div class="modal-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo Yii::t('app', "Search"); ?>">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<?php { $this->renderPartial("//partials/script_css"); } ?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.comment.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.comment.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.autogrow-textarea.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.timeago.js" type="text/javascript"></script>
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
</html>