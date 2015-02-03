<?php
$model = new User();
?>

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