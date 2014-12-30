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
      "Training Advice" => array(),
      "Nutrition Advice" => array(),
      "Motivation" => array(),
      "Lifestyle" => array(),
      "Success Stories" => array("id" => "SStories", "menus" => array("Blog", "Mod written"))
    )
));
?>
<?php if (!isset($type)) { ?>
  <section id="section_content">
    <div class="container">
      <div class="col-md-9 col-xs-12">
        <div class="row" id="first-article-top">
          <div class="col-md-9 col-xs-8 hot-article">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="image-cover" ></div>
                <a href="#" class="title-article">
                  Bầu Đức: ‘Chưa nên cho lứa U19 đá SEA Games 2015’
                </a>
                <span class="summary-article">
                  Khoảnh khắc phóng tên lửa vũ trụ, hiện tượng siêu trăng hay robot hạ cánh xuống sao chổi là những điểm nhấn của khoa học vũ trụ thế giới năm 2014.
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-4 hot-article" id="list-articles-first">
            <div class="list-group">
              <?php
              $i = 0;
              while ($i < 4) {
                ?>
                <a href="#" class="list-group-item">
                  <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </a>
                <?php
                $i++;
              }
              ?>
            </div>
          </div>
        </div>
        <div class="row" id="first-article">
          <?php
          $i = 0;
          while ($i < 4) {
            ?>
            <div class="col-md-6 col-xs-6 hot-article normal-article-2x">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="image-cover" ></div>
                  <a href="#" class="title-article">
                    Bầu Đức: ‘Chưa nên cho lứa U19 đá SEA Games 2015’
                  </a>
                  <span class="summary-article">
                    Khoảnh khắc phóng tên lửa vũ trụ, hiện tượng siêu trăng hay robot hạ cánh xuống sao chổi là những điểm nhấn của khoa học vũ trụ thế giới năm 2014.
                  </span>
                </div>
              </div>
            </div>
            <?php
            $i++;
          }
          ?>
          <!--        <div class="col-md-6 normal-article" id="list-articles-second">
                    <div class="list-group">
          <?php
          $i = 0;
          while ($i < 3) {
            ?>
                                              <a href="#" class="list-group-item">
                                                <img src="http://placehold.it/100x100" align="left"/>
                                                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                              </a>
            <?php
            $i++;
          }
          ?>
                    </div>
                  </div>-->
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body" style="min-height: 500px">
            Basic panel
          </div>
        </div>
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
<?php if (isset($type)) { ?>
      <div class="wrap">
        <div class="basic" id="frame">
          <ul>
            <?php
            $i = 0;
            while ($i < 10) {
              ?>
              <li>
                <div class="box box-solid box-success box-new-freeletics" style="">
                  <div class="box-header">
                    <h3 class="box-title">Primary Solid Box <?php echo $i; ?></h3>
                    <div class="box-tools pull-right">
                    </div>
                  </div>
                  <div class="box-body">
                    <p>Box class: <code>.box.box-solid.box-primary</code>
                      amber, microbrewery abbey hydrometer, brewpub ale lauter tun saccharification oxidized barrel.
                      berliner weisse wort chiller adjunct hydrometer alcohol aau!
                      sour/acidic sour/acidic chocolate malt ipa ipa hydrometer.
                    </p>
                  </div><!-- /.box-body -->
                </div>
              </li>
              <?php
              $i++;
            }
            ?>
          </ul>
        </div>
        <button class="prevPage"><i class="fa fa-chevron-circle-left"></i></button>
        <button class="nextPage"><i class="fa fa-chevron-circle-right"></i></button>
      </div>
    <?php } else { ?>
      <?php
      $pages = new CPagination(30);
      $pages->pageSize = 10;
      $pages->setCurrentPage(2);
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

  });
</script>