<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/flextext/style.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flexText.min.js" type="text/javascript"></script>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.comment.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.comment.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.autogrow-textarea.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.timeago.js" type="text/javascript"></script>

<?php if (!Yii::app()->user->isGuest) { ?>
  <?php
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => true,
      'controller' => 'user',
      'width' => '32%',
      "menus" => $menus = array(
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
  ?>
<?php } ?>

<div class="container" style="padding-top: 70px;">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row" id="list-feeds">
      <?php foreach ($feeds as $index => $feed) { ?>
        <div class="col-md-6 <?php echo $index % 2 != 0 ? "pull-left" : "pull-right"; ?>">
          <div class="panel panel-default" index='<?php echo $index; ?>'>
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-1">
                  <div class="avatar-hexagon-md" style="display: inline-block;">
                    <canvas id="canvas_<?php echo $index; ?>" width="40" height="40" class="lower-canvas"></canvas>
                  </div>
                </div>
                <div class="col-md-11" style="padding: 0px 20px;">
                  <h5 style="margin-bottom: 0px;">
                    <?php echo $feed->user->first; ?>
                  </h5>
                  <p style="margin-bottom: 0px;"><?php echo $feed->time; ?></p>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <h5 style="margin-bottom: 5px;">
                <i class="fa fa-clock-o"></i>&nbsp;
                <?php echo $feed->result['star'] ? '<i class="fa fa-star"></i>' : ''; ?>&nbsp;
                <?php echo $feed->result['PB']; ?>
              </h5>
              <?php echo $feed->comment_text; ?>
            </div>
            <div class="panel-footer">
              <a class="btn-click-like" style="" onclick="submitLike('<?php echo $index; ?>');">
                  <?php if ($feed->like) { ?>
                    <i class="fa fa-stop fa-stack"></i>
                  <?php } else { ?>
                    <i class="fa fa-thumbs-o-up fa-stack"></i>
                  <?php } ?>
                </span>&nbsp;
              </a>
              <a class="btn-click-add-comment">
                  <i class="fa fa-comments-o fa-stack"></i>
                </span>&nbsp;
                <?php echo $feed->extra_comments != null && is_array($feed->extra_comments) ? count($feed->extra_comments) : 0; ?>
                <?php echo Yii::t('app', ' comment(s)'); ?>
              </a>
            </div>
            <div class="tab-pane fade active in" id="newest-comment">
              <div class="row">
                <div class="col-md-12">
                  <div class="comment-container-<?php echo $index; ?>"></div> 
                </div>
              </div>
            </div>
            <?php
//            if ($feed->extra_comments != null && is_array($feed->extra_comments)) {
//              foreach ($feed->extra_comments as $extra) {
//                
            ?>
            <div class="panel-footer">
              <?php // echo $extra['content']; ?>
              <?php
//                  $dateTime = date('Y-m-d H:i:s', $extra['create_date']);
//                  
              ?>
            </div>
            <?php
//              }
//            }
            ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<div class="panel-footer input-comment hidden" id="prototype_comment">
  <textarea class="form-control comment-content" placeholder="<?php echo Yii::t('app', 'Your Comment'); ?>" rows="2" wrap="true"></textarea>
</div>
<div class="panel-footer output-comment hidden" id="prototype_comment_output">

</div>
<style>
  div.input-comment {
    display:inline-block;
    border: solid 1px #000;
    min-height:10px;
    width: 300px;
  }
  .panel-footer.hidden {
    display: none;
  }
  .panel-footer.input-comment, .panel-footer.input-comment textarea{
    width: 100%;
    resize: none;
  }
</style>
<script>
  $(function() {
    var urlAvatar = 'https://freeletics-storage.s3.amazonaws.com/medium/69866fb18adca9ad8f0d178797e2c2af2807e46b.jpg?1421167497';
<?php foreach ($feeds as $index => $feed) { ?>
      loadCanvas("canvas_<?php echo $index; ?>", urlAvatar, 0.3);
<?php } ?>
  });

  $(function() {
    $(".btn-click-add-comment").click(function() {
      var panel = $(this).parent().parent();
      if ($(panel).find(".panel-footer:last.input-comment").length === 0) {
        var protype_comment = $("#prototype_comment").clone().removeAttr("id").removeClass('hidden');
        $(protype_comment).find("textarea").flexText();
        $(protype_comment).find("br:last").remove();
        $(protype_comment).attr('index', $(panel).attr('index'));
        $(panel).find(".panel-footer:last").after(protype_comment);

        $(protype_comment).find(".comment-content").keypress(function(event) {
          if (event.which == 13) {
            postComment(this);
          }
        });
      }
    });

<?php foreach ($feeds as $index => $feed) { ?>
      createComments('<?php echo $feed->id; ?>', '.comment-container-<?php echo $index; ?>');
<?php } ?>
  });

  var comments = {};
  function createComments(id, container) {
    $(container).comment({
      title: 'Comments',
      url_like: '<?php echo Yii::app()->createUrl("user/feedcomment/") . "?comments=like&id="; ?>' + id,
      url_get: '<?php echo Yii::app()->createUrl("user/feedcomment/") . "?comments=list&id="; ?>' + id,
      url_input: '<?php echo Yii::app()->createUrl("user/feedcomment/") . "?comments=add&id="; ?>' + id,
      url_delete: '<?php echo Yii::app()->createUrl("user/feedcomment/") . "?comments=delete&id="; ?>' + id,
      limit: 10,
      auto_refresh: false,
      refresh: 10000,
      transition: 'slideToggle',
      buttons: {
        'reply': '<?php echo Yii::t("app", "Reply"); ?>',
        'like': '<?php echo Yii::t("app", "Like"); ?>',
        'unlike': '<?php echo Yii::t("app", "Unlike"); ?>'
      },
      onSubmitComplete: function(data) {
        console.log(data);
      },
      onLike: function(data) {
      }});
  }

  function postComment(element) {
    var index = $(element).parent().parent().attr("index");
    var content = $(element).val();
    $.post(
            '<?php echo Yii::app()->createUrl('/feed/addcomment'); ?>',
            {
              'content': content,
              'id': index,
              'user_id': '<?php echo Yii::app()->user->id; ?>'
            },
    function(data) {

    }, 'json'
            );
    var prototype_output_comment = $("#prototype_comment_output").clone().removeClass('hidden').removeAttr('id');
    $(prototype_output_comment).text(content);
    $('#list-feeds .panel[index="' + index + '"] .panel-footer:last').after(prototype_output_comment);

    $(element).parent().parent().remove();
  }

  function submitLike(feed_id) {
    $.post(
            '<?php echo Yii::app()->createUrl('feed/like'); ?>',
            {'feed': feed_id},
    function(data) {
      if (data.status == '<?php echo Constant::RS_ST_ERROR; ?>') {

      }
    },
            'json'
            );
  }
</script>