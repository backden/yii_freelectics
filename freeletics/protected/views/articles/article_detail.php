<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.comment.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.comment.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.autogrow-textarea.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.timeago.js" type="text/javascript"></script>
<?php
$this->renderPartial("//partials/scroll_dots", array(
    "sections" => array("intro", "section_menu", "section_content", "section_list_more_articles")
));
?>

<?php
echo $this->renderPartial("//partials/section_intro_articles", array(
    "width" => "auto",
    "height" => "400px",
    "data" => array(
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD.", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => 'Caption2', "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD. 2", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link")
    )
));
?>
<?php
$this->renderPartial("//partials/section_menu_dynamic", array(
    "menus" => $menus = array(
      "Training Advice" => array("id" => "training", 'links' => array('articles_training'), "menus" => array()),
      "Nutrition Advice" => array("id" => "nutrition", 'links' => array('articles_nutrition'), "menus" => array()),
      "Motivation" => array("id" => "motivation", 'links' => array('articles_motivation'), "menus" => array()),
      "Lifestyle" => array("id" => "lifestyle", 'links' => array('articles_lifestyle'), "menus" => array()),
      "Success Stories" => array("id" => "SStories", 'links' => array('blog', 'mod_written'), "menus" => array("Blog", "Mod written"))
    )
));
?>
<style>
  #section_content .container{
    padding: 15px 5px;
  }

  #section_content .container h2, #section_content .container h3, #section_content .container h4 {
    word-break: break-all;
    margin-bottom: 5px;
  }

  #section_content .container .row > div{
    padding: 0px 5px;
  }

  .posted-comment-container .posted-comment-head .posted-comment-author,
  .posted-comment-container .posted-comment-foot{
    font-size: 12px;
  }
</style>
<section id="section_content">
  <div class="container" >
    <div class="col-md-9 col-xs-8">
      <div class="row">
        <div class="col-md-9 col-xs-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3><?php echo html_entity_decode($article['title']); ?></h3>
            </div>
            <div class="panel panel-body" >
              <div class="row" style="font-size: 14px;">
                <div class="col-md-6">
                  <span class="text-muted"><?php echo $author->first . $author->last; ?></span>
                  <span class="text-muted"><?php echo $article->create_date; ?></span>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-3 pull-right btn-shares">
                      <a class="col-md-12 col-xs-12 share-icons">
                        <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $article->like_total; ?></span>
                      </a>
                      <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
                        <div class="row">
                          <div class="col-md-6">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>&t=<?php echo $article->title; ?>"
                               target="blank">
                              <i class="fa fa-facebook"></i>
                            </a>
                            <span class="article_FB_<?php echo $article->id; ?>">0</span>
                          </div>
                          <div class="col-md-6">
                            <a class="" href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>">
                              <i class="fa fa-twitter"></i>
                            </a>
                            <span class="article_TW_<?php echo $article->id; ?>">0</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>" class="">
                              <i class="fa fa-google-plus"></i>
                            </a>
                            <span class="article_GP_<?php echo $article->id; ?>">0</span>
                          </div>
                          <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 pull-right">
                      <a class="" onclick="printDiv('article-content');">
                        <i class="fa fa-print"></i>
                      </a>
                    </div>
                    <div class="col-md-1 pull-right">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-share-alt"></i>
                      </a>
                      <ul class="dropdown-menu" style="min-width: 0;">
                        <li><a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>&t=<?php echo $article->title; ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $article->id)); ?>"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="article-summary">
                <div class="col-md-12">
                  <?php echo html_entity_decode($article['summary']); ?>
                </div>
              </div>
              <div class="clearfix" style="margin-top: 10px;"></div>
              <div class="row" id="article-content">
                <div class="col-md-12">
                  <?php echo html_entity_decode($article['content']); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4><?php echo "Title Column"; ?></h4>
            </div>
            <div class="panel panel-body">
              <div class="list-group" id='list-articles-first'>
                <?php
                foreach ($articles as $art) {
                  ?>
                  <div class="row list-group-item">
                    <div class="col-md-12 pull-left">
                      <div class="row">
                        <div class="col-md-6">
                          <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $art->id)); ?>" class="">
                            <img src="data:image/png;base64,<?php $art->image_title; ?>" width="100%"/>
                          </a>
                        </div>
                        <div class="col-md-6 btn-shares">
                          <a class="col-md-12 col-xs-12 share-icons">
                            <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $art->like_total; ?></span>
                          </a>
                          <!--                          <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $art->id)); ?>&t=<?php echo $art->title; ?>"
                                                             target="blank">
                                                            <i class="fa fa-facebook"></i>
                                                          </a>
                                                          <span class="article_FB_<?php echo $art->id; ?>">0</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <a class="" href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $art->id)); ?>">
                                                            <i class="fa fa-twitter"></i>
                                                          </a>
                                                          <span class="article_TW_<?php echo $art->id; ?>">0</span>
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $art->id)); ?>" class="">
                                                            <i class="fa fa-google-plus"></i>
                                                          </a>
                                                          <span class="article_GP_<?php echo $art->id; ?>">0</span>
                                                        </div>
                                                        <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                                                      </div>
                                                    </div>-->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $art->id)); ?>" class="">
                        <p class="list-group-item-text">
                          <?php echo CString::truncate($art->title, 150); ?>
                        </p>
                      </a>
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="nav nav-tabs pull-right">
          <li class="active">
            <a order="0" href="#newest-comment" data-toggle="tab"><?php echo Yii::t("app", "Newest"); ?></a>
          </li>
          <li>
            <a order="1" href="#most-views" data-toggle="tab"><?php echo Yii::t("app", "Most "); ?></a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="newest-comment">
            <div class="comment-container"></div> 
          </div>
          <div class="tab-pane fade in" id="most-views">
            <div class="comment-container"></div> 
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-12" style="margin-top: 10px;">
      <a href="#" class="">
        <img src="<?php echo Yii::app()->baseUrl; ?>/img/Coach_Teaser.jpg" width="100%"/>
      </a>
    </div>
  </div>
</section>


<script type = "text/javascript" >
  //  $('.btn-shares').popover({
  //    html: true,
  //    content: function() {
  //      return $(this).find(".pop-share").html();
  //    },
  //    placement: "bottom",
  //    container: 'body'
  //  });

  $('body').on('click', function(e) {
    //did not click a popover toggle or popover
    if (!$(e.target).parent().hasClass("share-icons")) {
      if ($('.popover.in').length != 0) {
        $('.popover.in').popover('hide');
      }
    } else {
      if ($('.popover.in').length > 1) {
        $('.popover.in').first().popover('hide');
      }
    }
  });

  $('#list-articles-first').slimScroll({
    height: '450px',
    alwaysVisible: false
  });
  var comments = {};
  $(document).ready(function() {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      var target = e.target; // newly activated tab
      var pretarget = e.relatedTarget; // previous active tab
      $('div.comment-container').remove();
      var div = $('<div />', {class: 'comment-container'}).appendTo($($("" + $(target).attr("href"))));
      if ($(this).attr("order") == 0) {
        createComments('newest');
      } else {
        createComments('most');
      }
    });

    createComments('newest');
  });

  function createComments(type) {
    $('div.comment-container').comment({
      title: 'Comments',
      url_like: '<?php echo Yii::app()->createUrl("articles/comments/") . '?id=' . $article->id . "&comments=like"; ?>',
      url_get: '<?php echo Yii::app()->createUrl("articles/comments/") . '?id=' . $article->id . "&comments=list&order="; ?>' + type,
      url_input: '<?php echo Yii::app()->createUrl("articles/comments/") . '?id=' . $article->id . "&comments=add"; ?>',
      url_delete: '<?php echo Yii::app()->createUrl("articles/comments/") . '?id=' . $article->id . "&comments=delete"; ?>',
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

</script>

<section id="section_list_more_articles" class="">
  <div class="container">
    <div class="wrap">
      <div class="basic" id="frame">
        <ul>
          <?php
          $i = 0;
          while ($i < 10) {
            ?>
            <li>
              <div class="image-cover image-cover-sm"></div>
            </li>
            <?php
            $i++;
          }
          ?>
        </ul>
      </div>
      <button class="prevPage page-top-right"><i class="fa fa-chevron-left"></i></button>
      <button class="nextPage page-top-right"><i class="fa fa-chevron-right"></i></button>
    </div>
  </div>
</section>

<style>
  #article-content img {
    width: 100%;
  }

  #article-content {
    font-family: "Arial", Times, serif;
  }

  #frame ul li {
    float: left;
    width: 300px;
    height: 100%;
    margin: 0 1px 0 0;
    padding: 0;
    background: #333;
    color: #ddd;
    text-align: center;
    cursor: pointer;
  }

  .nextPage.page-top-right, .prevPage.page-top-right {
    background: #ddd; 
    /* border: 0; */
    /* opacity: 1; */
    font-size: inherit; 
    position: absolute; 
    left: inherit; 
    top: -25px; 
    display: inherit; 
    right: 30px;
  }

  .nextPage.page-top-right {
    right: 0px;
  }

  .page-top-right.disabled {
    color: white;
  }

  #frame ul {
    list-style: none;
  }

  #section_list_more_articles {
    padding: 0;
  }

  #section_list_more_articles .container {
    padding: 0;
  }

  div.image-cover {
    background-image:url('http://placehold.it/600x300');
    background-repeat:no-repeat;
    background-size:cover;
    width: 100%;
    height: 300px;
  }

  div.image-cover.image-cover-sm {
    background-image:url('http://placehold.it/600x300');
    background-repeat:no-repeat;
    background-size:cover;
    width: 100%;
    height: 200px;
  }

  .btn-socials {
    padding: 5px 15px;
    font-size: 18px;
  }

  .top-heading-article .panel .panel-body {
    min-height: 150px;
  }

  .popover { 
    min-width: 137px;
  }

  .popover .popover-content span {
    float: right;
  }

  .popover .popover-content {
    background: rgba(0, 0, 0, 0.3);
  }

  .popover .arrow:after {
    border-bottom-color: rgba(0, 0, 0, 0.3) !important;
  }

  .pop-share a {
    border: black 1px solid;
  }

  .share-icons {
    color: black;
  }
</style>
<script>
  $(function() {
    var $frame = $('#frame');
    var $slidee = $frame.children('ul').eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      pagesBar: $wrap.find('.pages'),
      activatePageOn: 'click',
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,
      // Buttons
      //forward: $wrap.find('.prevPage'),
      //backward: $wrap.find('.nextPage'),
      //prev: $wrap.find('.prev'),
      //next: $wrap.find('.next'),
      prevPage: $wrap.find('.prevPage'),
      nextPage: $wrap.find('.nextPage')
    });

    // To End button
    $wrap.find('.toEnd').on('click', function() {
      var item = $(this).data('item');
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toEnd', item);
    });

  });
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>