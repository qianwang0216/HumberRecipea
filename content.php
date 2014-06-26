<?php
    require_once 'Class_Folder/database.php';
    /*session_destroy();*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipes | PHP project - Team PHP </title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">
        
        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/content.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        
        <!--jQuery-->
        <script src="js/jquery/jquery-1.10.2.min.js"></script>
        <script src="js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
        
        <!--Scripts-->
        <script src="js/recipeaUserSide_nav.js" type="text/javascript"></script>
        <script src="js/recipeaUserSide_countrynav.js" type="text/javascript"></script>
        <script src="js/recipeaUserSide_profile.js" type="text/javascript"></script>

        <!--  Structure
            
            Header
            Navigation (sidebar)
            Search
            Content
            Footer
        -->
    </head>
    <body>
        <img src="img/gallery/dotted-line-long.png" al="dotted-line-long" class="margin-top-m3 dotted-line-l"/>

        <!--- - - - - - - - -  RECIPE NAME - - - - - - - - ---> 

        <section>
            <h1 class="invisible">Lemon Poppy Seed Scones </h1>
            <div class="margin-top-m3">
                <img src="img/home/pea.png" alt="green bubble icon" />
                <span class="uppercase text-colour-3 heading-l">Lemon Poppy Seed Scones</span>
                <img src="img/home/pea.png" alt="green bubble icon" />
            </div>

            <!--- - - - - - - - -  PROCESS SLIDER - - - - - - - - ---> 

            <section class="margin-top-m3">
                <h2 class="invisible">Process slider</h2>

                <div class="vertical-down-gradient slider-size padding-m float-left">
                    <img src="img/master/content/process-slider/left-arrow.png" alt="left-arrow" class="slider-arrow  margin-right-s" />

                    <img src="img/master/content/process-slider/slider-step-1.png" alt="slider-step-1"  class="slider-img" />
                    <img src="img/master/content/process-slider/slider-step-2.png" alt="slider-step-2"  class="slider-img" />
                    <img src="img/master/content/process-slider/slider-step-3.png" alt="slider-step-3" class="slider-img margin-right-s" />

                    <img src="img/master/content/process-slider/right-arrow.png" alt="right-arrow" class="slider-arrow" />
                </div>
<!--                <img src="img/master/content/process-slider/image-slider-background-colour.png" alt="image-slider-background-colour" />-->
                <div class="clear"></div>
            </section>

            <!--- - - - - - - - -  RECIPE DETAILS - - - - - - - - ---> 

            <section class="recipe-details margin-top-m3 border-box text-colour-2">
                <h2 class="invisible">Recipe Details</h2>

                <!--- - - - - - - - -  ABOUT - - - - - - - - ---> 
                <section class="recipe-details-panel float-left margin-right-m2">
                    <h3 class="invisible">About This Recipe</h3>

          <!--<img src="img/master/content/orange-frame-medium-top.png" alt="orange-frame-medium-top" />-->
                    <div class="recipe-details-box-top-m background-colour1">
                        <span class="uppercase heading-m text-colour1 indent1">About this recipe</span>                      
                    </div>

                    <div class="recipe-details-sub-panel">
                        <section>
                            <h4 class="invisible">About - categories</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">About - contents</h5> 
                                <div class="float-left icon1">
                                    <img src="img/master/content/icons/master-cutlery-icon.png" alt="master-cutlery-icon" />
                                </div>

                                <div class="paragraph-m float-left">
                                    <p class="uppercase heading-m margin-bottom-none">About</p>
                                    <p class="heading-m line-height-s margin-top-s">
                                        Delicious lemon and poppy seed scones, ever! Experiment to suit your own tastes as these are 
                                        very adaptable.
                                    </p>                                
                                </div>
                                <div class="clear"></div>

                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section--> 

                        <section>
                            <h4 class="invisible">Cost</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">Cost - contents</h5> 
                                <div class="float-left icon1">
                                    <img src="img/master/content/icons/master-piggy-bank-icon.png" alt="master-piggy-bank-icon" />
                                </div>

                                <div class="paragraph-m float-left">
                                    <p class="uppercase heading-m margin-bottom-none">Cost</p>
                                    <p class="heading-m line-height-s margin-top-s">
                                        $5.00 per 8 servings
                                    </p>                                
                                </div>
                                <div class="clear"></div>

                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section-->

                        <section>
                            <h4 class="invisible">Preparation time</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">Preparation time - contents</h5> 
                                <div class="float-left icon1">
                                    <img src="img/master/content/icons/master-timer-icon.png" alt="master-timer-icon" />
                                </div>

                                <div class="paragraph-m float-left">
                                    <p class="uppercase heading-m margin-bottom-none">Preparation time</p>
                                    <p class="heading-m  margin-top-s">
                                        About 30 minutes
                                    </p>                                                           
                                </div>

                                <div class="clear"></div>

                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section-->

                        <section>
                            <h4 class="invisible">Calories</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">Calories - contents</h5> 
                                <div class="float-left icon1">
                                    <img src="img/master/content/icons/master-scale-icon.png" alt="master-scale-icon" />
                                </div>

                                <div class="paragraph-m float-left">
                                    <p class="uppercase heading-m margin-bottom-none">Calories</p>
                                    <p class="heading-m  margin-top-s">
                                        435 kcal per 8 servings
                                    </p>                                                           
                                </div>

                                <div class="clear"></div>
                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section-->
                    </div> <!--/recipe-details-sub-panel-->

                    <div class="recipe-details-box-bottom-m background-colour1"></div>

                </section> <!--/About this recipe-->

                <!--<div class="red-border"><br /><br /></div>    !!! remove later -->

                <!--- - - - - - - - -  INGREDIENTS - - - - - - - - ---> 

                <section class="recipe-details-panel float-left margin-right-m2">
                    <h3 class="invisible">Ingredients</h3>

          <!--<img src="img/master/content/orange-frame-medium-top.png" alt="orange-frame-medium-top" />-->
                    <div class="recipe-details-box-top-m background-colour1">
                        <span class="uppercase heading-m text-colour1 indent1">Ingredients</span>                      
                    </div>

                    <div class="recipe-details-sub-panel">

                        <section>
                            <h4 class="invisible">Ingredients - categories</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">Ingredients - contents</h5> 

                                <div class="paragraph-m">
                                    <p class="heading-m margin-bottom-none">For the scones</p>

                                    <div class="heading-m line-height-s margin-top-s">
                                        <ul class="list-bullets">
                                            <li>2 cups all purpose flour</li> 
                                            <li>1 cup whole wheat flour</li> 
                                            <li>1/2 cup sugar, plus more to sprinkle </li>
                                            <li>3 tablespoons poppy seeds</li>
                                            <li>1 tablespoon baking powder</li>
                                            <li>1/2 teaspoon baking soda</li>
                                            <li>3 lemons, zested</li>
                                            <li>1 teaspoon salt</li>
                                            <li>1 stick of chilled unsalted butter, grated or cut into small pieces</li>
                                            <li>1 medium egg</li>
                                            <li>1/4 cup fresh lemon juice</li>
                                            <li>1/2 cup heavy cream</li>
                                        </ul>
                                    </div> <!--/list of ingredients-->   

                                </div> <!--/Ingredients - contents-->

                                <div class="clear"></div>

                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section-->

                    </div>  <!--/recipe-details-sub-panel-->    

                    <div class="recipe-details-box-bottom-m background-colour1"></div>

                </section> <!--/ingredients-->

                <!--<div class="red-border"><br /><br /></div>    !!! remove later -->

                <!--- - - - - - - - -  DIRECTIONS - - - - - - - - ---> 

                <section class="recipe-details-panel float-left margin-right-m2">
                    <h3 class="invisible">Directions</h3>

          <!--<img src="img/master/content/orange-frame-medium-top.png" alt="orange-frame-medium-top" />-->
                    <div class="recipe-details-box-top-m background-colour1">
                        <span class="uppercase heading-m text-colour1 indent1">Directions</span>                      
                    </div>

                    <div class="recipe-details-sub-panel">

                        <section>
                            <h4 class="invisible">Directions - categories</h4> 

                            <section class="recipe-detail-section-row">
                                <h5 class="invisible">Directions - contents</h5> 

                                <div class="paragraph-m heading-m margin-bottom-none">

                                    <p>1) Preheat oven to 500 degrees, and <br />
                                        position your baking rack in the top <br />
                                        third of your oven.
                                    </p>

                                    <p>2) Mix flours, sugar, poppy seeds, <br />
                                        baking powder, baking soda, lemon <br />
                                        zest, and salt in a bowl with a whisk.<br />
                                    </p>

                                    <p>3) Add grated or cut butter to mixture <br />
                                        and cut in with a pastry cutter. I <br />
                                        choose to simply use my microplane <br />
                                        that I had already used for the lemon <br />
                                        zest to grate my butter.
                                    </p>

                                    <p>4) Whisk together egg and lemon <br />
                                        juice and add to the flour mixture,<br />
                                        mixing with a wooden spoon.
                                    </p>

                                </div> <!--/Directions - contents-->

                                <div class="clear"></div>

                            </section> <!--/details section row-->

                            <div class="clear"></div>

                        </section> <!--/details section-->

                    </div> <!--/recipe-details-sub-panel-->                    

                    <div class="recipe-details-box-bottom-m background-colour1"></div>

                </section> <!--/directions-->

            </section> <!--/recipe details-->
                        
        </section> <!--/recipe-->


    </body>
</html>

