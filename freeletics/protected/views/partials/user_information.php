<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
?>

<div class="container-top-information" style="min-height: 250px; background: url('<?php echo $baseUrl; ?>/img/profile-bg.jpg') center; 
     margin-top: -20px; margin-bottom: 20px; background-size: 100%;
     background-repeat: no-repeat;">
  <div class="container" style="padding-left: 40px; padding-top: 50px;">
    <div class="col-lg-3" id="avatar" style="text-align: center;
         height: 160px; width: 160px; 
         -webkit-clip-path: polygon(57.6px 0, 139.2px 22.4px, 160px 102.4px, 102.399px 160px, 22.4px 139.2px, 0 57.6px, 57.6px 0); 
         clip-path: url('<?php echo $baseUrl; ?>/file/hexagon_icon.svg#hexagon-clip-large');">
      <img height="100%" width="100%" style="
           height: 160px;
           width: 160px;
           position: absolute;
           top: 0;
           left: 0;
           z-index: 999;
           " src="<?php echo $baseUrl; ?>/img/X-man.jpg">
    </div>
    <style>
      .statics-workout-follow p{
        word-break: break-all;
        font-size: 20px;
      }
    </style>
    <div class="col-lg-10">
      <div class="row">
        <div class="col-lg-6">
          <div class="user-name" style="font-size: 30px; color: whitesmoke;">long hoang</div>
          <div class="description-join-date-user" style="font-size: 13px; color: whitesmoke;">Free Athlete since 2 days ago.</div>
        </div>
        <div class="col-lg-6 pull-right statics-workout-follow" style="color: whitesmoke; font-size: 14px;">
          <div class="row text-right">
            <div class="col-md-3">
              <p> 10 </p>
              <span><?php echo Yii::t('app', "WORKOUTS"); ?>&nbsp;</span>
            </div>
            <div class="col-md-3">
              <p>0</p>
              <span><?php echo Yii::t('app', "FOLLOWERS"); ?>&nbsp;</span>
            </div>
            <div class="col-md-3">
              <p> 10 </p>
              <span><?php echo Yii::t('app', "FOLLOWINGS"); ?>&nbsp;</span>
            </div>
            <div class="col-md-3">
              <p> 10 </p>
              <span><?php echo Yii::t('app', "POINTS"); ?>&nbsp;</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row process-point">
        <div class="col-lg-12">
          <div class="progress" style="background: rgba(50, 50, 50, 0.7); height: 10px;">
            <div class="progress-bar" style="background: rgba(131, 188, 223, 0.9); width: 20%"></div>
          </div>
        </div>
      </div>
      <div class="row text-primary">
        <div class="col-lg-5">
          <strong><?php echo Yii::t('app', "Level [0]"); ?></strong>
        </div>
        <div class="col-lg-3 pull-right text-right">
          <strong><?php echo Yii::t('app', "[0] Points to Level [1]"); ?></strong>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="" style="min-height: 500px;">
  <div class="container">
    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <button class="btn btn-default btn-block btn-flat"><?php echo Yii::t('app', "Feed"); ?></button>
          <button class="btn btn-default btn-block btn-flat"><?php echo Yii::t('app', "Recent"); ?></button>
          <button class="btn btn-default btn-block btn-flat active"><?php echo Yii::t('app', "PB"); ?></button>
          <button class="btn btn-default btn-block btn-flat"><?php echo Yii::t('app', "Network"); ?></button>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('app', "CHOOSE A CATEGORY"); ?></h3>
        </div>
        <div class="panel-body">
          <button class="btn btn-default btn-block btn-flat"><?php echo Yii::t('app', "WORKOUTS"); ?></button>
          <button class="btn btn-default btn-block btn-flat active"><?php echo Yii::t('app', "EXERCISES"); ?></button>
          <button class="btn btn-default btn-block btn-flat"><?php echo Yii::t('app', "RUNNING"); ?></button>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('app', "WORKOUTS"); ?></h3>
        </div>
        <div class="panel-body" style="min-height: 200px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
            <li><a href="#profile" data-toggle="tab">Profile</a></li>
            <li class="disabled"><a>Disabled</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Dropdown <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
                <li class="divider"></li>
                <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>