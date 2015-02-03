<?php
/*
 * Filter history
 */
$recents = $data['recents'];
?>
<div class="container">
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo Yii::t('app', "Recents"); ?></h3>
      </div>
      <div class="panel-body" style="min-height: 200px;">
        <div class="list-group">
          <?php foreach ($recents as $id => $recent) { ?>
            <a href="#" class="list-group-item">
              <div class="row">
                <div class="col-md-9">
                  <h5><?php echo $recent['exercise']->name; ?></h5>
                </div>
                <div class="col-md-3">
                  <?php if ($recent['recent']->star == 1) { ?>
                    <i class="fa fa-star"></i>
                  <?php } ?>
                    <i class="fa fa-clock-o"></i>
                  <?php echo $recent['recent']->PB; ?>
                </div>
              </div>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
        
      </div>
    </div>
  </div>
</div>
