<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$type = isset(Yii::app()->controller->actionParams['type']) ? Yii::app()->controller->actionParams['type'] : 'WORKOUTS';
$type = strtoupper($type);
?>

<?php
$exerciseCategoryArray = array();
foreach ($exercises as $key => $exe) {
  $exerciseIds = explode(",", trim($exe->exercises));
  $exerciseCategoryArray[$exe->id] = $exe->attributes;

  $exerciseCategoryArray[$exe->id]['exercisesAll'] = $exerciseIds;
}
?>

<script>
  $(function() {
    $('.spinEdit').spinedit({
      minimum: 20,
      maximum: 400,
      step: 5,
      numberOfDecimals: 0
    });
  });
  function submitForm() {
    var form = $("<form/>", {
      action: "",
      method: "post"
    });
    var input = $("<input/>", {
      value: function() {
        var value = "";
        $("#form_challenge .exercises").each(function() {
          if ($(this).is(":checked")) {
            value += $(this).val() + ",";
          }
        });
        return value;
      },
      name: "exercises"
    });
    $(form).append(input);
    input = $("<input/>", {
      value: function() {
        var value = "";
        $("#form_challenge .user").each(function() {
          if ($(this).is(":checked")) {
            value += $(this).val() + ",";
          }
        });
        return value;
      },
      name: "user"
    });
    $(form).append(input);
    input = $("<input/>", {
      value: $("#form_challenge .time").val(),
      name: "time"
    });
    $(form).append(input);
    $(form).submit();
  }
</script>
<div class="container" style="margin-top: 50px;" id="form_challenge">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <ul class="nav nav-tabs" style="padding-top: 10px;">
            <?php
            $index = 0;
            foreach ($exercises as $exe) {
              ?>
              <?php if ($exe['visible']) { ?>
                <li class="<?php echo $exe->name == $type ? 'active' : ''; ?>"><a href="#<?php echo strtoupper($exe->name); ?>" data-toggle="tab"><?php echo strtoupper(Yii::t('app', $exe->name)); ?></a></li>
              <?php } ?>
            <?php } ?>
          </ul>
          <div id="myTabContent" class="tab-content" style="padding-top: 10px;">
            <?php
            foreach ($exerciseCategoryArray as $id => $exe) {
              if ($exe['visible']) {
                ?>
                <div class="tab-pane fade <?php echo $exe['name'] == $type ? 'active' : ''; ?> in" id="<?php echo strtoupper($exe['name']); ?>">
                  <div class="row">
                    <?php if (!$exe['collect']) { ?>
                      <div class="col-lg-12">
                        <div class="list-group">
                          <?php foreach ($exe['exercisesAll'] as $id => $e) { ?>
                            <input type="checkbox" class="ckb-exercise exercises" id="exercise_<?php echo $index ?>" name=""
                                   value="<?php echo $e ?>"/>
                            <label for="exercise_<?php echo $index++; ?>">
                              <?php $exeModel = Exercise::model()->findByPk($e); ?>
                              <?php echo Yii::t("app", $exeModel->name); ?>
                            </label>
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
                      <?php foreach ($exe['exercisesAll'] as $id => $e) { ?>
                        <div class="col-lg-9" id="">
                          <div class="list-group">
                            <?php $exeCategoryModel = ExerciseCategory::model()->findByPk($e); ?>
                            <?php $exercises = explode(",", $exeCategoryModel->exercises); ?>
                            <?php foreach ($exercises as $idExe => $exercise) { ?>
                              <?php $exeModel = Exercise::model()->findByPk($exercise); ?>
                              <input type="checkbox" class="ckb-exercise exercises" id="exercise_<?php echo $index; ?>" name=""
                                     value="<?php echo $exeModel->id; ?>"/>
                              <label for="exercise_<?php echo $index++; ?>">
                                <?php echo Yii::t("app", $exeModel->name); ?>
                              </label>

                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
          <div class="list-group">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <input type="text" class="time" name=""/>&nbsp;<?php echo Yii::t("app", "minutes"); ?>
          <div class="list-group">
            <?php foreach ($users as $index => $user) { ?>
              <div class="list-group-item">
                <input type="checkbox" class="ckb-user user" id="user_<?php echo $index; ?>" name=""
                       value="<?php echo $user->id; ?>"/>
                <label for="user_<?php echo $index; ?>"><?php echo $user->first . ' ' . $user->last; ?></label>
              </div>
            <?php } ?>
          </div>
          <button class="btn btn-sm" onclick="submitForm();"><?php echo Yii::t("app", "Sumbit"); ?></button>
        </div>
      </div>
    </div>
  </div>
</div>