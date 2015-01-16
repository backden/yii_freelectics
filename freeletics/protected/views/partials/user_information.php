<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
?>
<?php
if (!Yii::app()->user->isGuest) {
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => true,
      'controller' => 'user',
      'actionName' => 'personal',
      'width' => '40%',
      "menus" => $menus = array(
        "Me" => array('links' => array("feed", "recent", "PB", "network"), 'menus' => array('Feed', 'Recent', 'PB', 'Network')),
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
}
?>
<div class="" style="padding-top: 80px;">
  <div class="container-top-information" style="min-height: 250px; background-image: url(<?php echo $baseUrl; ?>/img/profile-bg.jpg);">
    <div class="container" style="padding-left: 40px; padding-top: 60px; padding-bottom: 40px;">
      <div class="col-md-3 col-xs-12" id="avatar" style="">
        <div class="hexagon hexagon1" style="width:170px; height: 150px;">
          <div class="hexagon-in1">
            <div class="hexagon-in2" style="background-image: url(<?php echo Yii::app()->baseUrl . '/img/X-man.jpg' ?>);"></div>
          </div>
        </div>
      </div>
      <style>
        .statics-workout-follow p{
          word-break: break-all;
          font-size: 20px;
        }
      </style>
      <div class="col-lg-9 col-md-9 col-xs-9">
        <div class="row">
          <div class="col-lg-6">
            <div class="user-name" style="font-size: 30px; color: whitesmoke;"><?php echo $user->email; ?></div>
            <div class="description-join-date-user" style="font-size: 13px; color: whitesmoke;">
              <?php
              //$dateDiff = date_diff(date_create($user->create_date), date_create(date('Y-m-d', time())));
//            echo Yii::t(
//              "app", "Free Athlete since [0] [1] ago.", 
//              array("[0]" => $dateDiff->m > 0 ? $dateDiff->m : $dateDiff->d, "[1]" => $dateDiff->m > 0 ? Yii::t('app', 'months') : Yii::t('app', 'days'))); 
              ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 pull-right statics-workout-follow" style="color: whitesmoke; font-size: 14px;">
            <div class="row text-right">
              <div class="col-md-3 col-xs-6">
                <p> <?php echo 10; ?> </p>
                <span><?php echo Yii::t('app', "WORKOUTS"); ?>&nbsp;</span>
              </div>
              <div class="col-md-3 col-xs-6">
                <p><?php echo $user->follower->total; ?></p>
                <span><?php echo Yii::t('app', "FOLLOWERS"); ?>&nbsp;</span>
              </div>
              <div class="col-md-3 col-xs-6">
                <p> <?php echo $user->following->total; ?> </p>
                <span><?php echo Yii::t('app', "FOLLOWINGS"); ?>&nbsp;</span>
              </div>
              <div class="col-md-3 col-xs-6">
                <p> <?php echo 10; ?> </p>
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
            <strong><?php echo Yii::t('app', "Level [0]", array("[0]" => $user->level->level_id)); ?></strong>
          </div>
          <div class="col-lg-3 pull-right text-right">
            <strong><?php echo Yii::t('app', "[0] Points to Level [1]"); ?></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="" style="min-height: 500px;">
    <?php  $this->renderPartial(isset($partial) ? $partial : $data['partial'], $data); ?>
  </div>
</div>