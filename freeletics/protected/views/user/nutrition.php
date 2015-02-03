<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
  .carousel-inner .item img {
    width: 100%;
  }
  .header-smaller {
    font-size: 14px;
    margin-bottom: 10px;
    margin-top: 10px;
    text-align: left;
  }
  #personal-training-coach p {
    text-align: left;
    font-size: 10px;
  }
  @media (max-width: 680px) {
    .caption {
      left: auto !important;
    }
  }
</style>
<script>
  $(function() {
    /* custom settings */

  });
</script>
<section style="padding: 0 !important;">
  <div class="row" style="
       background: url(<?php echo Yii::app()->baseUrl ?>/img/nutrition-hero.jpg) no-repeat center center fixed; 
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover;
       height: 450px;
       width: 100%;
       ">
    <div style="width: 100%; height: 450px; position: absolute; background-color: rgba(0,0,0,0.2);"></div>
    <div class="caption" style="position: absolute;
         left: 28%;
         top: 25%;
         text-align: center;
         color: whitesmoke;">
      <h1>A LONG TERM, HAPPIER YOU.</h1>
      <h5>Learn about healthy nutrition and boost your training performance</h5>
      <a href="#nutrition_guide" class="btn btn-primary"><?php echo Yii::t("app", "Get your Nutrition Guide now"); ?></a>
    </div>
  </div>
</section>
<?php if (!Yii::app()->user->isGuest) { ?>
  <?php
  $this->renderPartial("//partials/section_menu_dynamic", array(
      'fixed' => false,
      'controller' => 'user',
      'width' => '40%',
      "menus" => $menus = array(
        "Training" => array('links' => array("training"),),
        "Nutrition" => array('links' => array("nutrition"),),
        "Community" => array('links' => array("community"),),
      )
  ));
  ?>
<?php } ?>
<div class="container" id="nutrition_guide" style="">
  <div class="row">
    <div class="col-md-7 col-md-offset-1" style="padding-right: 0; text-align: center;">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>THE NUITRITION GUIDE</h3>
          <p>Being a Free Athlete doesn't end with your workout. A clean, balanced and healthy diet is an important part of your Athlete journey. From those who want to burn fat to those who want to gain muscle, the Nutrition Guide is an educational program necessary for every Free Athlete. The Nutrition Guide is not just a one-off, it’s a set of guidelines to live your life by #NoExcuses.</p>
          <div class="clearfix" style="border-bottom: grey 1px solid; padding: 10px; margin-bottom: 10px;"></div>
          <div class="row" id="personal-training-coach">
            <div class="row" id="">
              <div class="col-md-1 col-md-offset-1 pull-left">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Yes2.png" alt=""/>
              </div>
              <div class="col-md-10 text-left">
                <h5>The basics of great nutrition within 15 weeks step by step</h5>
              </div>
            </div>
            <div class="row" id="">
              <div class="col-md-1 col-md-offset-1 pull-left">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Yes2.png" alt=""/>
              </div>
              <div class="col-md-10 text-left">
                <h5>Goal-oriented: burn fat or gain muscle</h5>
              </div>
            </div>
            <div class="row" id="">
              <div class="col-md-1 col-md-offset-1 pull-left">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Yes2.png" alt=""/>
              </div>
              <div class="col-md-10 text-left">
                <h5>Get access to new weekly healthy and delicious recipes</h5>
              </div>
            </div>
            <div class="row" id="">
              <div class="col-md-1 col-md-offset-1 pull-left">
                <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Yes2.png" alt=""/>
              </div>
              <div class="col-md-10 text-left">
                <h5>Boost your training performance!</h5>
              </div>
            </div>
            <div class="clearfix" style="border-bottom: grey 1px solid; padding: 10px; margin-bottom: 10px;"></div>
            <div class="col-md-6" style="">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Gas.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    No calorie counting
                  </h6>
                  <p>
                    This is not a 15 week diet plan,
                    this is a set of nutrition guidelines and insights that you can follow for the rest of your life. Simple, easy golden rules for a healthy and balanced life, without any calorie counting or complicated diet rules.
                  </p>
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Up.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    Boost your performance</h6>
                  <p>
                    The nutrition guide has been designed with your Freeletics Training program in mind. All the recipes and meals are ideal for the high intensity bodyweight only excercises. Being a Free Athlete doesn’t end with your workout, it starts with your nutrition.
                  </p>
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Star.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    Work towards your athletic goals</h6>
                  <p>
                    You can choose between a “gain muscle” and a “burn fat” Nutrition Guide in order to reach your own specific goals. With a lower carbohydrate plan for those who want to burn fat and a higher protein plan for those who want to gain muscle, the Nutrition Guide is the best way to get results.                      </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pull-right">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Yes.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    Great, simple recipes every week
                  </h6>
                  <p>
                    You will receive around 5 new recipes every week so that you can learn the value of great nutrition. You won’t ever run out of ideas or inspiration with this guide. Enjoy unlimited access to the recipes and guidelines so that you can continue to lead a healthy and athletic life.                      </p>
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Carrot.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    Fast and easy
                  </h6>
                  <p>
                    Don’t know how to cook? Terrible in the kitchen? It doesn’t matter. The Nutrition Guide recipes have been made so easy to follow that anyone can do it. Using simple ingredients that you can find in your local supermarket, the recipes never take longer than 30 minutes to prepare.                      </p>
                  <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Thunder.png" alt=""/>
                  </div>
                  <h6 class="header-smaller">
                    Healthy food that just tastes good
                  </h6>
                  <p>
                    Delicious meals that mean you don’t have to miss out on anything you love. Eating clean doesn’t have to taste bad, in fact it tastes even better than fatty processed foods. You won’t go hungry and you won’t be disappointed.                      </p>

                </div>

              </div>
            </div>
            <div class="col-md-12">
              <img src="<?php echo Yii::app()->baseUrl ?>/img/example-recipe-bg.jpg" width="100%"/>
              <a href="" class="btn btn-default" data-toggle="modal" data-target="#recipeModal" style="
                 background-color: rgba(255, 255, 255, 0);
                 color: white;
                 position: absolute;
                 top: 45%;
                 left: 35%;
                 ">
                   <?php echo Yii::t("app", "See an example recipe"); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/nutrition/1.jpg" width="100%"/>
          <h3>
            FITS IN WITH YOUR BUSY LIFESTYLE
          </h3>
          <p>
            The Nutrition Guide has been designed that no matter how busy you are, you can still follow a healthy and nutritious diet. No need to run to the shops for fresh ingredients everyday. No need to grab fast food in your lunch break at work. All the meals can be quickly and easily made in advance so that you can eat well, no matter where you are or what you are doing. #NoExcuses.              </p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/nutrition/2.jpg" width="100%"/>
          <h3>
            A HAPPIER YOU
          </h3>
          <p>
            Delicious meals that are made so that you never feel hungry, so that you never get bored and so that you really enjoy your food. Love your body, love food. The Nutrition Guide helps you develop a lifestyle that you can follow for the rest of your life. With unlimited access to the guidelines and recipes, this is a long-term project to a better, healthier, happier you.              </p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/nutrition/3.jpg" width="100%"/>
          <h3>
            EASY TO FOLLOW
          </h3>
          <p>
            All the guidelines and recipes are very easy to follow. No need to remember complicated rules, the nutritional value of certain foods or the calories in every meal. Simple to cook and easy to incorporate the golden rules into your everyday life, the Nutrition Guide is a basic re-education of the fundamentals of nutrition, not a complicated new diet. Get the inspiration you need to create your own recipes!              
          </p>
          <div class="collapse" id="collapseCoach">
            <div class="clearfix" style="border-bottom: grey 1px solid;"></div>
            <div class="row" id="personal-training-coach">
              <div class="col-md-6" style="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Personal fitness test
                    </h6>
                    <p>
                      Objective assessment of your initial level of fitness. Fitness test depending on your prior sports experience and frequency. Get started with the perfect training plan.
                    </p>
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Partial workouts
                    </h6>
                    <p>
                      Only get workouts that you can do. Depending on your fitness test performance, the Coach might let you start with 1/5 Aphrodite and advance you towards the full workout.
                    </p>
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Set limitations
                    </h6>
                    <p>
                      Avoid injuries due to overtraining by significantly reducing the training volume on severely stressed muscles of your body.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pull-right">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Advanced skills
                    </h6>
                    <p>
                      Set your skills of complex movements like Pullups, Pistols and Muscle Ups. Only get trainings from the Coach once you master their technique.
                    </p>
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Set the number of training days
                    </h6>
                    <p>
                      You can vary the number of weekly training days between 2 and 5. Perfect to combine Freeletics with other sports or to set training peaks before a period with time constraints.
                    </p>
                    <div class="col-md-3">
                      <img src="<?php echo Yii::app()->baseUrl; ?>/img/36/Aim.png" alt=""/>
                    </div>
                    <h6 class="header-smaller">
                      Feedback your Coach
                    </h6>
                    <p>
                      You can tell your Coach if the week was just right, too hard or too easy. The Coach will adapt. Take on challenge!
                    </p>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/img/nutrition/chicken.jpg"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/nutrition/4.jpg" width="100%"/>
          <h3>
            BOOST YOUR PERFORMANCE
          </h3>
          <p>
            By following a balanced and training orientated dietary plan, you will boost your Freeletics Training Performance. Choose BURN FAT if you want to loose weight, improve muscle definition and get fitter. Choose GAIN MUSCLE if you want to to build lean muscle and boost your training performance.              </p>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-body">
          <h3>
            ANSWERS ABOUT THE NUTRITION GUIDE
          </h3>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    How does the 14-day money back guarantee work?
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  If the Nutrition Guide does not convince you, you can easily return it within 14 days of your purchase without stating any reason. Just turn to our customer support and we will refund your payment in full.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Is the Nutrition Guide suitable for vegetarians or vegans?
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  With over half the recipes perfect for vegetarians, the Nutrition Guide is suitable for vegetarians and meat-eaters alike. Moreover, recipes including meat or fish can always be replaced with tofu, dairy products or eggs. However, it may be difficult for vegans to follow the Nutrition Guide.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Do I receive daily instructions?
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  You won't receive a daily meal plan. Our Nutrition Guide should help you to re-define your awareness of the value of nutrition. This is not a 15 week diet but a permanent change in lifestyle. You should think about what you are going to eat and why. You will receive 5-6 new recipes every week that cover breakfast, lunch, dinner, snacks and drinks that you can follow as you please. What’s more, you will also receive many educational insights into what it means to eat well.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                    What happens after the first 15 weeks?
                  </a>
                </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">
                  You will still have full and unlimited access to your Nutrition Guide after 15 weeks. You will receive new recipes every week for the first 15 weeks and then get to keep these recipes as well as all the nutritional guidelines for as long as you like.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                    Can I make a lunch recipe for dinner and vice versa?
                  </a>
                </h4>
              </div>
              <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                <div class="panel-body">
                  The meals help you to integrate the golden rules into your daily life. It doesn’t matter if you choose to eat a lunch meal for dinner. It is up to you when you eat these meals but they are designed so that you will not be hungry.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapseThree">
                    Does the Nutrition Guide include nutritional values?
                  </a>
                </h4>
              </div>
              <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                <div class="panel-body">
                  The Nutrition Guide does not contain nutritional values. It’s important to understand which foods are healthy and which are unhealthy. You need long-term nutrition guidelines that you can easily follow. This guide is designed as a permanent lifestyle choice and analyzing nutritional values can be intimidating and complicated.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                    Do I have to use the Nutrition Guide with the Training Coach?
                  </a>
                </h4>
              </div>
              <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                <div class="panel-body">
                  No. The Nutritional Guide is a way to re-educate you in the the best way to lead a healthy lifestyle. This is regardless of whether you have the Training Coach or not. However, if you want to truly unleash your potential, the Training Coach used in conjunction with the Nutrition Guide, is the best way to double your progress.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapseThree">
                    If I am following a cardio training program with the Training Coach, which is the best nutrition guide for me?
                  </a>
                </h4>
              </div>
              <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                <div class="panel-body">
                  If your goal is to burn fat, then the ideal training program would be a Cardio or Cardio & Strength Training Coach along with a burn fat Nutrition Guide. If your goal is to gain muscle, then the ideal training program would be a Strength or Cardio & Strength Training Coach along with a gain muscle Nutrition Guide. However, it is completely up to you.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <?php
      $this->renderPartial("//partials/payment", array(
          'costs' => explode(";", $dataPayment['costArr']),
          'times' => explode(";", $dataPayment['$costTimes']),
          'unit' => $dataPayment['$unit'],
          'typePage' => $typePage
      ));
      ?>
    </div>
  </div>
</div>
<style>
  #recipeModal p {
    font-size: 12px;
  }
</style>
<div class="modal fade" id="recipeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-left: auto;
       margin-right: auto;
       width: 60%;">
    <div class="modal-content" >
      <div class="modal-body" style="padding-top: 0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="row">
          <img src="<?php echo Yii::app()->baseUrl; ?>/img/example-recipe.jpg" width="100%" />
        </div>
        <div class="row">
          <div class="clearfix" style="margin-bottom: 20px;"></div>
          <div class="col-md-5">
            <h6>Ingredients per serving</h6>
            <p>250g (8.8 oz.) turkey or chicken breast</p>
            <p>1 bell pepper</p>
            <p>2 carrots</p>
            <p>1 onion</p>
            <p>30g (1 oz.) parmesan cheese</p>
            <p>1 lemon</p>
            <p>1 tablespoon herbs, e.g. thyme, rosemary, oregano (fresh or dried)</p>
            <p>2 teaspoons rapeseed or olive oil
              pepper</p>
          </div>
          <div class="col-md-7">
            <h2>LEMON HERB CHICKEN</h2>
            <p>Parmesan cheese contains a relatively high percentage of salt, which is why no additional salt is required in this dish. The juice which comes out of the lemon while baking, activates the stomach and bowel function. This helps stimulating your metabolism.</p>

            <b>Preparation</b>
            <p>1. Preheat oven to 200°C (390°F, no circulating air).</p>
            <p>2. Grease an oven dish with 1 teaspoon oil.</p>
            <p>3. Wash turkey or chicken breast, pat dry, season with pepper.</p>
            <p>4. Wash bell pepper, pat dry, core, cut into slices.</p>
            <p>5. Peel carrots and cut into medium sized pieces.</p>
            <p>6. Skin onion, cut into pieces.</p>
            <p>7. Grate parmesan cheese.</p>
            <p>8. Put half of the vegetables into the oven dish, put meat on top and cover with the rest of the vegetables, sprinkle with herbs and parmesan.</p>
            <p>9. Cut lemon into slices, cover vegetables and drizzle with 1 teaspoon of olive oil.</p>
            <p>10. Put dish in the oven, let bake for about 30 minutes on middle rack.</p>
            <p>11. Afterwards, remove lemon slices. Serve meat and vegetables with gravy from the oven dish.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>