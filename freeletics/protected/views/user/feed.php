<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/flextext/style.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flexText.min.js" type="text/javascript"></script>
<div class="container" style="padding-top: 70px;">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row" id="list-feeds">
      <?php foreach ($feeds as $index => $feed) { ?>
        <div class="col-md-6">
          <div class="panel panel-default" index='<?php echo $index; ?>'>
            <div class="panel-heading">
              <i class="fa fa-clock-o"></i>&nbsp;
              <?php echo $feed->result['star'] ? '<i class="fa fa-star"></i>' : ''; ?>&nbsp;
              <?php echo $feed->result['PB']; ?>
            </div>
            <div class="panel-body">
              <?php echo $feed->comment_text; ?>
            </div>
            <div class="panel-footer">
              <a class="btn-click-like" style="" onclick="submitLike('<?php echo $index; ?>');">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <?php if ($feed->like) { ?>
                    <i class="fa fa-stop fa-stack-1x"></i>
                  <?php } else { ?>
                    <i class="fa fa-thumbs-o-up fa-stack-1x"></i>
                  <?php } ?>
                </span>&nbsp;
              </a>
              <a class="btn-click-add-comment">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-comments-o fa-stack-1x"></i>
                </span>&nbsp;
                <?php echo $feed->extra_comments != null && is_array($feed->extra_comments) ? count($feed->extra_comments) : 0; ?>
                <?php echo Yii::t('app', ' comment(s)'); ?>
              </a>
            </div>
            <?php
            if ($feed->extra_comments != null && is_array($feed->extra_comments)) {
              foreach ($feed->extra_comments as $extra) {
                ?>
                <div class="panel-footer">
                  <?php echo $extra['content']; ?>
                  <?php
                  $dateTime = date('Y-m-d H:i:s', $extra['create_date']);
                  ?>
                </div>
                <?php
              }
            }
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
  $(function () {
    $(".btn-click-add-comment").click(function () {
      var panel = $(this).parent().parent();
      if ($(panel).find(".panel-footer:last.input-comment").length === 0) {
        var protype_comment = $("#prototype_comment").clone().removeAttr("id").removeClass('hidden');
        $(protype_comment).find("textarea").flexText();
        $(protype_comment).find("br:last").remove();
        $(protype_comment).attr('index', $(panel).attr('index'));
        $(panel).find(".panel-footer:last").after(protype_comment);

        $(protype_comment).find(".comment-content").keypress(function (event) {
          if (event.which == 13) {
            postComment(this);
          }
        });
      }
    });
  });

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
    function (data) {

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
    function (data) {
      if (data.status == '<?php echo Constant::RS_ST_ERROR; ?>') {
        
      }
    },
            'json'
            );
  }
</script>