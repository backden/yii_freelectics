<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if (!Yii::app()->user->isGuest) {
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => true,
      'controller' => 'user',
      'actionName' => '',
      'width' => '40%',
      "menus" => $menus = array(
        //"Me" => array('links' => array("feed", "recent", "PB", "network"), 'menus' => array('Feed', 'Recent', 'PB', 'Network')),
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
}
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
                  <img src="<?php ?>"/>
                  <p class="list-group-item-text">
                    Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </a>
                <?php
                $i++;
              }
              ?>
            </div>
          </div>
        </div>
        <div class="row" id="first-article">
          <?php foreach ($blogs as $index => $blog) {
            ?>
            <div class="col-md-12 col-xs-12 hot-article normal-article-2x">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="" >
                    <img src="http://clip-sub.com/wp-content/uploads/2015/01/kiseijuu.jpg"/>
                  </div>
                  <a href="#" class="title-article">
                    <?php echo $blog->title; ?>
                  </a>
                  <span class="summary-article">
                    <?php echo CString::truncate($blog->content, 100); ?>
                  </span>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
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
    <?php if (isset($type)) { ?>
    <?php } else { ?>
      <?php
      $pages = new CPagination(count($blogs));
      $pages->pageSize = 10;
      $pages->setCurrentPage($page);
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
  </section>
<?php } else { ?>
  <section id="section_content">

  </section>
<?php } ?>
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

  });
</script>