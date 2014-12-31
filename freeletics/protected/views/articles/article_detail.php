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
                foreach ($articles as $article) {
                  ?>
                  <div class="row list-group-item">
                    <div class="col-md-12 pull-left">
                      <div class="row">
                        <div class="col-md-6">
                          <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $article->id)); ?>" class="">
                            <img src="data:image/png;base64,<?php $article->image_title; ?>" width="100%"/>
                          </a>
                        </div>
                        <div class="col-md-6 btn-shares">
                          <a class="col-md-12 col-xs-12 share-icons">
                            <i class="fa fa-star"></i>&nbsp;<span class=""><?php echo $article->like_total; ?></span>
                          </a>
<!--                          <div class="col-md-10 pop-share" style="min-width: 100px; height: 50px; background-color: black; display: none">
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
                          </div>-->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <a href="<?php echo Yii::app()->createUrl("articles/", array("id" => $article->id)); ?>" class="">
                        <p class="list-group-item-text">
                          <?php echo CString::truncate($article->title, 150); ?>
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
    </div>
    <div class="col-md-3 col-xs-12" style="margin-top: 10px;">
      <a href="#" class="">
        <img src="<?php echo Yii::app()->baseUrl; ?>/img/Coach_Teaser.jpg" width="100%"/>
      </a>
    </div>
  </div>
  <div class="container">
    <div class="col-md-9 col-xs-12">
      <div id="disqus_thread"></div>
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

  /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
  var disqus_shortname = 'hahaha'; // required: replace example with your forum shortname

  /* * * DON'T EDIT BELOW THIS LINE * * */
  (function() {
    var dsq = document.createElement('script');
    dsq.type = 'text/javascript';
    dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
  })();
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