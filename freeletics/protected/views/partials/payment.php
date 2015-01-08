<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-spinedit.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap-spinedit.js" type="text/javascript"></script>
<style>
  div.spinedit .icon-chevron-up, div.spinedit .icon-chevron-down {
    font-size: 10px;
  }
  div.spinedit {
    position: absolute;
    bottom: 11px;
    left: 60px;
  }
  input[type="text"].spinedit {
    width: 70px;
    display: inline-block;
    margin-right: 5px;
  }
  div.spinedit .icon-chevron-down {
    top: 5px;
  }
  div.spinedit .icon-chevron-up {
    top: -10px;
  }
  .payment-select {
    display: inline-block;
    width: 71px;
  }
  #payment-panel p, #payment-panel{
    font-size: 13px;
  }
  label {
    font-weight: normal;
  }

  .bs-wizard {margin-top: 40px;}

  /*Form Wizard*/
  .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
  .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
  .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
  .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
  .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
  .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 10px; height: 10px; display: block; background: #228dff; top: auto; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
  /*.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 10px; height: 10px; background: #228dff; border-radius: 50px; position: absolute; top: 2px; left: 3px; }*/ 
  .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 2px; box-shadow: none; margin: 8px 0;}
  .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #228dff;}
  .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
  .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
  .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
  .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
  .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
  .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
  .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 45%; width: 70%;}
  .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
  .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
  /*END Form Wizard*/
</style>
<script>
  $(function() {
    $('.spinEdit').spinedit({
      minimum: 20,
      maximum: 400,
      step: 5,
      numberOfDecimals: 0
    });
    $('.spinEdit').parent().find("i.icon-chevron-down").addClass("fa fa-chevron-down");
    $('.spinEdit').parent().find("i.icon-chevron-up").addClass("fa fa-chevron-up");

    $("[name='Payment[type]']").click(function() {
      $("[name='Payment[type]']").attr("checked", false);
      $(this).prop("checked", true);
    });

    $("#payment_costs a").click(function() {
      $("#payment_costs a").removeClass("btn-primary");
      $(this).addClass("btn-primary");
    })

    $("#Payment_cost_1, #Payment_nutrition_1").attr("checked", true);
    $("#Payment_href_1").addClass("btn-primary");

  });
</script>
<div class="container">
  <div class="col-md-4">
    <div class="panel panel-info"  style="border-radius: 0;">
      <div class="panel-heading"  style="border-radius: 0;">
        <h4 style="margin-bottom: 0;"><?php echo Yii::t("app", "GET YOUR COACH"); ?></h4>
      </div>
      <div class="panel-body" id="payment-panel" style="border-radius: 0;">
        <form id="form_payment" onsubmit="return false;">
          <div class="row">
            <input type="hidden" name="type_page" value="<?php echo $typePage; ?>"/>
            <?php if ($typePage == 'training') { ?>
              <div class="col-md-12">
                <p><?php echo Yii::t("app", "Your goal"); ?>&nbsp;<i class="fa fa-question-circle"></i></p>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <input type="radio" name="Payment[goal]" id="ckb_strength" value="0"/>&nbsp;<label for="ckb_strength"><?php echo Yii::t("app", "Strength"); ?></label>
                    &ensp;&ensp;
                    <input type="radio" name="Payment[goal]" id="ckb_cardio" value="1"/>&nbsp;<label for="ckb_cardio"><?php echo Yii::t("app", "Cardio"); ?></label>
                    &ensp;&ensp;
                    <input type="radio" name="Payment[goal]" id="ckb_both" value="2" checked=""/>&nbsp;<label for="ckb_both"><?php echo Yii::t("app", "Both"); ?></label>
                  </div>
                </div>
                <p></p>
                <div class="row">
                  <div class="col-md-6 col-xs-6" style="padding-right: 0;">
                    <p><?php echo Yii::t("app", "You Height"); ?></p>
                    <input type="text" name="Payment[height]" class="form-control spinEdit" value="<?php echo 160; ?>"/>
                    <select name="Payment[type_height]" class="form-control payment-select">
                      <option value="cm">
                        cm
                      </option>
                      <option value="in">
                        in
                      </option>
                    </select>
                  </div>
                  <div class="col-md-6 col-xs-6" style="padding-right: 0;">
                    <p><?php echo Yii::t("app", "You Weight"); ?></p>
                    <input type="text" name="Payment[weight]" class="form-control spinEdit" value="<?php echo 80; ?>"/>
                    <select name="Payment[type_weight]" class="form-control payment-select">
                      <option value="kg">
                        kg
                      </option>
                      <option value="lbs">
                        lbs
                      </option>
                    </select>
                  </div>
                </div>
                <p></p>
                <div class="row">
                  <div class="col-md-12 col-xs-12" style="padding-right: 0;">
                    <p><?php echo Yii::t("app", "Your level of fitness"); ?></p>
                    <input type="radio" id="ckb_level_1" name="Payment[level]" class="" value="0" checked=""/>&nbsp;<label for="ckb_level_1"><?php echo Yii::t("app", "I <strong>hardly do any sports</strong>"); ?></label>
                    <br/>
                    <input type="radio" id="ckb_level_2" name="Payment[level]" class="" value="1"/>&nbsp;<label for="ckb_level_2"><?php echo Yii::t("app", "I am <strong>rather sporty</strong>"); ?></label>
                    <br/>
                    <input type="radio" id="ckb_level_3" name="Payment[level]" class="" value="2"/>&nbsp;<label for="ckb_level_3"><?php echo Yii::t("app", "I am <strong>sport enthusiastic</strong>"); ?></label>
                    <br/>
                  </div>
                </div>
                <p style="border-bottom: 1px solid rgb(221, 221, 221)"></p>
                <div class="row" id="payment_costs">
                  <div class="col-md-12">
                    <div class="btn-group btn-group-justified">
                      <?php foreach ($costs as $index => $c) { ?>
                        <input type="radio" id="Payment_cost_<?php echo $index; ?>" name="Payment[cost]" style="display: none;" value="<?php echo trim($c); ?>"/>
                        <a id="Payment_href_<?php echo $index; ?>" class="btn btn-sm" onclick="$('#Payment_cost_<?php echo $index; ?>').prop('checked', true);">
                          <label style="margin: 0; font-size: 11px; font-style: normal;">
                            <?php echo $times[$index]; ?>&nbsp;<?php echo Yii::t("app", $unit); ?>
                          </label>
                          <p style="margin-bottom: 5px;"></p>
                          <label for="Payment_cost_<?php echo $index; ?>" style="margin: 0; font-style: normal;">
                            <?php echo $c; ?>&nbsp;<i class="fa fa-euro"></i>
                          </label>
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <p style="border-bottom: 1px solid rgb(221, 221, 221)"></p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label"><?php echo Yii::t("app", "Coupon Code"); ?></label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo Yii::t("app", "Add code"); ?>" id="coupon_code">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button" style="min-height: 40px;" onclick="addCode();">
                            <i class="fa fa-plus-square-o"></i>
                          </button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
                <div class="row" id="payment_costs">
                  <div class="col-md-12">
                    <div class="btn-group btn-group-justified">
                      <?php foreach ($costs as $index => $c) { ?>
                        <input type="hidden" name="Payment[cost]" style="display: none;" value="<?php echo trim($c); ?>"/>
                        <a id="payment_href_<?php echo $index; ?>" class="btn btn-sm" onclick="$('#Payment_cost_<?php echo $index; ?>').prop('checked', true);">
                          <label style="margin: 0; font-size: 11px; font-style: normal;">
                            <?php echo $times[$index]; ?>&nbsp;<?php echo Yii::t("app", $unit); ?>
                          </label>
                          <p style="margin-bottom: 5px;"></p>
                          <h1>
                            <label for="Payment_cost_1" style="margin: 0; font-style: normal;">
                              <?php echo $c; ?>&nbsp;<i class="fa fa-euro"></i>
                            </label>
                          </h1>
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group btn-group-justified">
                      <a id="Payment_href_0" class="btn btn-default btn-sm" onclick="$('#Payment_nutrition_0').prop('checked', true);">
                        <input type="radio" id="Payment_nutrition_0" name="Payment[nutrition]" value="0"/>
                        <label for="Payment_nutrition_0">&nbsp;<?php echo Yii::t('app', 'Burn fat'); ?></label>
                      </a>
                      <a id="Payment_href_1" class="btn btn-default btn-sm" onclick="$('#Payment_nutrition_1').prop('checked', true);">
                        <input type="radio" id="Payment_nutrition_1" name="Payment[nutrition]" value="1"/>
                        <label for="Payment_nutrition_1">&nbsp;<?php echo Yii::t('app', 'Gain muscle'); ?></label>
                      </a>
                    </div>
                  </div>
                </div>
                <p style="border-bottom: 1px solid rgb(221, 221, 221)"></p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label"><?php echo Yii::t("app", "Coupon Code"); ?></label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo Yii::t("app", "Add code"); ?>" id="coupon_code">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button" style="min-height: 40px;" onclick="addCode();">
                            <i class="fa fa-plus-square-o"></i>
                          </button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_payment">
              <?php echo Yii::t("app", "Get your Coach Now"); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 0; padding-bottom: 0; position: absolute; right: 0; z-index: 999">
        <button type="button" class="close pull-right" data-dismiss="modal">
          <span class=""><i class="fa fa-times"></i></span></button>
      </div>
      <div class="modal-body">
        <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "PAYMENT INTERVAL"); ?></h5>
        <div class="row bs-wizard" style="border-bottom:0; margin-top: 5px;">

          <div class="col-xs-4 bs-wizard-step complete">
            <!--<div class="text-center bs-wizard-stepnum">Step 1</div>-->
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center"><?php echo Yii::t("app", "Payment interval"); ?></div>
          </div>

          <div class="col-xs-4 bs-wizard-step active"><!-- complete -->
            <!--<div class="text-center bs-wizard-stepnum">Step 3</div>-->
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center"><?php echo Yii::t("app", "Payment option"); ?></div>
          </div>

          <div class="col-xs-4 bs-wizard-step disabled"><!-- active -->
            <!--<div class="text-center bs-wizard-stepnum">Step 4</div>-->
            <div class="progress"><div class="progress-bar"></div></div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center"><?php echo Yii::t("app", "Start Coach"); ?></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="list-group">
              <a href="#" class="list-group-item">
                <p class="list-group-item-text">
                  <input class="" type="checkbox" name="Payment[type]" id="Payment_type_PayPal" value="paypal">&nbsp;
                  <label for="Payment_type_PayPal">
                    <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" width="100px" border="0" alt="PayPal Logo">
                  </label>
                </p>
              </a>
              <a href="#" class="list-group-item">
                <p class="list-group-item-text">
                  <input class="" type="checkbox" name="Payment[type]" id="Payment_type_VISA" value="visa_master">&nbsp;
                  <label for="Payment_type_VISA">
                    <img src="http://www.credit-card-logos.com/images/visa_credit-card-logos/visa_logo_8.gif" width="50px">
                    <img src="http:///www.credit-card-logos.com/images/mastercard_credit-card-logos/mastercard_logo_1.gif" width="50px">
                  </label>
                </p>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <button class="btn btn-info btn-sm" onclick="submitPayment();" style="width: 100%;">
              <?php echo Yii::t("app", "Pay now"); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function submitPayment() {
    $("[name='Payment[type]']").each(function() {
      if ($(this).is(":checked")) {
        savePayment($(this).val());
        return false;
      }
    });
  }

  function savePayment(type) {
    var st = $("#form_payment").serializeArray();
    $.post('<?php echo Yii::app()->createUrl("payment/savepayment"); ?>',
            st,
            function(data) {
              if (data.status == '<?php echo Constant::RS_ST_ERROR; ?>') {
                //error server, stop payment
                return;
              }
              if (type == 'paypal') {
                paymentPaypal();
              } else if (type === 'visa_master') {

              }
            },
            'json');
  }

  function paymentPaypal() {
    $.post("<?php echo Yii::app()->createUrl("payment/paypal"); ?>",
            {},
            function(data) {
              if (data.status === '<?php echo Constant::RS_ST_ERROR; ?>') {

              } else {
                window.location.href = data.url;
              }
            }, 'json');
  }

  function addCode() {
    var cc = $("#coupon_code").val();
    $.post("<?php echo Yii::app()->createUrl("payment/addcode"); ?>",
            {"code": cc, 'type_page': '<?php echo $typePage; ?>'},
    function(data) {
      console.log(data);
      if (data.status === '<?php echo Constant::RS_ST_ERROR; ?>') {

      } else {
      }
    }, 'json');
  }
</script>