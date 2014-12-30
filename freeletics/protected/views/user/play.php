<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$rows = explode(PHP_EOL, $exercise->video_round);
$maxCount = 0;
foreach ($rows as $index => $row) {
  $extracted = explode(",", $row);
  if ($maxCount < count($extracted)) {
    $maxCount = count($extracted);
  }
}
?>
<style>
  .flip-clock-wrapper {
    width: inherit !important;
    margin: auto !important;
  }

  .btn-control {
    min-width: 200px;
  }

  .strike-out {
    text-decoration: line-through;
  }

  .input-comment {
    width: 100%;
  }
</style>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/flipclock.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/flipclock.min.js" type="text/javascript"></script>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<div class="container" style="padding-top: 70px;">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <div class="panel">
        <div class="panel-body">
          <form id='exercise-process' action="<?php echo Yii::app()->createUrl('/feed/newfeed'); ?>" >
            <?php if (isset($category->timer) && $category->timer == true) { ?>
              <div class="col-md-8 col-xs-12" id="count-exercise" method='post'>
                <input type="hidden" name="exercise-id" value="<?php echo Yii::app()->request->getParam('exercise'); ?>"/>
                <div id="timer">
                </div>
                <div class="clearfix" style="padding-top: 10px;"></div>
                <div class="col-md-4 col-xs-12">
                  <a class="btn btn-default btn-control" id="btn-previous-exercise" style="display: none;"><i class="fa fa-chevron-circle-left"></i>&nbsp;<?php echo Yii::t('app', 'Previous'); ?></a>
                </div>
                <div class="col-md-4 col-xs-12 text-center">
                  <a class="btn btn-primary btn-control" id="btn-start-timer"><i class="fa fa-clock-o"></i> <?php echo Yii::t('app', 'Start'); ?></a>
                </div>
                <div class="col-md-4 col-xs-12">
                  <a class="btn btn-default btn-control pull-right" id="btn-next-exercise" style="display: none;"><?php echo Yii::t('app', 'Next'); ?>&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            <?php } else { ?>
              <div class="col-md-8 col-xs-12">
                <input id="demo3_21" type="text" value="" name="demo3_21">
              </div>
            <?php } ?>
            <div class="col-md-8 col-xs-12" id="panel-post" style="display: none;">
              <div class="row">
                <textarea class="col-md-12" name="comment" placeholder="<?php echo Yii::t('app', 'Comment here'); ?>"
                          rows="4"></textarea>
                <div class="col-md-6">
                  <input type="submit" class="btn"/><i class="fa fa-save"></i>&nbsp;<?php echo Yii::t('app', 'post feed'); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-12" id="result-exercise">
              <div class="row">
                <div class="col-md-12 title">
                  <h1><?php echo $exercise->name; ?></h1>
                </div>
                <div class="col-md-5">
                  <?php echo Yii::t('app', 'PB'); ?>
                </div>
                <div class="col-md-7 column-PB">
                  <?php echo $bestPB['PB'] ? $bestPB['PB'] : 0; ?>
                </div>
                <div class="col-md-5">
                  <?php echo Yii::t('app', 'Star'); ?>
                </div>
                <div class="col-md-7">
                  <?php echo isset($bestPB['star']) && $bestPB['star'] == 1 ? 'Stared' : '&nbsp;'; ?>
                </div>
                <div class="col-md-5">
                  <?php echo Yii::t('app', 'Rewards'); ?>
                </div>
                <div class="col-md-7">
                  <?php echo $exercise->reward; ?>
                </div>
                <div class="col-md-5">
                  <?php echo Yii::t('app', 'Volumn'); ?>
                </div>
                <div class="col-md-7">
                  <?php echo $exercise->volumn; ?>
                </div>
                <div class="col-md-5">
                  <?php echo Yii::t('app', 'Equipments'); ?>
                </div>
                <div class="col-md-7">
                  <?php echo $exercise->equiments; ?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <table class="table table-striped table-hover " id="list-exercises">
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
            $textExtended = array();
            foreach ($rows as $index => $row) {
              $extracted = explode(",", $row);
              if (isset($extracted[0]) && isset($extracted[1])) {
                $video = $extracted[0];
                $name = $extracted[1];
                if (!$category->timer) {
                  $textExtended[$index] = $name;
                }
                unset($extracted[0]);
                unset($extracted[1]);
                ?>
                <tr>
                  <td><iframe src="<?php echo $video; ?>"></iframe></td>
                  <?php foreach ($extracted as $ext) { ?>
                    <td row-col="<?php echo $index; ?>"><?php echo Yii::t("app", $name, array("[0]" => $category->timer ? $ext : $category->default)); ?></td>
                  <?php } ?>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
  <?php // $this->renderPartial('//partials/rightContent'); ?>
</div>
<script>
  var textExtended = <?php echo json_encode($textExtended); ?>;
  var isStart = false;
  var numberOfExercises = <?php echo $exercise->total; ?>;
  $(function () {
<?php if (isset($category->timer) && $category->timer == true) { ?>
      var interval = undefined;
      var countdown = '<?php echo Constant::TIMER_BEFORE_START; ?>';
      var clock = $('#timer').FlipClock({
        autoStart: false
      });
      $("#btn-start-timer").click(function () {
        if (isStart) {
          isStart = false;
          clock.stop(function () {
          });
          startTraining(clock);
          $(this).html("<i class='fa fa-clock-o'></i> <?php echo Yii::t('app', 'start'); ?>");
          $(this).find("i").removeClass("fa-pause");
          $(this).find("i").addClass("fa-clock-o");
        } else {
          isStart = true;
          clock.setTime(countdown);
          interval = window.setInterval(function () {
            if (countdown > 0) {
              clock.setTime(--countdown);
            } else {
              startTraining(clock);
              clearInterval(interval);
              countdown = '<?php echo Constant::TIMER_BEFORE_START; ?>';
            }
          }, 1000);
          $(this).html("<i class='fa fa-pause'></i> <?php echo Yii::t('app', 'pause'); ?>");
          $(this).css("display", 'none');
          $(this).find("i").addClass("fa-pause");
          $(this).find("i").removeClass("fa-clock-o");
        }
      });

      $("#btn-next-exercise").click(function () {
        if (numberOfExercises - 1 > $("#list-exercises tbody td.strike-out").length) {
          checkPoint();
        } else {
          clock.stop();
          $('#list-exercises tbody td[row-col]').addClass("strike-out");
          startTraining(clock);
        }
      });
      $("#btn-previous-exercise").click(function () {
        checkPoint();
      });
<?php } else { ?>
      $("input[name='demo3_21']").TouchSpin({
        initval: <?php echo $category->default; ?>,
        step: 10,
        min: 10,
        max: 2000,
        buttondown_class: "btn btn-link",
        buttonup_class: "btn btn-link"
      }).on("touchspin.on.startspin", function () {
        var that = $(this);
        $(textExtended).each(function (index) {
          $("table#list-exercises tbody td[row-col='" + index + "']").text(this.replace("[0]", that.val()));
        });
      });
<?php } ?>
  });

  function startTraining(clock) {
    $.post('<?php echo Yii::app()->createUrl('/performexercise/execute') ?>',
            {
              'time': clock.getTime().time - 1,
              'exercise': '<?php echo Yii::app()->request->getParam('exercise'); ?>'
            },
    function (data) {
      if (data.status === '<?php echo Constant::RS_ST_OK; ?>') {
        if (data.start == true) {
          clock.start(function () {
          });
          $(".btn-control").css("display", 'block');
        } else {
          $(".column-PB").text(data.time);
          $(".column-star").text(data.star);
          if (numberOfExercises == $("#list-exercises tbody td.strike-out").length) {
            $("#count-exercise").css("display", 'none');
            $("#panel-post").css("display", 'block');
          }
        }
      } else {
        // Server error
      }
    }, 'json');
  }

  function checkPoint(type) {
    $.post('<?php echo Yii::app()->createUrl('/performexercise/checkpoint') ?>',
            {
            },
            function (data) {
              if (data.status === '<?php echo Constant::RS_ST_OK; ?>') {
                console.log(data);
                if (data.start == true) {
                } else {
                }
              } else {
                // Server error
              }
            }, 'json');
    $("#list-exercises tbody td[row-col]").each(function (index) {
      if (!$(this).hasClass("strike-out")) {
        $(this).addClass("strike-out");
        return false;
      }
    });
  }
</script>