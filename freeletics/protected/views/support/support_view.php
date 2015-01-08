<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" id="helpContainter">
  <div class="col-lg-8 col-md-8 col-xs-12">
    <input id="search_input" type="text" name="name" class="form-control" placeholder="<?php echo Yii::t("app", "Search"); ?>" style="margin-bottom: 20px;"
           value="<?php echo Yii::app()->session->get("keyword_support", ""); ?>"/>
  </div>
  <div class="col-md-8 col-xs-12">
    <div class="panel">
      <div class="panel-body change-content" style="">
        <ul class="breadcrumb">
          <li><a href="<?php echo Yii::app()->createUrl("support"); ?>"><?php echo Yii::t("app", "Home"); ?></a></li>
          <li><a href="<?php echo Yii::app()->createUrl("support") . "?header=" . $faq->category_header; ?>"><?php echo Yii::t("app", $faq->category_header); ?></a></li>
          <li class="active"><?php echo $faq->category_subheader; ?></li>
        </ul>
        <div  style="padding: 10px;">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-lg-12 col-sm-6" >
              <h4> <?php echo $faq->question; ?> </h4>
            </div>
          </div>
          <div class="clearfix" style="margin-bottom: 10px;"></div>
          <div class="row">
            <div class="col-lg-12 col-sm-6" >
              A: <?php echo $faq->answer; ?>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row" style="padding-top: 10px;">
            <div class="col-lg-12 col-sm-6 ">
              <?php echo Yii::t('app', "Have more questions?"); ?>
              <a class="" href="<?php echo Yii::app()->createUrl("support/question"); ?>">
                <?php echo Yii::t('app', "Submit a request"); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php // $this->renderPartial("//partials/rightContent");?>
</div>

<style>
  #section-footer {
    top: 0 !important;
  }
</style>
<script>
</script>