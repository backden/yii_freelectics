<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
  .carousel-inner .item img {
    width: 100%;
  }
  .header-smaller {
    font-size: 14px;
    margin-bottom: 10px;
    margin-top: 10px;
    text-align: left;
  }
  #personal-training-coach p {
    text-align: left;
    font-size: 10px;
  }
  
  .panel-information img {
    width: 100%;
  }
  
  @media(min-width: 700px) {
    .top-container {
      margin-top: 85px;
    }
  }
  @media(max-width: 680px) {
    .top-container {
      margin-top: 40px;
    }
    
    .container {
    }
  }
</style>
<script>
  $(function() {
    /* custom settings */

  });
</script>
<?php if (!Yii::app()->user->isGuest) { ?>
  <?php
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => true,
      'controller' => 'user',
      'width' => '32%',
      "menus" => $menus = array(
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
  ?>
<?php } ?>
<div class="container top-container">
  <div class="row">
    <div class="col-md-7 col-md-offset-1" style="">
      <div class="row">
        <div class="col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/hero_slide_4.jpg" alt=""/>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/hero_slide_3.jpg" alt=""/>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/hero_slide_2.jpg" alt=""/>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/hero_slide_1.jpg" alt=""/>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <<img src="<?php echo Yii::app()->baseUrl; ?>/img/hero_slide_5.jpg" alt=""/>
                <div class="carousel-caption">
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 style="margin-top: 40px; margin-bottom: 0px;"><center>Testimonials</center></h3>
        </div>
        <div class="col-md-12">
          <div id="carousel-testimonials" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="max-height: 200px; min-height: 200px;">
              <div class="item active">
                <div class="carousel-caption">
                  carousel-testimonials
                </div>
              </div>
              <?php
              $i = 0;
              while ($i < 3) {
                ?>
                <div class="item">
                  <div class="hexagon hexagon1"><div class="hexagon-in1"><div class="hexagon-in2"></div></div></div>
                  <div class="carousel-caption">
                    <div class=""></div>
                  </div>
                </div>
                <?php
                $i++;
              }
              ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-testimonials" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-testimonials" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 style="margin-top: 40px; margin-bottom: 0px;"><center>Your Personal Training Coach</center></h3>
        </div>
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="hexagon hexagon1">
                <div class="hexagon-in1">
                  <div class="hexagon-in2" style="background: url(<?php echo Yii::app()->baseUrl . '/img/pattern.jpg' ?>); background-position: center"></div>
                </div>
              </div>
              <p></p>
              <img src="<?php echo Yii::app()->baseUrl . '/img/path.png' ?>"/>
              <h4>Get on the fast-track to be athletic, healthy and motivated</h4>
              <p>The most individualized and dynamic fitness program on the planet. Get your personalized training plan with the Coach. Completely adapted to your goals, needs and fitness level. It caters for everyone, men and women, beginners and pros, more than any other training program. Get your Coach to commit to a whole new lifestyle, a new you.</p>
              <div class="clearfix" style="border-bottom: grey 1px solid;"></div>
              <div class="row" id="personal-training-coach">
                <div class="col-md-6" style="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        Your digital personal trainer
                      </h6>
                      <p>
                        Your digital personal trainer
                        The Coach generates your detailed training instructions each week. Know exactly which workouts to do and in what order. Designed by experts to ensure the Coach is the ultimate training plan for you.
                      </p>
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        100% individualized</h6>
                      <p>
                        The most individualized training program out there: Analyzing your experience and fitness test results for maximum adaption to you. Responding to your weekly feedback and progress. Beginner or pro, male or female, the Coach works with you to ensure your continous progress.
                      </p>
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        Guaranteed results</h6>
                      <p>
                        Whether you want to gain muscle, burn fat or both, you set your training goals. Get the perfect combination of workouts for the fastest way to get where you want.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pull-right">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        700+ training variations
                      </h6>
                      <p>
                        Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. Maximum training variety to make the most of your training.
                      </p>
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        A revolutionary training system
                      </h6>
                      <p>
                        Functional and high intensity bodyweight workouts. Running reinvented. The Coach targets every aspect of your physical fitness for maximum progress towards your goals.
                      </p>
                      <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                      </div>
                      <h6 class="header-smaller">
                        A professional, rounded routine
                      </h6>
                      <p>
                        Every step of your training plan, from warmup to training to stretching is thought through. Functional training preparation to unleash your full potential. Stretches to improve your mobility and to shorten your rest period.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a class="" style="cursor: pointer;">
                    <?php echo Yii::t("app", "Continuously developed further. See all features of last Coach upgrade"); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 style="margin-top: 40px; margin-bottom: 0px;"><center>Success Stories with the Coach</center></h3>
        </div>
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="carousel-videos" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="max-height: 200px; min-height: 200px;">
                  <div class="item active">
                    <div class="carousel-caption">
                      carousel-testimonials
                    </div>
                  </div>
                  <?php
                  $i = 0;
                  while ($i < 3) {
                    ?>
                    <div class="item">
                      <iframe width="300" height="169" src="//www.youtube.com/embed/CMhLmONLcvo" frameborder="0" allowfullscreen></iframe>
                      <div class="carousel-caption">
                        <div class=""></div>
                      </div>
                    </div>
                    <?php
                    $i++;
                  }
                  ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-videos" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-videos" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row panel-information">
        <div class="col-md-12">
          <h3 style="margin-top: 40px; margin-bottom: 0px;"><center>Success Stories with the Coach</center></h3>
        </div>
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="<?php echo Yii::app()->baseUrl; ?>/img/benefits_1.jpg"/>
              <h3>
                FITS IN WITH YOUR BUSY LIFESTYLE
              </h3>
              <p>2-5 training days a week according to your needs, goals and skill level. You say how often and when you want to train. The Coach will adapt and push you to achieve your goals. Sessions take only 15 to 45 minutes and include high intensity bodyweight training as well as competitive Freeletics runs. Anywhere, anytime, around any schedule. No gym, no weights, no machines, no excuses!
              </p>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="<?php echo Yii::app()->baseUrl; ?>/img/benefits_2.jpg"/>
              <h3>
                GUARANTEED RESULTS WITH 700+ TRAININGS
              </h3>
              <p>
                Unlock all Freeletics workouts, exercises and runs for your account. Accessible on freeletics.com and via our iOS/Android apps. More than 700 workout and exercise variations. Endurance, Standard and Strength workouts to target different aspects of your physical fitness.
              </p>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="<?php echo Yii::app()->baseUrl; ?>/img/benefits_3.jpg"/>
              <h3>
                100% INDIVIDUALIZED
              </h3>
              <p>
                Your training instructions are completely and uniquely adapted to you and your personal goals. The Coach is perfect for women, men, pros and beginners. The Coach analyzes your weaknesses and strengths and adapts to your performance, progress and your weekly feedback. Whoever you are and whoever you want to be, the Coach will get you there.
              </p>
              <a class="" data-toggle="collapse" href="#collapseCoach" aria-expanded="false" aria-controls="collapseExample">
                <?php echo Yii::t("app", "Continuously developed further. See all features of last Coach upgrade"); ?>
              </a>
              <div class="collapse" id="collapseCoach">
                <div class="clearfix" style="border-bottom: grey 1px solid;"></div>
                <div class="row" id="personal-training-coach">
                  <div class="col-md-6" style="">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Personal fitness test
                        </h6>
                        <p>
                          Objective assessment of your initial level of fitness. Fitness test depending on your prior sports experience and frequency. Get started with the perfect training plan.
                        </p>
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Partial workouts
                        </h6>
                        <p>
                          Only get workouts that you can do. Depending on your fitness test performance, the Coach might let you start with 1/5 Aphrodite and advance you towards the full workout.
                        </p>
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Set limitations
                        </h6>
                        <p>
                          Avoid injuries due to overtraining by significantly reducing the training volume on severely stressed muscles of your body.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pull-right">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Advanced skills
                        </h6>
                        <p>
                          Set your skills of complex movements like Pullups, Pistols and Muscle Ups. Only get trainings from the Coach once you master their technique.
                        </p>
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Set the number of training days
                        </h6>
                        <p>
                          You can vary the number of weekly training days between 2 and 5. Perfect to combine Freeletics with other sports or to set training peaks before a period with time constraints.
                        </p>
                        <div class="col-md-3">
                          <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                        </div>
                        <h6 class="header-smaller">
                          Feedback your Coach
                        </h6>
                        <p>
                          You can tell your Coach if the week was just right, too hard or too easy. The Coach will adapt. Take on challenge!
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
      <div class="row panel-information">
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="<?php echo Yii::app()->baseUrl; ?>/img/benefits_4.jpg"/>
              <h3>
                A PROFESSIONAL, ROUNDED ROUTINE
              </h3>
              <p>
                Warmup and stretching prepare you for your high intensity training and minimize your rest periods. Training volume and intensity of your training plan will continuously be adjusted and varied for continuous progress. Hell Days and Hell Weeks set intermittent peaks to stretch your fitness and willpower to the limit!
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row panel-information">
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="<?php echo Yii::app()->baseUrl; ?>/img/benefits_5.jpg"/>
              <h3>
                FREELETICS RUNNING
              </h3>
              <p>
                The Coach unlocks all runs and integrates highly intense sprints, middle and long distance runs into your training plan. Run with a goal, commit and beat your last performances. Runs are optimally combined with workouts and exercises to maximize the progress towards your personal training goal. With Freeletics Runs you unleash the very last bit of your potential.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row panel-information">
        <div class="col-md-12" style="text-align: center;">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3>
                ANSWERS ABOUT THE COACH
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <?php
      $this->renderPartial("//partials/payment", array(
          'costs' => explode(";", $dataPayment['costArr']),
          'times' => explode(";", $dataPayment['$costTimes']),
          'unit' => $dataPayment['$unit'],
          'typePage' => 'training'
      ));
      ?>
    </div>
  </div>
</div>