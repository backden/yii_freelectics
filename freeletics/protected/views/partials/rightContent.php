<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$ads = true;
?>

<div class="<?php echo $ads ? 'col-lg-3' : 'col-lg-3'; ?> right-siderbar roll-bottom">
  <div class="panel panel-warning">
    <div class="panel-body" style="min-height: 800px">
      <button class="btn btn-default btn-block btn-flat btn-lg">.btn-block</button>
      <button class="btn btn-default btn-block btn-flat btn-lg">.btn-block .btn-flat</button>
      <button class="btn btn-default btn-block btn-flat btn-lg">.btn-block .btn-sm</button>
    </div>
  </div>
</div>
<?php $this->renderPartial('//partials/advertisment', array('ads' => $ads)); ?>