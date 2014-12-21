<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$type = isset(Yii::app()->controller->actionParams['type']) ? Yii::app()->controller->actionParams['type'] : 'WORKOUTS';
$type = strtoupper($type);
switch ($type) {
  case 'EXERCISES':

    break;
  case 'RUNNING':

    break;
  default :
    break;
}
?>

<?php
$exerciseCategoryArray = array();
foreach ($exercises as $key => $exe) {
  $exerciseIds = explode(",", trim($exe->exercises));
  $exerciseCategoryArray[$exe->id] = $exe->attributes;

  $exerciseCategoryArray[$exe->id]['exercisesAll'] = $exerciseIds;
}
?>

<div class="container" style="padding-top: 70px;">
  <div class="col-lg-7 col-sm-12" style="background-color: white; height: 1400px;">
    <ul class="nav nav-tabs" style="padding-top: 10px;">
      <?php foreach ($exercises as $exe) { ?>
      <?php if ($exe['visible']) { ?>
        <li class="<?php echo $exe->name == $type ? 'active' : ''; ?>"><a href="#<?php echo strtoupper($exe->name); ?>" data-toggle="tab"><?php echo strtoupper(Yii::t('app', $exe->name)); ?></a></li>
      <?php } ?>
      <?php } ?>
    </ul>
    <div id="myTabContent" class="tab-content" style="padding-top: 10px;">
      <?php foreach ($exerciseCategoryArray as $id => $exe) { 
        if ($exe['visible']) {
        ?>
        <div class="tab-pane fade <?php echo $exe['name'] == $type ? 'active' : ''; ?> in" id="<?php echo strtoupper($exe['name']); ?>">
          <div class="row">
            <?php if (!$exe['collect']) { ?>
              <div class="col-lg-12">
                <div class="list-group">
                  <?php foreach ($exe['exercisesAll'] as $id => $e) { ?>
                    <a href="?t=<?php echo $e; ?>" class="list-group-item <?php echo in_array($e, $myExercises) ? '' : 'disabled' ?>">
                      <?php $exeModel = Exercise::model()->findByPk($e); ?>
                      <?php echo Yii::t("app", $exeModel->name); ?>
                    </a>
                  <?php } ?>
                </div>
              </div>
            <?php } else { ?>
              <div class="col-lg-3">
                <div class="list-group">
                  <?php foreach ($exe['exercisesAll'] as $id => $e) { ?>
                    <a href="#" class="list-group-item">
                      <?php $exeModel = ExerciseCategory::model()->findByPk($e); ?>
                      <?php echo Yii::t("app", $exeModel->name); ?>
                    </a>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="list-group">
                  <?php foreach ($exe['exercisesAll'] as $id => $e) { ?>
                    <a href="#" class="list-group-item <?php echo in_array($e, $myExercises) ? '' : 'disabled' ?>">
                      <?php $exeModel = Exercise::model()->findByPk($e); ?>
                      <?php echo Yii::t("app", $exeModel->name); ?>
                    </a>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <?php } ?>
    </div>
  </div>
  <?php $this->renderPartial('//partials/rightContent'); ?>
</div>