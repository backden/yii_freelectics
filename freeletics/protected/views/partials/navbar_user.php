<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
?>
<div id="navbar-container">
  <div class="navbar-collapse collapse" id="navbar-main">
    <ul class="nav navbar-nav">
      <li class="logo">

      </li>
      <li class="">
        <a class="" href="#sub-training-menus" id="btn-activities" onclick="return false;">
          <i class="fa fa-fw fa-gavel"></i>
          <?php echo Yii::t('app', "Activities"); ?>
          <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
        </a>
      <li>
        <a class="" href="#sub-community-menus" id="btn-community" onclick="return false;">
          <i class="fa fa-fw fa-group"></i>
          <?php echo Yii::t('app', "Community"); ?> 
          <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
        </a>
      </li>
      <li>
        <a class="" href="#option-menus" id="btn-option-menus" onclick="return false;">
          <i class="fa fa-fw fa-gear"></i>
          <?php echo Yii::t('app', "Others"); ?>
          <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
        </a>
      </li>
      <li class="dropdown">
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="./user" class="btn btn-primary btn-sm"><?php echo Yii::t('app', "Get your Coach"); ?></a></li>
      <li><a href="#" class="btn-search" data-toggle="modal" data-target="#modal_search"><i class="fa fa-search"></i></a></li>
      <li><a href="#logout" class="btn-sm" id="btn_logout" title="<?php echo Yii::t('app', 'btn_logout'); ?>"><i class="fa fa-sign-out"></i></a></li>
    </ul>
  </div>
  <div class="sub-navbar">
    <div class="navbar-collapse navbar-sub-container nav-closed" id="sub-training-menus">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" href="#" id="btn-training" data-toggle="dropdown"><?php echo Yii::t('app', "Training"); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="" href="#" id="btn-current-week"><i class="fa fa-calendar"></i>&nbsp;<?php echo Yii::t('app', "Current Week"); ?></a></li>
            <li><a class="" href="#" id="btn-skills"><i class="fa fa-crosshairs"></i>&nbsp;<?php echo Yii::t('app', "Skills"); ?></a></li>
            <li><a class="" href="#" id="btn-trainer-advices" ><i class="fa fa-key"></i>&nbsp;<?php echo Yii::t('app', "Trainer Advices"); ?></a></li>
            <li><a class="" href="#" id="free-trainer"><i class="fa fa-unlock"></i>&nbsp;<?php echo Yii::t('app', "Free Training"); ?></a></li>
          </ul>
        </li>
        <li class="">
          <a class="" id="btn-nutrion" ><i class="fa fa-cutlery"></i>&nbsp;<?php echo Yii::t('app', "Nutrition"); ?></a>
        </li>
      </ul>
    </div>
    <div class="navbar-collapse navbar-sub-container nav-closed" id="sub-community-menus">
      <ul class="nav navbar-nav">
        <li class="">
          <a class="" id="btn-feed" ><i class="fa fa-globe"></i>&nbsp;<?php echo Yii::t('app', "Feed"); ?></a>
        </li>
        <li><a class="" data-toggle="modal" data-target="#modal_setting_your_account">
            <i class="fa fa-star-o"></i>&nbsp;<?php echo Yii::t('app', "Leader board"); ?></a>
        </li>
        <li><a class="" href="../default/user" id="download"><i class="fa fa-group"></i>&nbsp;<?php echo Yii::t('app', "Group"); ?></span></a></li>
      </ul>
    </div>
    <div class="navbar-collapse navbar-sub-container nav-closed" id="option-menus">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" id="dropdown-account" data-toggle="dropdown"><?php echo Yii::t('app', "Account"); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="" href="../default/user" id="download"><i class="fa fa-user"></i>&nbsp;<?php echo Yii::t('app', "Statics"); ?></span></a></li>
            <li><a class="" data-toggle="modal" data-target="#modal_setting_your_account"><i class="fa fa-info-circle"></i>&nbsp;<?php echo Yii::t('app', "Setting"); ?></span></a></li>
          </ul>
        </li>
        <li class="">
          <a class="" id="btn-knowledge"><i class="fa fa-book"></i>&nbsp;<?php echo Yii::t('app', "Knownledge"); ?></a>
        </li>
        <li class="">
          <a class="" id="btn-support"><i class="fa fa-question-circle"></i>&nbsp;<?php echo Yii::t('app', "Support"); ?></a>
        </li>
        <li class="">
          <a class="" id="btn-foundation"><i class="fa fa-asterisk"></i>&nbsp;<?php echo Yii::t('app', "Foundation"); ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>