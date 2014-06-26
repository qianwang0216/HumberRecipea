<?php
// arrays

$ingredients = array("Ingredient", "beef", "pork", "chicken", "fish", "egg");
$styles = array("Style", "Italian", "French", "Asian");
$countries = array("Country", "Canada", "United States", "China", "India");
$menus = array("Menu", "recipe1", "recipe2", "recipe3");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Recipes | PHP project - Team PHP</title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">
        <link rel="stylesheet" href="css/search-1.0.0.css" />

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles-1-8.css" rel="stylesheet" />
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>     
        <div>

            <!--            The search modules (search recipes and country food dictionary are different sizes on the public homepage and the
                        master page. On the public home page they have a size ratio of 3:2, while the ratio is 1:1 (search recipes : country food
                        dictionary). Also, the public homepage has an additional stylesheet (search-public-1.0.0.css) that the master page does
                        not use. Hopefully, the ratios will apply for each page.-->

            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <section>
                        <h1 class="invisible">Search recipes</h1>


                        <div class="vertical-down-gradient padding-m">


                            <span class="uppercase heading-ml text-colour1 float-left">Search recipes!</span>

                            <img src="img/search/cutlery-icon.png" alt="cutlery icon" class="float-left search-field-icon1" />  

                            <div class="clear"></div>

                            <img src="img/page-wide/dotted-line-m.png" alt="dotted line" class="col-md-12 col-sm-12 col-xs-12" />

                            <div class="col-md-4">        
                                <img src="img/search/magnifying-glass-icon.png" alt="magnifying-glass-icon" class="float-left" />
                                
                                <input type="text" name="search-keyword" id="search-keyword" placeholder="keyword" class="col-md-10" />       
                                                                
                            </div>

                            <div class="col-md-4">
                                <img src="img/search/magnifying-glass-plus-icon.png" alt="magnifying-glass-plus-icon" class="float-left" />

                                <select name="search-ingredient" id="search-ingredient" class="col-md-10 ">
                                    <?php
                                    for ($i = 0; $i < count($ingredients); $i++) {
                                        echo "<option value='$ingredients[$i]'>$ingredients[$i]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <img src='img/search/magnifying-glass-plus-icon.png' alt='magnifying-glass-plus-icon' class="float-left" />

                                <select name='search-style' id='search-style' class='col-md-10'>
                                    <?php
                                    for ($i = 0; $i < count($styles); $i++) {
                                        echo "<option value='$styles[$i]'>$styles[$i]</option>";
                                    }
                                    ?>
                                </select>

                                <input type='image' name='search-recipes' id='search-recipes' value='Submit' src="img/search/btn-search.png" alt="search button"
                                       class="float-right margin-top-m" />
                            </div>

                            <div class="clear"></div>

                        </div>

                <!--            <img src="img/search/search-recipes-background-colour.png" alt="search-recipes-background-colour" />-->

                        <div class="clear"></div>

                    </section> <!-- /search-module (search recipes)-->
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <section>
                        <h1 class="invisible">Country food dictionary</h1>

                        <div class="vertical-down-gradient padding-m">


                            <span class="uppercase heading-ml text-colour1">Country Food Dictionary</span>

                            <img src="img/search/dictionary-icon.png" alt="dictionary icon" class="" />

                            <div class="clear"></div>

                            <img src="img/page-wide/dotted-line-m.png" alt="dotted line" class="col-md-12 col-sm-12 col-xs-12" />

                            <div class="col-md-6">
                                <img src="img/search/magnifying-glass-icon.png" alt="magnifying-glass-icon" class="float-left" />

                                <select name="search-country" id="search-country" class="col-md-10">
                                    <?php
                                    for ($i = 0; $i < count($countries); $i++) {
                                        echo "<option value='$countries[$i]'>$countries[$i]</option>";
                                    }
                                    ?>
                                </select>                  
                            </div>

                            <div class="col-md-6">
                                <img src="img/search/magnifying-glass-plus-icon.png" alt="magnifying-glass-plus-icon" class="float-left"  />

                                <select name="search-menu" id="search-menu" class="col-md-10">
                                    <?php
                                    for ($i = 0; $i < count($menus); $i++) {
                                        echo "<option value='$menus[$i]'>$menus[$i]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="clear"></div>

                            <input type='image' name='search-recipes' id='search-recipes' value='Submit' src="img/search/btn-search.png" alt="search button"
                                   class="float-right margin-top-m" />

                            <div class="clear"></div>

                        </div>

                    </section> <!-- /search-module (country food dictionary)-->

                </div> <!-- /search-section (both search boxes)-->
            </div>


        </div>


        <div class="clear"></div>

    </body>
</html>



