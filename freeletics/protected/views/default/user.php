<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="main-container">
  <?php if (Yii::app()->getController()->action->id == 'user') { ?>
    <?php $this->renderPartial('//partials/user_information'); ?>
  <?php } else { ?>
  <?php } ?>
</div>