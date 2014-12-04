<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl; 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <?php echo $this->renderPartial('//partials/script_css'); ?>
  </head>
  <body style="background: rgba(0, 0, 0, 0.1);">
    <div id="navbar-container">
      <div class="navbar-collapse collapse" id="navbar-main">
        <ul class="nav navbar-nav">
          <li class="logo">

          </li>
          <li class="">
            <a class="" href="#sub-training-menus" id="btn-activities" onclick="return false;">
              <i class="fa fa-fw fa-gavel"></i>
              <?php echo __("Activities"); ?>
              <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
            </a>
          <li>
            <a class="" href="#sub-community-menus" id="btn-community" onclick="return false;">
              <i class="fa fa-fw fa-group"></i>
              <?php echo __("Community"); ?> 
              <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
            </a>
          </li>
          <li>
            <a class="" href="#option-menus" id="btn-option-menus" onclick="return false;">
              <i class="fa fa-fw fa-gear"></i>
              <?php echo __("Others"); ?>
              <span class="sub-menu-active"><i class="fa fa-chevron-left"></i></span>
            </a>
          </li>
          <li class="dropdown">
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="/cake/home/?admin=1" class="btn btn-primary btn-sm"><?php echo __("Get your Coach"); ?></a></li>
          <li><a href="#" class="btn-search" data-toggle="modal" data-target="#modal_search"><i class="fa fa-search"></i></a></li>
          <li><a href="#logout" class="btn-sm" id="btn_logout" title="<?php echo __('btn_logout'); ?>"><i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
      <div class="sub-navbar">
        <div class="navbar-collapse navbar-sub-container nav-closed" id="sub-training-menus">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" id="btn-training" data-toggle="dropdown"><?php echo __("Training"); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="" href="#" id="btn-current-week"><i class="fa fa-calendar"></i>&nbsp;<?php echo __("Current Week"); ?></a></li>
                <li><a class="" href="#" id="btn-skills"><i class="fa fa-crosshairs"></i>&nbsp;<?php echo __("Skills"); ?></a></li>
                <li><a class="" href="#" id="btn-trainer-advices" ><i class="fa fa-key"></i>&nbsp;<?php echo __("Trainer Advices"); ?></a></li>
                <li><a class="" href="#" id="free-trainer"><i class="fa fa-unlock"></i>&nbsp;<?php echo __("Free Training"); ?></a></li>
              </ul>
            </li>
            <li class="">
              <a class="" id="btn-nutrion" ><i class="fa fa-cutlery"></i>&nbsp;<?php echo __("Nutrition"); ?></a>
            </li>
          </ul>
        </div>
        <div class="navbar-collapse navbar-sub-container nav-closed" id="sub-community-menus">
          <ul class="nav navbar-nav">
            <li class="">
              <a class="" id="btn-feed" ><i class="fa fa-globe"></i>&nbsp;<?php echo __("Feed"); ?></a>
            </li>
            <li><a class="" data-toggle="modal" data-target="#modal_setting_your_account">
                <i class="fa fa-star-o"></i>&nbsp;<?php echo __("Leader board"); ?></a>
            </li>
            <li><a class="" href="/cake/userinfo/?admin=1" id="download"><i class="fa fa-group"></i>&nbsp;<?php echo __("Group"); ?></span></a></li>
          </ul>
        </div>
        <div class="navbar-collapse navbar-sub-container nav-closed" id="option-menus">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" id="dropdown-account" data-toggle="dropdown"><?php echo __("Account"); ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="" href="/cake/home/userinfo/?admin=1" id="download"><i class="fa fa-user"></i>&nbsp;<?php echo __("Statics"); ?></span></a></li>
                <li><a class="" data-toggle="modal" data-target="#modal_setting_your_account"><i class="fa fa-info-circle"></i>&nbsp;<?php echo __("Setting"); ?></span></a></li>
              </ul>
            </li>
            <li class="">
              <a class="" id="btn-knowledge"><i class="fa fa-book"></i>&nbsp;<?php echo __("Knownledge"); ?></a>
            </li>
            <li class="">
              <a class="" id="btn-support"><i class="fa fa-question-circle"></i>&nbsp;<?php echo __("Support"); ?></a>
            </li>
            <li class="">
              <a class="" id="btn-foundation"><i class="fa fa-asterisk"></i>&nbsp;<?php echo __("Foundation"); ?></a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display: none">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <input class="form-control" type="text" id="inputLarge" placeholder="<?php echo __("Search"); ?>">
              </div>
              <a href="#" class="col-lg-2 col-md-2 col-sm-2 col-xs-2" data-dismiss="modal"
                 style="font-size: 28px; text-align: center; cursor: pointer;">
                <i class="fa fa-search"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal setting user -->
    <?php $this->renderPartial("//partials/your_account_form"); ?>
  </body>
</html>