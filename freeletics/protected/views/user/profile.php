<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if (!Yii::app()->user->isGuest) {
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => true,
      'controller' => 'user',
      'width' => '33%',
      "menus" => $menus = array(
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
}
?>
<div class="container" id="form-update-account" style="margin-top: 100px;">
  <div class="col-md-12">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableClientValidation' => true,
        'method' => 'POST',
        'action' => Yii::app()->createUrl('/user/update'),
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false
        ),
    ));
    ?>
    <input type="hidden" name="form" value="user-form"/>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "YOUR ACCOUNT"); ?></h4>
      </div>
      <div class="panel-body">
        <div class="col-md-8 col-md-offset-2 form-horizontal">
          <div class="row form-group">
            <label for="user_first_name" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'First Name'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo $form->textField($model, 'first', array('class' => 'form-control', 'placeholder' => Yii::t('app', "First"), 'size' => 20, 'maxlength' => 20)); ?>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_last_name" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Last Name'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo $form->textField($model, 'last', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Last"), 'size' => 20, 'maxlength' => 20)); ?>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_email" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Email Address'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_locale" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Language'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo CHtml::dropDownList('User[language]', $model->language, CHtml::listData(Language::model()->findAll(), 'name', 'country'), array('class' => 'form-control')); ?>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-lg-3 col-sm-12 ng-binding"><?php echo Yii::t("app", 'Password'); ?></label>
            <div class="col-lg-9 col-sm-12"><span class=""><?php echo Yii::t("app", 'Change password'); ?></span></div>
          </div>
          <!-- ngIf: showPasswordChange -->
          <div class="row form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
              <button class="btn btn-primary btn-block" ><i class="fa fa-save"></i>&nbsp;<?php echo Yii::t("app", 'Save changes'); ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "YOUR TRAINING PROFILE"); ?></h4>
      </div>
      <div class="panel-body">
        <div class="col-md-8 col-md-offset-2 form-horizontal">
          <div class="row form-group">
            <label for="user_city" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'City'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size' => 50, 'maxlength' => 50)); ?>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_gender" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Gender'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <?php echo CHtml::dropDownList('User[gender]', $model->gender, array("0" => Yii::t("app", 'Male'), "1" => Yii::t("app", 'Female'), "2" => "Other"), array('class' => 'form-control')); ?>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_birthday_month" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Birthday'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <div class="row">
                <?php echo $form->hiddenField($model, 'birthday', array('id' => 'user-birthday')); ?>
                <div class="col-lg-12 col-sm-12">
                  <div class="input-group">
                    <input type="text" class="form-control" value="<?php echo $model->birthday; ?>" id="date-picker" data-date-format="YYYY/MM/DD" readonly="true" style="">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn-datepicker-open" onclick="return false;" type="button"><i class="fa fa-calendar-o"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_weight" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Weight'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <?php echo $form->textField($model, 'weight', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Weight"), 'maxlength' => 6)); ?>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <?php echo CHtml::dropDownList('User[unitWeight]', $model->unitWeight, array("0" => Yii::t("app", 'kg'), "1" => Yii::t("app", 'lbs')), array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <label for="user_height" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Height'); ?></label>
            <div class="col-lg-9 col-sm-12">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <?php echo $form->textField($model, 'height', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Height"), 'maxlength' => 6)); ?>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <?php echo CHtml::dropDownList('User[unitHeight]', $model->unitHeight, array("0" => Yii::t("app", 'cm'), "1" => Yii::t("app", 'inch')), array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
              <?php
//              echo CHtml::ajaxButton(Yii::t('app', Yii::t("app", 'Save changes')), CHtml::normalizeUrl(array('/user/update', 'form' => 'user-form')), array(
//                  'dataType' => 'json',
//                  'type' => 'post',
//                  'success' => 'updateResult',
//                  'beforeSend' => 'function(){                        
//                           }'
//                ), array('id' => 'btn_update_account', 'class' => 'btn btn-primary btn-block', "style" => "width: 100%; display: none;"));
              ?>
              <button class="btn btn-primary btn-block" ><i class="fa fa-save"></i>&nbsp;<?php echo Yii::t("app", 'Save changes'); ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
</div>
<style>
  #form-update-account h4 {
    margin-bottom: 0px;
    text-align: center;
  }
</style>
<script>
  $(function() {
    $("#date-picker").datepicker({
      onRender: function(date) {
        return '<?php echo $model->birthday == '0000-00-00 00:00:00' ? date('Y-m-d', time()) : $model->birthday; ?>';
      },
      format: 'yyyy-mm-dd'
    }).on('changeDate', function(ev) {
      $("#user-birthday").val($(this).val());
    });
    $(".btn-datepicker-open").click(function() {
      $("#date-picker").datepicker('show');
    });
  });
  function updateResult(data) {
    if (data.status) {
      window.location.href = '';
    } else {
      var text = '';
      if (data.data) {
        $.each(data.data, function(key, value) {
          text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
        });
      }
      if (data.message) {
        text = data.message;
      }
      $("#modal_error .modal-body .message").html(text);
      $("#modal_login, #modal_sign_up, #modal_forgot, #modal_setting_your_account").modal("hide");
      $("#modal_error").modal("show");
    }
    return false;
  }
</script>