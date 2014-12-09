<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="modal modal-sm fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
     style="width: 100%">
  <div class="modal-dialog">
    <div class="modal-header bg-gray">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('app', "Error"); ?></h4>
    </div>
    <div class="" style="border-radius: 0px">
      <div class="modal-body" style="background-color: white">
      <div class="message"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-sm fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
     style="width: 100%">
  <div class="modal-dialog">
    <div class="modal-header bg-gray">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('app', "Congratulation"); ?></h4>
    </div>
    <div class="" style="border-radius: 0px">
      <div class="modal-body" style="background-color: white">
      <div class="message"></div>
      </div>
    </div>
  </div>
</div>