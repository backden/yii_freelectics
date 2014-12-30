<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$webroot = Yii::getPathOfAlias('webroot');
$file = $webroot . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . "GroupsList.csv";
$fp = fopen($file, "r");
$groupArray = array(
);
if ($fp) {
  $headers = fgetcsv($fp);
  $index = 0;
  while (($line = fgetcsv($fp))) {
    $groupArray[$index] = array();
    foreach ($line as $key => $value) {
      $groupArray[$index][$headers[$key]] = $value;
    }
    $index++;
  }
  fclose($fp);
  $groups = $groupArray;
}
?>

<div class="">
  <div class="row">
    <div class="col-md-12">
      <div id="commontabs" class="tab-content">
        <!-- foundation -->
        <div class="tab-pane fade <?php echo $type == 'ref_foundation' ?  'active' : ''; ?> in" id="ref_foundation">
          <div class="row">
            <div class="col-md-6 col-xs-12 pull-left">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <?php echo Yii::t("app", "YOUR FIRST EXPERIENCE"); ?>
                </div>
                <div class="panel-body">
                  <?php echo Yii::t('app', "When you start Freeletics, the first big challenge is to complete a whole workout. Watch all tutorials carefully and make sure to perform the exercises correctly. Don’t start too fast. If your body is not used to the intensity, you will have to pace yourself wisely to get through. And even then you might need several attempts. That's ok. Keep trying. It’s tough at the beginning but don’t even consider giving up. You have it within you and you will adapt quickly." . "<br/>" . "Once you've made it through your first workout, the next challenge is to fully master the predefined range of motion in each exercise. Train as quickly as possible. Never take breaks unless absolutely necessary. Don’t risk injury, train smart and work on technique to get the best results possible."); ?>
                </div>
                <div class="panel-footer bg-light-blue">
                  <p><?php echo Yii::t('app', "Please inform yourself about implications of high intensity training for your health, restrictions and cases that require medical advice so that you can train smart and healthy."); ?>
                  </p>
                  <button class="btn btn-primary btn-sm"><?php echo Yii::t("app", "Inform yourself") ?></button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12 pull-right">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <?php echo Yii::t("app", "YOUR FIRST EXPERIENCE"); ?>
                </div>
                <div class="panel-body">
                  <?php echo Yii::t('app', "When you start Freeletics, the first big challenge is to complete a whole workout. Watch all tutorials carefully and make sure to perform the exercises correctly. Don’t start too fast. If your body is not used to the intensity, you will have to pace yourself wisely to get through. And even then you might need several attempts. That's ok. Keep trying. It’s tough at the beginning but don’t even consider giving up. You have it within you and you will adapt quickly." . "<br/>" . "Once you've made it through your first workout, the next challenge is to fully master the predefined range of motion in each exercise. Train as quickly as possible. Never take breaks unless absolutely necessary. Don’t risk injury, train smart and work on technique to get the best results possible."); ?>
                </div>
                <div class="panel-footer">
                  <?php echo Yii::t('app', "Please inform yourself about implications of high intensity training for your health, restrictions and cases that require medical advice so that you can train smart and healthy."); ?>
                  <button class="btn btn-primary"><?php echo Yii::t("app", "Inform yourself") ?></button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12 pull-right">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <?php echo Yii::t("app", "YOUR FIRST EXPERIENCE"); ?>
                </div>
                <div class="panel-body">
                  <?php echo Yii::t('app', "When you start Freeletics, the first big challenge is to complete a whole workout. Watch all tutorials carefully and make sure to perform the exercises correctly. Don’t start too fast. If your body is not used to the intensity, you will have to pace yourself wisely to get through. And even then you might need several attempts. That's ok. Keep trying. It’s tough at the beginning but don’t even consider giving up. You have it within you and you will adapt quickly." . "<br/>" . "Once you've made it through your first workout, the next challenge is to fully master the predefined range of motion in each exercise. Train as quickly as possible. Never take breaks unless absolutely necessary. Don’t risk injury, train smart and work on technique to get the best results possible."); ?>
                </div>
                <div class="panel-footer">
                  <?php echo Yii::t('app', "Please inform yourself about implications of high intensity training for your health, restrictions and cases that require medical advice so that you can train smart and healthy."); ?>
                  <button class="btn btn-primary"><?php echo Yii::t("app", "Inform yourself") ?></button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12 pull-left">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <?php echo Yii::t("app", "YOUR FIRST EXPERIENCE"); ?>
                </div>
                <div class="panel-body">
                  <?php echo Yii::t('app', "When you start Freeletics, the first big challenge is to complete a whole workout. Watch all tutorials carefully and make sure to perform the exercises correctly. Don’t start too fast. If your body is not used to the intensity, you will have to pace yourself wisely to get through. And even then you might need several attempts. That's ok. Keep trying. It’s tough at the beginning but don’t even consider giving up. You have it within you and you will adapt quickly." . "<br/>" . "Once you've made it through your first workout, the next challenge is to fully master the predefined range of motion in each exercise. Train as quickly as possible. Never take breaks unless absolutely necessary. Don’t risk injury, train smart and work on technique to get the best results possible."); ?>
                </div>
                <div class="panel-footer">
                  <?php echo Yii::t('app', "Please inform yourself about implications of high intensity training for your health, restrictions and cases that require medical advice so that you can train smart and healthy."); ?>
                  <button class="btn btn-primary"><?php echo Yii::t("app", "Inform yourself") ?></button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <?php echo Yii::t("app", "YOUR FIRST EXPERIENCE"); ?>
                </div>
                <div class="panel-body">
                  <?php echo Yii::t('app', "When you start Freeletics, the first big challenge is to complete a whole workout. Watch all tutorials carefully and make sure to perform the exercises correctly. Don’t start too fast. If your body is not used to the intensity, you will have to pace yourself wisely to get through. And even then you might need several attempts. That's ok. Keep trying. It’s tough at the beginning but don’t even consider giving up. You have it within you and you will adapt quickly." . "<br/>" . "Once you've made it through your first workout, the next challenge is to fully master the predefined range of motion in each exercise. Train as quickly as possible. Never take breaks unless absolutely necessary. Don’t risk injury, train smart and work on technique to get the best results possible."); ?>
                </div>
                <div class="panel-footer">
                  <?php echo Yii::t('app', "Please inform yourself about implications of high intensity training for your health, restrictions and cases that require medical advice so that you can train smart and healthy."); ?>
                  <button class="btn btn-primary"><?php echo Yii::t("app", "Inform yourself") ?></button>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- update -->
        <div class="tab-pane fade <?php echo $type == 'ref_upgrade' ?  'active' : ''; ?> in" id="ref_upgrade">
          
        </div>
        <!-- method -->
        <div class="tab-pane fade <?php echo $type == 'ref_method' ?  'active' : ''; ?> in" id="ref_method">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#sub_method_0" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar"></i></a></li>
            <li class=""><a href="#sub_method_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-building-o"></i></a></a></li>
            <li class=""><a href="#sub_method_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-dashboard"></i></a></a></li>
            <li class=""><a href="#sub_method_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-calendar-o"></i></a></a></li>
          </ul>
          <div id="sub_training" class="tab-content">
            <div class="tab-pane fade active in" id="sub_method_0">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="list-group">
                    <a href="#" class="list-group-item list-item-content">
                      <div class="row">
                        <div class="col-md-3 col-xs-12">
                          <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                        </div>
                        <div class="col-md-9 col-xs-12">
                          <h5 class="list-group-item-heading"><?php echo Yii::t('app', 'Functional Training'); ?></h5>
                          <p class="list-group-item-text">
                            <?php echo Yii::t('app', 'Functional Training incorporates natural movements that are found in many disciplines. Free Athletes train their body the way it is supposed to be used to not only gain strength and endurance but also develop more efficient motor patterns.'); ?>
                          </p>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-item-content">
                      <div class="row">
                        <div class="col-md-3 col-xs-12 pull-right">
                          <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                        </div>
                        <div class="col-md-9 col-xs-12">
                          <h5 class="list-group-item-heading"><?php echo Yii::t('app', 'Functional Training'); ?></h5>
                          <p class="list-group-item-text">
                            <?php echo Yii::t('app', 'Functional Training incorporates natural movements that are found in many disciplines. Free Athletes train their body the way it is supposed to be used to not only gain strength and endurance but also develop more efficient motor patterns.'); ?>
                          </p>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-item-content">
                      <div class="row">
                        <div class="col-md-3 col-xs-12">
                          <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                        </div>
                        <div class="col-md-9 col-xs-12">
                          <h5 class="list-group-item-heading"><?php echo Yii::t('app', 'Functional Training'); ?></h5>
                          <p class="list-group-item-text">
                            <?php echo Yii::t('app', 'Functional Training incorporates natural movements that are found in many disciplines. Free Athletes train their body the way it is supposed to be used to not only gain strength and endurance but also develop more efficient motor patterns.'); ?>
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_method_1">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_method_2">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_method_3">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- group -->
        <div class="tab-pane fade <?php echo $type == 'ref_group' ?  'active' : ''; ?> in" id="ref_group">
          <div class="row">
            <div class="col-md-12 col-xs-12 well">
              <h4><?php echo strtoupper(Yii::t('app', 'deutschland')); ?></h4>
            </div>
            <?php foreach ($groupArray as $index => $group) { ?>
              <div class="col-md-4 col-xs-6 well">
                <h5><i class="fa fa-map-marker"></i>&nbsp;<?php echo strtoupper(Yii::t('app', $group["GroupName"])); ?></h5>
              </div>
            <?php } ?>
          </div>
        </div>
        <!-- nutritrion -->
        <div class="tab-pane fade <?php echo $type == 'ref_nutrition' ?  'active' : ''; ?> in" id="ref_nutrition">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#sub_nutrition_0" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar"></i></a></li>
            <li class=""><a href="#sub_nutrition_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-building-o"></i></a></a></li>
            <li class=""><a href="#sub_nutrition_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-dashboard"></i></a></a></li>
            <li class=""><a href="#sub_nutrition_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-calendar-o"></i></a></a></li>
          </ul>
          <div id="sub_nutrition" class="tab-content">
            <div class="tab-pane fade active in" id="sub_nutrition_0">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_nutrition_1">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
            </div>
            <div class="tab-pane fade" id="sub_nutrition_2">
              <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
            </div>
            <div class="tab-pane fade" id="sub_nutrition_3">
              <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
            </div>
          </div>
        </div>
        <!-- training coach -->
        <div class="tab-pane fade <?php echo $type == 'ref_training_coach' ?  'active' : ''; ?> in" id="ref_training_coach">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#sub_0" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar"></i></a></li>
            <li class=""><a href="#sub_1" data-toggle="tab" aria-expanded="false"><i class="fa fa-building-o"></i></a></a></li>
            <li class=""><a href="#sub_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-dashboard"></i></a></a></li>
            <li class=""><a href="#sub_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-calendar-o"></i></a></a></li>
          </ul>
          <div id="sub_training" class="tab-content">
            <div class="tab-pane fade active in" id="sub_0">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_1">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_2">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sub_3">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tab-content-heading"><?php echo Yii::t('app', 'A life, no diet'); ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                      <img width="100%" src="<?php echo Yii::app()->baseUrl ?>/img/guild/guild_training_2.jpg"/>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <h3 class="text-center"><?php echo Yii::t('app', 'GUARANTEED RESULTS WITH 700+ TRAININGS'); ?></h3>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <p class="text-center">
                        <?php echo Yii::t('app', 'Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .tab-content-heading {
      padding: 10px;
    }

    .tab-content-heading, .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
      background: rgba(0, 0, 0, 0.1);
    }

    .tab-pane .nav.nav-tabs .fa {
      color: #69F;
    }

    .list-group-item.list-item-content {
      padding: 1.8em;
    }

    .group-column {
      border: black 1px solid;
      padding-top: 30px;
      color: #08F;
      font-size: 30px;
    }

    .well {
      margin: auto;
      padding: 30px 0px 30px 10px;
    }

    .well h5, .well h4 {
      margin: 0;
      color: #08f;
    }
  </style>

  <script>
  </script>