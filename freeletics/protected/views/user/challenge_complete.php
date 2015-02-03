<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>
  $(function() {
    $('.spinEdit').spinedit({
      minimum: 20,
      maximum: 400,
      step: 5,
      numberOfDecimals: 0
    });
  });
  function submitForm() {
    var form = $("<form/>", {
      action: "",
      method: "post"
    });
    var input = $("<input/>", {
      value: function() {
        var value = "";
        $("#form_challenge .exercises").each(function() {
          if ($(this).is(":checked")) {
            value += $(this).val() + ",";
          }
        });
        return value;
      },
      name: "exercises"
    });
    $(form).append(input);
    input = $("<input/>", {
      value: function() {
        var value = "";
        $("#form_challenge .user").each(function() {
          if ($(this).is(":checked")) {
            value += $(this).val() + ",";
          }
        });
        return value;
      },
      name: "user"
    });
    $(form).append(input);
    input = $("<input/>", {
      value: $("#form_challenge .time").val(),
      name: "time"
    });
    $(form).append(input);
    $(form).submit();
  }
</script>
<div class="container" style="margin-top: 50px;" id="form_challenge">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <?php echo Yii::t("app", "Send invitation completed. Waiting reply..."); ?>
        </div>
      </div>
    </div>
  </div>
</div>