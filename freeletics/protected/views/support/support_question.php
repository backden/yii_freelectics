<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$type_question = SystemUtils::getCsvToArray("data/FAQ/Form_Define.csv");
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/js/upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.fileupload.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/validate/additional-methods.min.js" type="text/javascript"></script>
<script>
          $(function() {
          var url = window.location.hostname === 'blueimp.github.io' ?
                  '//jquery-file-upload.appspot.com/' : 'server/php/',
                  uploadButton = $('<button/>')
                  .addClass('btn btn-primary')
                  .prop('disabled', true)
                  .text('Processing...')
                  .on('click', function() {
                  var $this = $(this),
                          data = $this.data();
                          $this
                          .off('click')
                          .text('Abort')
                          .on('click', function() {
                          $this.remove();
                                  data.abort();
                          });
                          data.submit().always(function() {
                  $this.remove();
                  });
                  });
                  $('#fileupload').fileupload({
          maxFileSize: 5000000,
                  dataType: 'json',
                  done: function(e, data) {
                  $.each(data.result.files, function(index, file) {
                  if (file.error !== undefined) {
                  $("#modal_error").find(".message").text(file.error);
                          $("#modal_error").modal("show");
                          var item = $("#upload_area .file-upload")[index];
                          $(item).remove();
                  } else {
                  var item = $("#upload_area .file-upload")[index];
                          $(item).find("button[data-type='DELETE']").attr("data-url", '<?php echo Yii::app()->createUrl("support/deletefile/"); ?>' + "?file=" + file.name).removeClass("hidden");
                  }
                  });
                  },
                  progressall: function(e, data) {
                  var progress = parseInt(data.loaded / data.total * 100, 10);
                          $('#progress .bar').css(
                          'width',
                          progress + '%'
                          );
                  }
          }).on('fileuploadadd', function(e, data) {
          $.each(data.files, function(index, file) {
          var clone = $("#btn_delete_file").clone(true).removeAttr("id").removeClass("hidden");
                  $(clone).find(".file-name").text(file.name);
                  $(clone).appendTo($("#upload_area"));
          });
          });
                  $("#btn_delete_file").click(function() {
          var url_delete = $(this).find("button[data-type='DELETE']").attr("data-url");
                  var that = $(this);
                  $.get(url_delete, {}, function(data) {
                  that.remove();
                  }, 'json');
          });
                  $("#select_type").change(function(index) {
          if ($(this).val() != "---" || index >= 0) {
          window.location.href = '<?php echo Yii::app()->createUrl("support/question/type"); ?>' + "/" + $(this).val();
          } else {
          window.location.href = '<?php echo Yii::app()->createUrl("support/question/"); ?>'
          }
          });
                  $(".datepicker").datepicker({
          format: 'mm-dd-yyyy',
                  autoClose: true,
                  forceParse: false
          }).on("changeDate", function() {
          });
<?php if (isset($dataForm)) { ?>
            $("#form_question").validate({
            rules: {
  <?php
  foreach ($dataForm["data"] as $field) {
    $data = $field->toArray();
    ?>

              "<?php echo $dataForm["name"] . "[" . $data['name'] . "]" ?>": {
    <?php echo isset($data["required"]) ? 'required: ' . $data["required"] : ''; ?>
    <?php echo $data["name"] == 'email' ? ", email: true" : ""; ?>
    <?php echo isset($data["max-length"]) && $data["max-length"] > 0 ? ", rangelength: [0," . $data["max-length"] . "]" : ""; ?>
              },
  <?php } ?>
            },
            });
<?php } ?>
          });</script>
<div class="container">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body" style="min-height: 400px;">
        <div class="row">
          <div class="col-md-12">
            <span><?php echo Yii::t("app", "Please choose your issue below"); ?></span>
            <select id="select_type" class="form-control">
              <option value="---" selected="">---</option>
              <?php
              foreach ($type_question as $csv) {
                if ($type == $csv['name']) {
                  ?>
                  <option value="<?php echo trim($csv['name']); ?>" selected=""><?php echo $csv['title'] ?></option>
                <?php } else { ?>
                  <option value="<?php echo trim($csv['name']); ?>"><?php echo $csv['title'] ?></option>
                <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="clearfix" style="margin-bottom: 5px;"></div>
        <?php if (isset($dataForm)) { ?>
          <div class="row">
            <div class="col-md-12">
              <form id="form_question" method="post" action="<?php echo Yii::app()->createUrl("/support/question"); ?>" enctype="multipart/form-data">
                <input type="hidden" name="type" value="<?php echo $type; ?>"/>
                <div class="row" >
                  <?php
                  foreach ($dataForm["data"] as $field) {
                    $data = $field->toArray();
                    ?>
                    <div class="col-md-12" style="font-weight: 700;">
                      <?php echo Yii::t("app", $data["title"]); ?> 
                      <span style="color: red;"><?php echo $data['required'] == "true" ? "*" : ""; ?></span>
                    </div>
                    <?php if ($data["type"] == 'text') { ?>
                      <div class="col-md-12">
                        <?php if ($data['max-length'] != "null") { ?>
                          <input type="text" name="<?php echo $dataForm["name"] . "[" . $data['name'] . "]" ?>" 
                                 required="<?php echo $data["required"] ?>" maxlength="<?php echo $data["max-length"] ?>"
                                 class="form-control"/>
                               <?php } else { ?>
                          <textarea rows="4" name="<?php echo $dataForm["name"] . "[" . $data['name'] . "]" ?>"
                                    class="form-control" required="<?php echo $data["required"] ?>"></textarea>
                                  <?php } ?>
                      </div>
                    <?php } else if ($data["type"] == 'select') { ?>
                      <div class="col-md-12" style="">
                        <select class="form-control" required="<?php echo $data["required"] ?>">
                          <?php $options = explode(",", $data['values']); ?>
                          <?php foreach ($options as $op) { ?>
                            <option value="<?php echo trim($op) ?>"><?php echo trim($op); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } else if ($data["type"] == 'date') { ?>
                      <div class="col-md-12" style="">
                        <input class="datepicker form-control"
                               required="<?php echo $data["required"] ?>" readonly="" style="cursor: pointer;">
                      </div>
                    <?php } else if ($data["type"] == 'upload') { ?>
                      <div class="col-md-12" id="upload_area">
                        <span class="btn btn-success btn-sm fileinput-button">
                          <i class="glyphicon glyphicon-plus"></i>
                          <span><?php echo $data['title'] ?>
                            <input id="fileupload" type="file" name="files[]" multiple=""
                                   data-url="<?php echo Yii::app()->createUrl("/support/upload"); ?>"/>
                          </span>
                        </span>
                        <?php echo Yii::t("app", "Max file size 5MB"); ?>
                        <!-- The global progress bar -->
                        <div id="files" class="files">
                        </div>
                      </div>
                    <?php } ?>
                    <div class="col-md-12">
                      <p><?php echo $data['description']; ?></p>
                    </div>
                  <?php } ?>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php if (isset($dataForm)) { ?>
        <div class="panel-footer">
          <div class="row">
            <div class="col-md-12 text-center">
              <button class="btn btn-primary btn-sm start" style="width: 100px;" onclick="$('form').submit();">
                <?php echo Yii::t("app", "Send"); ?>
              </button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div  class="file-upload delete hidden" id="btn_delete_file">
    <span class="file-name"></span>
    <button class="hidden" type="button" data-url="" data-type="DELETE"><i class="fa fa-trash" style="top: 4px;"></i></button>
  </div>

  <style>
    #section-footer {
      top: auto !important;
    }
    .error {
      color: red;
    }
  </style>