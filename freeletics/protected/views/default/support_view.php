<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" id="helpContainter">
  <div class="<?php echo $ads ? 'col-lg-7' : 'col-lg-8'; ?>">
    <div class="panel">
      <div class="panel-body change-content" style="">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li class="active"><?php echo $id; ?></li>
        </ul>
        <div  style="padding: 10px;">
        <div class="row">
          <div class="col-lg-12 col-sm-6 ">
            <h4><?php echo $message; ?></h4>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-lg-12 col-sm-6" >
            
            The following steps serve as a check for a successful registration:

            1) Have you received the confirmation email after registration?

            2) Have you confirmed the confirmation email?

            The Freeletics basic package training plan emails are sent out once a week. 
            If for example you signed up on a Tuesday, you will receive your first instruction email the 
            following Tuesday. If you still can’t find the email, please check your spam and deleted messages folders. Many of our emails end up there due the “Free” in our name. 
            It therefore makes sense to add info@freeletics.com to your contacts.
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="padding-top: 10px;">
          <div class="col-lg-12 col-sm-6 ">
            <?php echo Yii::t('app', "Have more questions?"); ?>
            <a class="" href="#">
              <?php echo Yii::t('app', "Submit a request"); ?>
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->renderPartial("//partials/rightContent");?>
</div>