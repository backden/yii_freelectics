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
    "height" => "400px",
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
    "menus" => $menus = array(
      "Training Advice" => array("id" => "training", 'links' => array('articles_training'), "menus" => array()),
      "Nutrition Advice" => array("id" => "nutrition", 'links' => array('articles_nutrition'), "menus" => array()),
      "Motivation" => array("id" => "motivation", 'links' => array('articles_motivation'), "menus" => array()),
      "Lifestyle" => array("id" => "lifestyle", 'links' => array('articles_lifestyle'), "menus" => array()),
      "Success Stories" => array("id" => "SStories", 'links' => array('blog', 'mod_written'), "menus" => array("Blog", "Mod written"))
    )
));
?>
<div class="container" style="margin-top: 45px;">
  <div class="row">
    <div class="col-md-3 col-xs-6 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "FOLLOW US"); ?></h5>
        </div>
        <div class="panel-body" id="social-share">
          <div class="row">
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-google-plus fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-pinterest fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-youtube fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
              <a>
                <span class="fa-stack fa-lg">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-tumblr fa-stack-1x"></i>
                </span>
              </a>
            </div>
            <div class="col-md-3">
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
    <div class="col-md-3 col-xs-6 top-heading-article">
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
    <div class="col-md-3 col-xs-6 top-heading-article">
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
    <div class="col-md-3 col-xs-6 top-heading-article">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 style="margin-bottom: 0px;"><?php echo Yii::t("app", "COACH"); ?></h5>
        </div>
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/Banner-neu.jpg" alt="" width="100%"/>
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
          <div class="col-md-9 col-xs-8 hot-article">
            <div class="panel panel-default">
              <div class="panel-body" style="min-height: 450px;">
                <div class="row">
                  <div class="col-md-12"">
                    <img src="https://www.freeletics.com/images/landing_page/hero.jpg" width="100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $hotArticle->id)); ?>" class="col-md-10 col-xs-10 title-article">
                    <?php echo CString::truncate($hotArticle->title, 40); ?>
                  </a>
                  <button type="button" class="btn btn-default btn-transparent btn-sm btn-shares">
                    <a class="col-md-2 col-xs-2 share-icons">
                      <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $hotArticle->like_total; ?></span>
                    </a>
                    <div class="pop-share" style="width: 40px; height: 40px; background-color: black; display: none">
                      <div class="row">
                        <div class="col-md-6">
                          <a href="https://www.facebook.com/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $hotArticle->id)); ?>&t=<?php echo $hotArticle->title; ?>"
                             target="blank">
                            <i class="fa fa-facebook"></i>
                          </a>
                        </div>
                        <div class="col-md-6">
                          <a href="https://twitter.com/share?
                             url=https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button&
                             via=twitterdev&
                             related=twitterapi%2Ctwitter&
                             hashtags=example%2Cdemo&
                             text=custom%20share%20text">
                            Tweet
                          </a>
                          <a class="" href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl('articles/articles', array("id" => $hotArticle->id)); ?>">
                            <i class="fa fa-twitter"></i>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6"><a class=""><i class="fa fa-google-plus"></i></a></div>
                        <div class="col-md-6"><a class=""><i class="fa fa-comment"></i></a></div>
                      </div>
                    </div>
                  </button>
                </div>
                <span class="summary-article">
                  <?php echo CString::truncate($hotArticle->summary, 150); ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-4 hot-article" id="list-articles-first">
            <div class="list-group">
              <?php
              foreach ($articles as $article) {
                ?>
                <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $article->id)); ?>" class="list-group-item">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <img src="data:image/png;base64,<?php $article->image_title; ?>" width="50%"/>
                    </div>
                    <div class="col-md-12">
                      <p class="list-group-item-text">
                        <?php echo CString::truncate($article->title, 150); ?>
                      </p>
                    </div>
                  </div>
                </a>
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
                  ?>
                  <div class="col-md-6 col-xs-6 hot-article normal-article-2x">
                    <div class="panel panel-default">
                      <div class="panel-body" style="min-height: 320px;">
                        <div class="row">
                          <div class="col-md-6 pull-left">
                            <img src="data:image/png;base64,<?php echo $new->image_title; ?>" width="100%"/>
                          </div>
                          <div class="col-md-6 pull-right">
                            <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $new->id)); ?>" 
                               class="title-article" style="word-break: break-all;">
                                 <?php echo CString::truncate($new->title, 70); ?>
                            </a>
                            <span class="summary-article">
                              <p><?php echo CString::truncate($new->summary, 150); ?></p>
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
<!-- Section: contact -->
<section id="section_list_more_articles" class="">
  <div class="container">
    <?php if (Yii::app()->request->getParam("c", null) == null) { ?>
      <div class="wrap">
        <div class="basic" id="frame">
          <ul>
            <?php
            $i = 0;
            while ($i < 10) {
              ?>
              <li class="active">
                <div class="image-cover image-cover-sm"></div>
              </li>
              <?php
              $i++;
            }
            ?>
          </ul>
        </div>
        <button class="prevPage page-top-right"><i class="fa fa-chevron-circle-left"></i></button>
        <button class="nextPage page-top-right"><i class="fa fa-chevron-circle-right"></i></button>
      </div>
    <?php } else { ?>
      <?php
      $this->widget('CLinkPager', array(
          'pages' => $pages,
          'nextPageLabel' => 'Next',
          'prevPageLabel' => 'Prev',
          'selectedPageCssClass' => 'active',
          'hiddenPageCssClass' => 'disabled',
          'htmlOptions' => array('class' => 'pagination pagination-sm')
      ))
      ?>
    <?php } ?>
  </div>
</section>
<!-- /Section: contact -->

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

  .popover .popover-content {
    background: rgba(0, 0, 0, 0.3);
  }

  .popover .arrow:after {
    border-bottom-color: rgba(0, 0, 0, 0.3) !important;
  }

  .pop-share a {
    border: black 1px solid;
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

  .top-heading-article .panel .panel-body {
    min-height: 150px;
  }
</style>
<script>
  $(function () {
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
    $wrap.find('.toEnd').on('click', function () {
      var item = $(this).data('item');
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toEnd', item);
    });

    $('.btn-shares').popover({
      html: true,
      content: $(".pop-share").html(),
      placement: "bottom"
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
  });

  window.fbAsyncInit = function () {
    FB.init({
      appId: 'your-app-id',
      xfbml: true,
      version: 'v2.1'
    });
  };

</script>
<div id="fb-root"></div>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=322142577992142&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>