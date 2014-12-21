<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" style="padding-top: 70px;">
  <div class="col-lg-7 col-sm-12" style="background-color: white; height: 1400px;">
    <ul class="nav nav-tabs" style="padding-top: 10px;">
      <li class="active"><a href="#workouts" data-toggle="tab"><?php echo strtoupper(Yii::t('app', 'Workouts')); ?></a></li>
      <li><a href="#exercises" data-toggle="tab"><?php echo strtoupper(Yii::t('app', 'exercises')); ?></a></li>
      <li><a href="#running" data-toggle="tab"><?php echo strtoupper(Yii::t('app', 'running')); ?></a></li>
    </ul>
    <div id="myTabContent" class="tab-content" style="padding-top: 10px;">
      <div class="tab-pane fade active in" id="workouts">
        <div class="row">
          <div class="col-lg-12">
            <div class="list-group">
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade in" id="exercises">
        <div class="row">
          <div class="col-lg-3">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                ENDURANCE
              </a>
              <a href="#" class="list-group-item">
                STANDARD
              </a>
              <a href="#" class="list-group-item">
                STRENGTH
              </a>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade in" id="running">
        <div class="row">
          <div class="col-lg-12">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
              <a href="#" class="list-group-item">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item">Dapibus ac facilisis in
              </a>
              <a href="#" class="list-group-item">Morbi leo risus
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->renderPartial('//partials/rightContent'); ?>
</div>