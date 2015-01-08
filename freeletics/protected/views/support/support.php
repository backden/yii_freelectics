<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$supp_headers = SystemUtils::getCsvToArray("data/FAQ/" . "FAQ_Header.csv");
foreach ($supp_headers as $index => $data) {
  foreach ($data as $key => $value) {
    if ($key == "category") {
      $supp_headers[$index][$key] = explode(";", $value);
    }
  }
}
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
  <script>
    $(function() {
      $("#search_input").keydown(function(event) {
        if (event.which == 13) {
          var form = $("<form />", {
            action: "<?php echo Yii::app()->createUrl("support/search"); ?>",
            method: "POST"
          });
          $(this).appendTo(form);
          $(form).submit();
        }
      });
    });
  </script>
  <div class="container" id="adminContainter" style="min-height: 400px;">
    <div class="col-lg-8 col-md-8 col-xs-12">
      <input id="search_input" type="text" name="name" class="form-control" placeholder="<?php echo Yii::t("app", "Search"); ?>" style="margin-bottom: 20px;"/>
    </div>
    <div class="col-lg-8 col-md-8 col-xs-12">
      <div class="panel">
        <div class="panel-body change-content" style="min-height: 400px;">
          <ul class="nav nav-pills" style="border-bottom: 1px solid #dddddd; margin-bottom: 15px">
            <li class="<?php echo Yii::app()->request->getParam("header", null) == null || Yii::app()->request->getParam("header") == $supp_headers[0]["name"] ? "active" : "" ?>">
              <a class="" data-toggle="tab"  href="#tab0">
                <i class="fa fa-lightbulb-o"></i>&nbsp;<?php echo Yii::t('app', $supp_headers[0]["name"]); ?></a>
              <ul class="dropdown-menu" style="display: none;">
                <li><a href="#"><?php echo Yii::t('app', "BASICS"); ?></a></li>
                <li><a href="#"><?php echo Yii::t('app', "WORKOUTS & EXERCISES"); ?></a></li>
                <li><a href="#"><?php echo Yii::t('app', "HEALTH / RESTRICTIONS / LIMITATIONS"); ?></a></li>
                <li><a href="#"><?php echo Yii::t('app', "COMMUNITY"); ?></a></li>
              </ul>
            </li>
            <li class="<?php echo Yii::app()->request->getParam("header", null) == $supp_headers[1]["name"] ? "active" : "" ?>"><a class="" data-toggle="tab"  href="#tab1">
                <i class="fa fa-globe"></i>&nbsp;<?php echo Yii::t('app', $supp_headers[1]["name"]); ?></a>
              <ul class="dropdown-menu" style="display: none;">
                <li><a href="#"><?php echo Yii::t('app', "YOUR ACCOUNT"); ?></a></li>
              </ul>
            </li>
            <li class="<?php echo Yii::app()->request->getParam("header", null) == $supp_headers[2]["name"] ? "active" : "" ?>">
              <a class="" data-toggle="tab"  href="#tab2">
                <i class="fa fa-square-o"></i>&nbsp;<?php echo Yii::t('app', $supp_headers[2]["name"]); ?></a>
              <ul class="dropdown-menu" style="display: none;">
                <li><a href="#"><?php echo Yii::t('app', "ABOUT THE COACH"); ?></a></li>
                <li><a href="#"><?php echo Yii::t('app', "USING THE COACH"); ?></a></li>
              </ul>
            </li>
            <li class="<?php echo Yii::app()->request->getParam("header", null) == $supp_headers[3]["name"] ? "active" : "" ?>">
              <a class="" data-toggle="tab"  href="#tab3">
                <i class="fa fa-cutlery"></i>&nbsp;<?php echo Yii::t('app', $supp_headers[3]["name"]); ?></a>
              <ul class="dropdown-menu" style="display: none;">
                <li><a href="#"><?php echo Yii::t('app', "ABOUT THE GUIDE"); ?></a></li>
                <li><a href="#"><?php echo Yii::t('app', "USING THE GUIDE"); ?></a></li>
              </ul>
            </li>
            <li class="<?php echo Yii::app()->request->getParam("header", null) == $supp_headers[4]["name"] ? "active" : "" ?>">
            <li class="dropdown"><a class="" data-toggle="tab"  href="#tab4">
                <i class="fa fa-mobile"></i>&nbsp;<?php echo Yii::t('app', $supp_headers[4]["name"]); ?>
              </a>
              <ul class="dropdown-menu" style="display: none;">
                <li><a href="#"><?php echo Yii::t('app', "USING THE APP"); ?></a></li>
              </ul>
            </li>
          </ul>

          <div id="tabContent" class="tab-content">
            <?php
            foreach ($faqs as $index => $faq) {
              $subheader = '';
              if (count($faq) > 0) {
                ?>
                <div class="tab-pane fade <?php echo $index == 0 ? 'active' : '' ?> in" id="tab<?php echo $index; ?>">
                  <?php foreach ($faq as $cate => $tmpModel) { ?>
                    <?php
                    if ($tmpModel->category_subheader == $subheader) {
                      continue;
                    } else {
                      $subheader = $tmpModel->category_subheader;
                    }
                    ?>
                    <div class="col-lg-6 col-sm-12 col-xs-12">
                      <h5>
                        <a href="<?php echo Yii::app()->createUrl("support/category", array("cat" => $tmpModel->category_subheader)); ?>"
                           class="text-black">
                             <?php echo Yii::t('app', $tmpModel->category_subheader); ?>
                        </a>
                      </h5>
                      <ul class="article-list">
                        <?php foreach ($faq as $i => $model) { ?>
                          <?php
                          if ($tmpModel->category_subheader != $model->category_subheader) {
                            continue;
                          }
                          ?>
                          <li>
                            <a href="<?php echo Yii::app()->createUrl("support/faqs/", array("faq" => $model->id . "-" . $model->title)); ?>">
                              <?php echo $model->title; ?>
                            </a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                    <?php if ($cate + 1 > 1 && $cate + 1 & 1) { ?>
                      <div class="clearfix" style="margin-bottom: 30px;"></div>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php // $this->renderPartial("//partials/rightContent"); ?>
  </div>
</div>
