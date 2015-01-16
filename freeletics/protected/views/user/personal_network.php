<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$followers = $data['followers'];
$followings = $data['followings'];
?>
<style>
  #network-container h4 {
    margin-bottom: 0;
  }
</style>
<div class="container" id="network-container">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "Followers"); ?></h4>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($followers as $index => $fl) { ?>
          <a href="#" class="list-group-item" style="min-height: 60px;">
              <div class="hexagon hexagon1 pull-left" style="width:100px; height: 35px;">
                <div class="hexagon-in1">
                  <div class="hexagon-in2" style="background-image: url(<?php echo Yii::app()->baseUrl . '/img/X-man.jpg' ?>);
                       background-size: 40%;"></div>
                </div>
              </div>
              <?php echo $fl->first . ' ' . $fl->last; ?>
              <span class=""><i class="fa fa-circle-o"></i></span>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "Followings"); ?></h4>
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
</div>
