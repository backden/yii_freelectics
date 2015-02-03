<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->renderPartial("//partials/scroll_dots", array(
    "sections" => array("intro", "section_menu", "section_content", "section_list_more_articles")
));
?>

<?php
echo $this->renderPartial("//partials/section_intro_articles", array(
    "width" => "auto",
    "height" => "300px",
    "fixed" => false,
    "data" => array(
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD.", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => 'Caption2', "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link"),
        array("caption" => "THE SHAPE OF YOUR LIFE. PERIOD. 2", "img" => "https://www.freeletics.com/images/landing_page/hero.jpg", "href" => "anchor link")
    ),
    'type' => ''
));
?>
<?php
$this->renderPartial("//partials/section_menu_dynamic", array(
    'controller' => 'articles',
    "menus" => $menus = array(
      "Training Advice" => array("id" => "training", 'links' => array('?c=articles_training'), "menus" => array()),
      "Nutrition Advice" => array("id" => "nutrition", 'links' => array('?c=articles_nutrition'), "menus" => array()),
      "Motivation" => array("id" => "motivation", 'links' => array('?c=articles_motivation'), "menus" => array()),
      "Lifestyle" => array("id" => "lifestyle", 'links' => array('?c=articles_lifestyle'), "menus" => array()),
      "Success Stories" => array("id" => "SStories", 'links' => array('?c=blog', '?c=mod_written'), "menus" => array("Blog", "Mod written"))
    )
));
?>

<?php
$_articles = array();
?>
<div class="container" style="margin-top: 45px;">
  <div class="row">
    <div class="col-md-3 col-xs-12 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "FOLLOW US"); ?></h5>
        </div>
        <div class="panel-body" id="social-share">
          <div class="row">
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-google-plus fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-pinterest fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-youtube fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-tumblr fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3 col-xs-4">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-vimeo-square fa-stack-1x"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-12 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "LIKE THIS?"); ?></h5>
        </div>
        <div class="panel-body">
          <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" 
               data-colorscheme="light" data-show-faces="false" 
               data-header="true" data-stream="false" 
               data-show-border="false">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-12 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "YOUTUBE CHANNEL"); ?></h5>
        </div>
        <div class="panel-body">
          <h7><a href="https://www.youtube.com/user/Freeletics/"><?php echo Yii::t("app", "Discover our YouTube Channel"); ?></a></h7>
          <div class="row">
            <div class="col-md-6" style="padding-left: 5px;">
              <img class="youtube" rel="i8AvD8LqibU" src="http://img.youtube.com/vi/i8AvD8LqibU/1.jpg" />
            </div>
            <div class="col-md-6" style="padding-left: 5px;">
              <img class="youtube" rel="uGMwBfk7XEk" src="http://img.youtube.com/vi/uGMwBfk7XEk/1.jpg" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-12 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "COACH"); ?></h5>
        </div>
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/Banner-neu.jpg" alt="" width="100%" height="100px"/>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if (!isset($type)) { ?>
  <section id="section_content">
    <div class="container">
      <div class="col-md-9 col-xs-12">
        <div class="row" id="first-article-top">
          <div class="col-md-9 col-xs-12 hot-article">
            <div class="panel panel-default">
              <div class="panel-body" style="min-height: 450px;">
                <div class="row">
                  <div class="col-md-12"">
                    <img src="data:image/png;base64,<?php echo $hotArticle->image_title; ?>" width="100%" height="310px"/>
                  </div>
                  <div class="clearfix"></div>
                  <a href="<?php echo Yii::app()->createUrl("articles/", array("article" => $hotArticle->id)) . "?c=$c->name"; ?>" class="col-md-10 col-xs-10 title-article">
                    <?php
                    echo CString::truncate($hotArticle->title, 70);
                    $_articles[] = Yii::app()->createUrl("articles/", array("article" => $hotArticle->id)) . "?c=$c->name";
                    ?>
                  </a>
                  <div class="col-md-2 btn-shares">
                    <a class="col-md-12 col-xs-12 share-icons">
                      <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $hotArticle->like_total; ?></span>
                    </a>
                    <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
                      <div class="row">
                        <div class="col-md-6">
                          <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $hotArticle->id)) . "?c=$c->name"; ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                          <span class="article_FB_<?php echo $hotArticle->id; ?>">0</span>
                        </div>
                        <div class="col-md-6">
                          <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $hotArticle->id)) . "?c=$c->name" ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
                          <span class="article_TW_<?php echo $hotArticle->id; ?>">0</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $hotArticle->id)) . "?c=$c->name"; ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
                          <span class="article_GP_<?php echo $hotArticle->id; ?>">0</span>
                        </div>
                        <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="summary-article">
                  <?php echo CString::truncate($hotArticle->summary, 150); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 hot-article" id="list-articles-first">
            <div class="list-group">
              <?php
              foreach ($articles as $article) {
                $_articles[] = Yii::app()->createUrl("articles/", array("article" => $article->id)) . "?c=$c->name";
                ?>
                <div class="row list-group-item">
                  <div class="col-md-12 pull-left">
                    <div class="">
                      <div class="col-md-6 hidden">
                        <a href="<?php echo Yii::app()->createUrl("articles/", array("article" => $article->id)) . "?c=$c->name"; ?>" class="">
                          <img src="data:image/png;base64,<?php $article->image_title; ?>" width="100%"/>
                        </a>
                      </div>
                      <a href="<?php echo Yii::app()->createUrl("articles/", array("article" => $article->id)) . "?c=$c->name"; ?>" class="text-title">
                        <?php echo ($article->title); ?>
                      </a>
                      <div class="btn-shares hidden" style="display: inline-block; float: right;">
                        <a class="col-md-12 col-xs-12 share-icons">
                          <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $article->like_total; ?></span>
                        </a>
                        <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
                          <div class="row">
                            <div class="col-md-6">
                              <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("articles" => $article->id)) . "?c=$c->name"; ?>&t=<?php echo $article->title; ?>"
                                 target="blank">
                                <i class="fa fa-facebook"></i>
                              </a>
                              <span class="article_FB_<?php echo $article->id; ?>">0</span>
                            </div>
                            <div class="col-md-6">
                              <a class="" href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("articles" => $article->id)) . "?c=$c->name"; ?>">
                                <i class="fa fa-twitter"></i>
                              </a>
                              <span class="article_TW_<?php echo $article->id; ?>">0</span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("articles" => $article->id)) . "?c=$c->name"; ?>" class="">
                                <i class="fa fa-google-plus"></i>
                              </a>
                              <span class="article_GP_<?php echo $article->id; ?>">0</span>
                            </div>
                            <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="">

                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="row" id="first-article">
          <?php
          foreach ($others as $other => $art) {
            if (isset($art)) {
              foreach ($art as $new) {
                if (isset($new)) {
                  $_articles[] = Yii::app()->createUrl("articles/", array("article" => $new->id)) . "?c=$c->name";
                  ?>
                  <div class="col-md-6 col-xs-6 hot-article normal-article-2x">
                    <div class="panel panel-default">
                      <div class="panel-body" style="min-height: 120px;">
                        <div class="row">
                          <div class="col-md-5 pull-left" style="padding: 0; padding-left: 10px;">
                            <img src="data:image/png;base64,<?php echo $new->image_title; ?>" width="100%"/>
                          </div>
                          <div class="col-md-7 pull-right">
                            <a href="<?php echo Yii::app()->createUrl("articles", array("article" => $new->id)) . "?c=$c->name"; ?>" 
                               class="" style="">
                                 <?php echo CString::truncate($new->title, 70); ?>
                            </a>

                            <div class="btn-shares" style="display: inline; float: right;">
                              <a class="col-md-12 col-xs-12 share-icons">
                                <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $article->like_total; ?></span>
                              </a>
                              <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $new->id)) . "?c=$c->name"; ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                                    <span class="article_FB_<?php echo $new->id; ?>">0</span>
                                  </div>
                                  <div class="col-md-6">
                                    <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $new->id)) . "?c=$c->name"; ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
                                    <span class="article_TW_<?php echo $new->id; ?>">0</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="https://plus.google.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/', array("article" => $new->id)) . "?c=$c->name"; ?>" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
                                    <span class="article_GP_<?php echo $new->id; ?>">0</span>
                                  </div>
                                  <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                                </div>
                              </div>
                            </div>

                            <span class="summary-article">
                              <p><?php echo CString::truncate($new->summary, 100); ?></p>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
            }
            ?>
            <div class = "clearfix"></div>
          <?php } ?>
        </div>
        <?php if (Yii::app()->request->getParam("c", null) !== null) { ?>
          <div class="row">
            <div class="col-md-12 col-xs-12 text-center">
              <?php
              $this->widget('CLinkPager', array(
                  'pages' => $pages,
                  'header' => '',
                  'nextPageLabel' => 'Next',
                  'prevPageLabel' => 'Prev',
                  'selectedPageCssClass' => 'active',
                  'hiddenPageCssClass' => 'disabled',
                  'htmlOptions' => array('class' => 'pagination pagination-sm')
              ));
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-md-3 col-xs-12" style="margin-top: 10px;">
        <a href="#" class="">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/Coach_Teaser.jpg" width="100%"/>
        </a>
      </div>
    </div>
  </section>
<?php } else { ?>
  <section id="section_content">

  </section>
<?php } ?>
<?php if (Yii::app()->request->getParam("c", null) == null) { ?>
  <section id="section_list_more_articles" class="">
    <div class="container">

      <div class="wrap">
        <div class="basic" id="frame">
          <ul>
            <?php
            foreach ($article_category as $article) {
              ?>
              <li>
                <div>
                  <img src="data:image/png;base64,<?php echo $article->image_title; ?>" width="100%"/>
                  <div class="" style="min-height: 45px;">
                    <a href="<?php echo Yii::app()->createUrl("articles/", array("article" => $article->id)) . "?c=$c->name"; ?>">
                      <?php echo CString::truncate($article->title, 70); ?>
                    </a>
                  </div>
                </div>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
        <button class="prevPage page-top-right"><i class="fa fa-chevron-circle-left"></i></button>
        <button class="nextPage page-top-right"><i class="fa fa-chevron-circle-right"></i></button>
      </div>
  </section>
<?php } ?>

<style>
  #section_content {
    padding-top: 0px;
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

  #frame ul {
    list-style: none;
  }

  #section_list_more_articles {
    background-color: transparent !important;
    padding: 0;
  }

  #section_list_more_articles .container {
    padding: 0;
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
    min-height: 60px !important;
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

  .btn-socials {
    padding: 5px 15px;
    font-size: 18px;
  }

  .btn-shares {
    /*min-height: 60px;*/
    max-height: 20px;
  }

  .top-heading-article .panel .panel-body {
    min-height: 150px;
  }

  #first-article a.title-article {
    font-size: 14px;
    max-width: 150px;
    display: inline-block;
    float: left;
  }

  #first-article p {
    font-size: 14px;
  }
  
  .text-title {
    font-size: 12px;
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
      startAt: 3,
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

    var btnPop = undefined;
    var isPop = false;
    $('.btn-shares, .share-icons').popover({
      html: true,
      content: function() {
        return $(this).find(".pop-share").html();
      },
      placement: "bottom",
      container: 'body',
      trigger: "click"
    }).on("show.bs.popover", function() {
      if (this !== btnPop) {
        $(btnPop).popover("hide");
        btnPop = this;
      }
    }).mouseenter(function() {
      $(this).popover("show");
      $(".popover-content").mouseenter(function() {
        isPop = true;
      }).mouseleave(function(e) {
        isPop = false;
        $(btnPop).popover('hide');
      });
    });
    $(".share-icons").mouseleave(function(e) {
      setTimeout(function() {
        if (!isPop) {
          $(btnPop).popover('hide');
        }
      }, 100);
    });

    $(".youtube").YouTubeModal({
      'youtubeId': '',
      'title': '',
      'useYouTubeTitle': false,
      'idAttribute': 'rel',
      'cssClass': '',
      'draggable': false,
      'modal': true,
      'width': 640,
      'height': 480,
      'hideTitleBar': true,
      'clickOutsideClose': false,
      'overlayOpacity': 0.5,
      'autohide': 2,
      'autoplay': 1,
      'color': 'red',
      'color1': 'FFFFFF',
      'color2': 'FFFFFF',
      'controls': 1,
      'fullscreen': 1,
      'loop': 0,
      'hd': 1,
      'showinfo': 1,
      'theme': 'light',
      'showBorder': true
    });

    $("#YouTubeModalContent").find(".modal-header").remove();

//    $.get(
//            'http://graph.facebook.com/?id=<?php echo Yii::app()->createAbsoluteUrl('articles', array("article" => $hotArticle->id)); ?>',
//            function(data) {
//              console.log(data);
//              if (undefined !== data.shares) {
//                  $(this).text(data.shares);
////                $("span.article_FB_<?php echo $hotArticle->id; ?>").each(function() {
////                });
//              }
//            },
//            'json'
//            );
//
//    $.ajax({
//      type: "POST",
//      dataType: 'jsonp',
//      url: 'http://urls.api.twitter.com/1/urls/count.json?url=<?php echo Yii::app()->createAbsoluteUrl('articles', array("article" => $hotArticle->id)); ?>',
//      success: function(data) {
//        console.log(data);
//        if (undefined !== data.count) {
//            $(this).text(data.count);
////          $("span.article_TW_<?php echo $hotArticle->id; ?>").each(function() {
////          });
//        }
//      }
//    });
//    $.ajax({
//      cache: false,
//      type: "POST",
//      url: "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ",
//      data: [{"method": "pos.plusones.get", "id": "p", "params": {"nolog": true, "id": "<?php echo Yii::app()->createAbsoluteUrl('articles', array("article" => $hotArticle->id)); ?>", "source": "widget", "userId": "@viewer", "groupId": "@self"}, "jsonrpc": "2.0", "key": "p", "apiVersion": "v1"}],
//      dataType: "jsonp",
//      success: function(data) {
//        console.log(data);
//      },
//      error: function(data) {
//        console.log(data);
//      }
//    });
//    $.ajax({
//      type: "POST",
//      dataType: 'jsonp',
//      url: 'https://plusone.google.com/_/+1/fastbutton?url=<?php echo Yii::app()->createAbsoluteUrl('articles', array("article" => $hotArticle->id)); ?>',
//      success: function(data) {
//        console.log(data);
//        if (undefined !== data.count) {
//          $(this).text(data.count);
////          $("span.article_GP_<?php echo $hotArticle->id; ?>").each(function() {
////          });
//        }
//      }
//    });
<?php foreach ($_articles as $article) { ?>
      //            $.get(
      //                    'http://graph.facebook.com/?id=http://freeletice.com<?php echo $article; ?>',
      //                    function(data) {
      //                      console.log(data);
      //                      if (undefined !== data.shares) {
      //                          $(this).text(data.shares);
      ////                        $("span.article_FB_<?php echo $article; ?>").each(function() {
      ////                        });
      //                      }
      //                    },
      //                    'json'
      //                    );
      //            $.ajax({
      //              type: "POST",
      //              dataType: 'jsonp',
      //              url: 'http://urls.api.twitter.com/1/urls/count.json?url=http://freeletice.com<?php echo $article; ?>',
      //              success: function(data) {
      //                console.log(data);
      //                if (undefined !== data.count) {
      //                    $(this).text(data.count);
      ////                  $("span.article_TW_<?php echo $article; ?>").each(function() {
      ////                  });
      //                }
      //              }
      //            });
      //            $.ajax({
      //              cache: false,
      //              type: "POST",
      //              url: "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ",
      //              data: [{"method": "pos.plusones.get", "id": "p", "params": {"nolog": true, "id": "http://freeletice.com<?php echo $article; ?>", "source": "widget", "userId": "@viewer", "groupId": "@self"}, "jsonrpc": "2.0", "key": "p", "apiVersion": "v1"}],
      //              dataType: "jsonp",
      //              success: function(data) {
      //                console.log(data);
      //              },
      //              error: function(data) {
      //                console.log(data);
      //              }
      //            });
      //            $.ajax({
      //              type: "GET",
      //              dataType: 'jsonp',
      //              url: 'https://plusone.google.com/_/+1/fastbutton?url=http://freeletice.com<?php echo $article; ?>',
      //              success: function(data) {
      //                console.log(data);
      //                if (undefined !== data.count) {
      //                    $(this).text(data.count);
      ////                  $("span.article_GP_<?php echo $article; ?>").each(function() {
      ////                  });
      //                }
      //              }
      //            });
  <?php $url = 'http://freeletice.com' . $article; ?>
      console.log('TW <?php echo getFacebooks($url); ?>');
      console.log('FB <?php echo getFacebooks($url); ?>');
      console.log('+1 <?php echo get_plusones($url); ?>');
<?php } ?>
  });

//  window.fbAsyncInit = function() {
//    FB.init({
//      appId: 'your-app-id',
//      xfbml: true,
//      version: 'v2.1'
//    });
//  };
<?php

function getTweets($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://urls.api.twitter.com/1/urls/count.json?url=" . urlencode($url));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  $curl_results = curl_exec($curl);
  curl_close($curl);
  $ajsn = json_decode($curl_results, true);
  $cont = $ajsn['count'];
  return $cont;
}

function get_plusones($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  $curl_results = curl_exec($curl);
  curl_close($curl);
  $json = json_decode($curl_results, true);
  return intval($json[0]['result']['metadata']['globalCounts']['count']);
}

function getFacebooks($url) {
  $xml = file_get_contents("http://api.facebook.com/restserver.php?method=links.getStats&urls=" . urlencode($url));
  $xml = simplexml_load_string($xml);
  $shares = $xml->link_stat->share_count;
  $likes = $xml->link_stat->like_count;
  $comments = $xml->link_stat->comment_count;
  return $likes + $shares + $comments;
}
?>
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=322142577992142&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<script>
  $(function() {
<?php foreach ($_articles as $article) { ?>
      //      addthis.sharecounters.getShareCounts({service: ['facebook'], countUrl: 'http://freeletice.com<?php echo $article; ?>'}, function(obj) {
      //        showCount(obj);
      //      });
<?php } ?>
  });

  function showCount(obj) {
    $(obj).each(function() {
      console.log(this);
    });
  }
</script>