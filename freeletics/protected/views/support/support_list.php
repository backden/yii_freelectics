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
          <!--<li><a href="<?php echo Yii::app()->createUrl("support"); ?>"><?php echo Yii::t("app", "Library"); ?></a></li>-->
          <li class="active"><?php echo Yii::t("app", $cat); ?></li>
        </ul>
        <div  style="padding: 10px;">
          <div class="row">
            <?php foreach ($faqs as $index => $faq) { ?>
              <div class="col-lg-12 col-sm-12 ">
                <div class="">
                  <a href="<?php echo Yii::app()->createUrl("support/faqs", array("faq" => $faq->id . "-" . $faq->title)) ?>">
                    <?php echo $index + 1; ?>.&nbsp;
                    <?php echo $faq->title; ?>
                  </a>
                </div>
                <p>- <?php echo $faq->question; ?></p>
              </div>
            <?php } ?>
          </div>
          <div class="clearfix"></div>
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