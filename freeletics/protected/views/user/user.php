<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$ads = true;
?>
<div id="main-container">
  <?php if (Yii::app()->controller->id != 'training') { ?>
    <?php $this->renderPartial('//partials/user_information', array('user' => $user, 'data' => $data)); ?>
  <?php } else { 
    $this->redirect('/default/');?>
  <?php } ?>
</div>
<?php echo $this->renderPartial('//partials/dialogs'); ?>