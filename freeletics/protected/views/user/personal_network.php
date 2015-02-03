<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$followers = $data['followers'];
$followings = $data['followings'];
?>
<style>
  #network-container h4 {
    margin-bottom: 0;
  }
</style>
<script>
  $(function() {
    var isChecking = false;
    $(".ckb-add-feed").iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue',
      increaseArea: '20%' // optional
    }).on('ifChecked', function(event) {
      if (isChecking) {
        return;
      }
      var user = $(this).attr("user-id");
      isChecking = true;
      $("[user-id='" + user + "']").not(this).iCheck("check");
      $.post("<?php echo Yii::app()->createUrl("user/updateotherfeeds"); ?>",
              {id: user},
      function(data) {
        isChecking = false;
        console.log(data);
      },
              'json');
    }).on('ifUnchecked', function(event) {
      if (isChecking) {
        return;
      }
      var user = $(this).attr("user-id");
      isChecking = true;
      $("[user-id='" + user + "']").not(this).iCheck("uncheck");
      $.post("<?php echo Yii::app()->createUrl("user/updateotherfeeds"); ?>",
              {id: user},
      function(data) {
        isChecking = false;
        console.log(data);
      },
              'json');
    });
  });
</script>
<div class="container" id="network-container">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "Followers"); ?></h4>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php
          foreach ($followers as $index => $f) {
            $fl = $f['user'];
            ?>
            <a href="#" class="list-group-item" style="min-height: 60px;">
              <input type="checkbox" class="ckb-add-feed" <?php echo $f["isFeed"] ? "checked" : ""; ?> user-id="<?php echo $fl->id; ?>"/>
              <?php echo $fl->first . ' ' . $fl->last; ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4><?php echo Yii::t("app", "Followings"); ?></h4>
      </div>
      <div class="panel-body">
        <?php
        foreach ($followings as $index => $f) {
          $fl = $f['user'];
          ?>
          <a href="#" class="list-group-item" style="min-height: 60px;">
            <input type="checkbox" class="ckb-add-feed" <?php echo $f["isFeed"] ? "checked" : ""; ?> user-id="<?php echo $fl->id; ?>"/>
            <?php echo $fl->first . ' ' . $fl->last; ?>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
</div>
