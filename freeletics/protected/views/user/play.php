<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$rounds = explode(PHP_EOL, $exercise->video_round);
$maxCount = 0;
foreach ($rounds as $index => $round) {
  $extracted = explode(",", $round);
  if ($maxCount < count($extracted)) {
    $maxCount = count($extracted);
  }
}
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/flipclock.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/flipclock.min.js" type="text/javascript"></script>
<script>
  $(function () {
    var clock = $('#timer').FlipClock({
      autoStart: false
    });
  });
</script>
<div class="container" style="padding-top: 70px;">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <div class="col-md-12 col-xs-12" id="timer">

      </div>
      <div class="col-md-12 col-xs-12" id="result-exercise">

      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th></th>
              <?php
              for ($index = 0; $index < $maxCount - 2; $index++) {
                ?>
                <th><?php echo Yii::t('app', 'Round') . " " . ($index + 1); ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($rounds as $index => $round) {
              $extracted = explode(",", $round);
              if (isset($extracted[0]) && isset($extracted[1])) {
                $video = $extracted[0];
                $name = $extracted[1];
                unset($extracted[0]);
                unset($extracted[1]);
                ?>
                <tr>
                  <td><iframe src="<?php echo $video; ?>"></iframe></td>
                  <?php foreach ($extracted as $ext) { ?>
                    <td><?php echo Yii::t("app", $name, array("[0]" => $ext)); ?></td>
                  <?php } ?>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
  <?php $this->renderPartial('//partials/rightContent'); ?>
</div>