<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl; 
?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
  <div id="content">
    <?php echo $content; ?>
  </div><!-- content -->
</div>
<div class="span-5 last">
  <div id="sidebar">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => 'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items' => $this->menu,
        'htmlOptions' => array('class' => 'operations'),
    ));
    $this->endWidget();
    ?>
  </div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>