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
<?php
$article = array(
    "title" => 'ABC',
    "content" => '<h1><b><u><span style="color:rgb(56, 118, 29);font-size: 40px;">WYSIWYG</span></u></b></h1><div style="font-size:16px;">In computing, a <b><span style="font-size:16px;">WYSIWYG</span></b> editor is a system in which content (text and graphics) displayed onscreen during editing appears in a form closely corresponding to its appearance when printed or displayed as a finished product, which might be a printed document, web page, or slide presentation. <b><span style="font-size:16px;">WYSIWYG</span></b> is an acronym for "<i><b><span style="font-size:16px;">what you see is what you get</span></b></i>".</div><img src="http://jqueryte.com//img/sazova-park.jpg" style="float:left; margin:0 10px 10px 0" alt="Sazova Park, Eskisehir"><span style="font-size:16px;"><div style="font-size:16px; color: rgb(51, 51, 51);">WYSIWYG implies a user interface that allows the user to view something very similar to the end result while the document is being created. In general <b><span style="font-size:16px;">WYSIWYG</span></b> implies the ability to directly manipulate the layout of a document without having to type or remember names of layout commands The actual meaning depends on the users perspective, e.g.</div><div style="font-size:16px;">Modern software does a good job of optimizing the screen display for a particular type of output. For example, a word processor is optimized for output to a typical printer. The software often emulates the resolution of the printer in order to get as close as possible to <b><span style="font-size:16px;">WYSIWYG</span></b>. However, that is not the main attraction of <b><span style="font-size:18px;">WYSIWYG</span></b>, which is the ability of the user to be able to visualize what he or she is producing.</div><div style="font-size:16px;"><p></div><div style="font-size:16px;"></p></div><div style="font-size:16px;"><span style="font-size:14px;color: rgb(102, 102, 102);"><a href="http://en.wikipedia.org/wiki/WYSIWYG">Source: wikipedia.org</a></span></div></span>'
);
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
              <h4><?php echo html_entity_decode($article['title']); ?></h4>
            </div>
            <div class="panel panel-body">
              <div class="content">
                <?php echo html_entity_decode($article['content']); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4><?php echo "Username"; ?></h4>
            </div>
            <div class="panel panel-body" style="height: 600px">
              <div class="content">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4><?php echo Yii::app()->user->id; ?></h4>
        </div>
        <div class="panel panel-body" style="height: 400px">
          <div class="content">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-md-9 col-xs-12">
      <div id="disqus_thread"></div>
    </div>
  </div>
</section>


<script type = "text/javascript" >
  /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
  var disqus_shortname = 'hahaha'; // required: replace example with your forum shortname

  /* * * DON'T EDIT BELOW THIS LINE * * */
  (function () {
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
    $wrap.find('.toEnd').on('click', function () {
      var item = $(this).data('item');
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly('toEnd', item);
    });

  });
</script>