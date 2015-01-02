<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/js/upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/upload/js/jquery.fileupload.js"></script>
<script>
  $(function() {
    $('#fileupload').fileupload({
      dataType: 'json',
      done: function(e, data) {
        $.each(data.result.files, function(index, file) {
          var clone = $("#btn_delete_file").clone(true).removeAttr("id").removeClass("hidden");
          $(clone).find(".file-name").text(file.name);
          $(clone).find("button[data-type='DELETE']").attr("data-url", '<?php echo Yii::app()->createUrl("support/deletefile/"); ?>' + "?file=" + file.name);
          $(clone).appendTo($("#upload_area"));
        });
      }
    });
    $('#fileupload').bind('fileuploadprogress', function(e, data) {
      // Log the current bitrate for this upload:
      console.log(data.bitrate);
    });
    $("#btn_delete_file").click(function() {
      var url_delete = $(this).find("button[data-type='DELETE']").attr("data-url");
      $.get(url_delete, function(data) {
        console.log(data);
      }, 'json');
    });
  });
</script>
<div class="container">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <form>
          <div class="col-md-12" >
            <?php
            foreach ($dataForm["data"] as $field) {
              $data = $field->toArray();
              ?>
              <div class="col-md-12" style="">
                <?php echo Yii::t("app", $data["title"]); ?> 
                <span style="color: red;"><?php echo $data['required'] == "true" ? "*" : ""; ?></span>
              </div>
              <?php if ($data["type"] == 'text') { ?>
                <div class="col-md-12">
                  <?php if ($data['max-length'] != "null") { ?>
                    <input type="text" name="<?php echo $dataForm["name"] . "[" . $data['name'] . "]" ?>" 
                           required="<?php echo $data["required"] ?>" maxlength = "<?php echo $data["max-length"] ?>"
                           class="form-control"/>
                         <?php } else { ?>
                    <textarea rows="4" name="<?php echo $dataForm["name"] . "[" . $data['name'] . "]" ?>"
                              class="form-control"></textarea>
                            <?php } ?>
                </div>
              <?php } else if ($data["type"] == 'upload') { ?>
                <div class="col-md-12" id="upload_area">
                  <span class="btn btn-success btn-sm fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span><?php echo $data['title'] ?></span>
                    <input id="fileupload" type="file" name="files[]" multiple=""
                           data-url="<?php echo Yii::app()->createUrl("/support/upload"); ?>"  />
                  </span>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<span  class="delete hidden" id="btn_delete_file">
  <span class="file-name"></span>
  <button type="button" data-url="" data-type="DELETE"><i class="fa fa-trash" style="top: 4px;"></i></button>
</span>