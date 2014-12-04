<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="main-container">
<style>
  .tab-content a:hover, .tab-content a:focus{
    color: black;
  }
  
  .tab-content ul {
    padding-left: 15px;
  }
  
</style>

<div class="container" id="adminContainter" style="min-height: 700px;">
  <div class="<?php echo $ads ? 'col-lg-7' : 'col-lg-8'; ?>">
    <div class="panel">
      <div class="panel-body change-content" style="">
        <ul class="nav nav-pills" style="border-bottom: 1px solid #dddddd; margin-bottom: 15px">
          <li class="active"><a class="active" data-toggle="tab"  href="#getting-started">
              <i class="fa fa-lightbulb-o"></i>&nbsp;<?php echo Yii::t('app', "Getting Started"); ?></a></li>
            <ul class="dropdown-menu" style="display: none;">
              <li><a href="#"><?php echo Yii::t('app', "BASICS"); ?></a></li>
              <li><a href="#"><?php echo Yii::t('app', "WORKOUTS & EXERCISES"); ?></a></li>
              <li><a href="#"><?php echo Yii::t('app', "HEALTH / RESTRICTIONS / LIMITATIONS"); ?></a></li>
              <li><a href="#"><?php echo Yii::t('app', "COMMUNITY"); ?></a></li>
            </ul>
          </li>
          <li class=""><a class="" data-toggle="tab"  href="#general-tab">
              <i class="fa fa-globe"></i>&nbsp;<?php echo Yii::t('app', "General"); ?></a>
            <ul class="dropdown-menu" style="display: none;">
              <li><a href="#"><?php echo Yii::t('app', "YOUR ACCOUNT"); ?></a></li>
            </ul>
          </li>
          <li class=""><a class="" data-toggle="tab"  href="#coach-tab">
              <i class="fa fa-square-o"></i>&nbsp;<?php echo Yii::t('app', "Coach"); ?></a>
            <ul class="dropdown-menu" style="display: none;">
              <li><a href="#"><?php echo Yii::t('app', "ABOUT THE COACH"); ?></a></li>
              <li><a href="#"><?php echo Yii::t('app', "USING THE COACH"); ?></a></li>
            </ul>
          </li>
          <li class=""><a class="" data-toggle="tab"  href="#nutrition-tab">
              <i class="fa fa-cutlery"></i>&nbsp;<?php echo Yii::t('app', "Nutrition"); ?></a></li>
            <ul class="dropdown-menu" style="display: none;">
              <li><a href="#"><?php echo Yii::t('app', "ABOUT THE GUIDE"); ?></a></li>
              <li><a href="#"><?php echo Yii::t('app', "USING THE GUIDE"); ?></a></li>
            </ul>
          </li>
          <li class="">
            <li class="dropdown"><a class="" data-toggle="tab"  href="#free-app-tab">
              <i class="fa fa-mobile"></i>&nbsp;<?php echo Yii::t('app', "Freeletics App"); ?>
            </a>
            <ul class="dropdown-menu" style="display: none;">
              <li><a href="#"><?php echo Yii::t('app', "USING THE APP"); ?></a></li>
            </ul>
          </li>
        </ul>
        
        <div id="tabContent" class="tab-content">
          <div class="tab-pane fade active in" id="getting-started">
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "Basics"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "WORKOUTS & EXERCISES"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "COMMUNITY"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "HEALTH / RESTRICTIONS / LIMITATIONS"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
          </div>
          <div class="tab-pane fade" id="general-tab">
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "Basics"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "WORKOUTS & EXERCISES"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
          </div>
          <div class="tab-pane fade" id="coach-tab">
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "Basics"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
          </div>
          <div class="tab-pane fade" id="nutrition-tab">
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "Basics"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
          </div>
          <div class="tab-pane fade" id="free-app-tab">
            <section class="col-lg-6 col-sm-12">
              <h5>
                <a href="/hc/en-us/sections/200226431-Basics"><?php echo Yii::t('app', "Basics"); ?></a>
              </h5>
              <ul class="article-list">
                <?php for ($i = 0; $i < 3; $i++) { ?>
                <li>
                  <a href="/hc/en-us/articles/201129512-How-do-I-get-started-">How do I get started?</a>
                </li>
                <?php } ?>
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->renderPartial("//partials/rightContent");?>
</div>
</div>