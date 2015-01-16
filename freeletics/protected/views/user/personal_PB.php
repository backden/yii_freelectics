<?php
/*
 * Filter best points
 */
?>
<style>
  #choose-category .nav.nav-tabs li {
    width: 100%;
  }
</style>
<div class="container" style="margin-top: 5px">
  <div class="col-lg-3">
    <div class="panel panel-default" id="choose-category">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo Yii::t('app', "CHOOSE A CATEGORY"); ?></h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="">
            <a href="#home" class="btn btn-default btn-block btn-flat" data-toggle="tab" aria-expanded="false">
              <?php echo Yii::t('app', "WORKOUTS"); ?>
            </a>
            <a href="#home" class="btn btn-default btn-block btn-flat" data-toggle="tab" aria-expanded="false">
              <?php echo Yii::t('app', "EXERCISES"); ?>
            </a>
            <a href="#home" class="btn btn-default btn-block btn-flat" data-toggle="tab" aria-expanded="false">
              <?php echo Yii::t('app', "RUNNING"); ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title" style="display: inline-block"><?php echo Yii::t('app', "EXERCISES"); ?></h3>
        <select class="pull-right">
          <option value=""><?php echo "Test 1"; ?></option>
          <option value=""><?php echo "Test 2"; ?></option>
          <option value=""><?php echo "Test 3"; ?></option>
          <option value=""><?php echo "Test 4"; ?></option>
        </select>
      </div>
      <div class="panel-body" style="min-height: 200px;">
        <div class="btn-group btn-group-justified">
          <a class="btn btn-default" href="#home" data-toggle="tab"><?php echo Yii::t("app", "Endurance"); ?></a>
          <a class="btn btn-default" href="#profile" data-toggle="tab"><?php echo Yii::t("app", "Standard"); ?></a>
          <a class="btn btn-default" href="#profile" data-toggle="tab"><?php echo Yii::t("app", "Strength"); ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
</div>
