<?php
 session_start();
      
  require_once '../Class_Folder/database.php';
  require_once '../Class_Folder/recipedb.php';
  require_once '../Class_Folder/ingredientdb.php';
  require_once '../Class_Folder/countrydb.php';
  
  $string=0;
  
  //$countryname = $_POST['countryselect'];
  $pdb = new RecipeDB();
  $recipes = $pdb->getRecipes();
  $recipe = $recipes->fetch();
  
  $pdb2 = new CountryDB();
  $countries = $pdb2->getCountries();
  $country = $countries->fetch();
  
  $pdb3 = new IngredientDB();
  $ingredient_names = $pdb3->getIngredients2();
  $ingredient_name = $ingredient_names->fetch();
  
  if((($_SESSION['myusername']))){ 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="Recipea, Log in" />
    <meta name="description" content="Recipea: Online Recipe Sharing Website" />
    <title>Recipea Admin Masterpage</title>
    <link rel="stylesheet" href="css/admin_style.css" />
    <link rel="stylesheet" href="css/admin_gallery.css" />
    <!--jQuery-->
    <script src="../js/jquery/jquery-1.10.2.min.js"></script>
    <script src="../js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
    <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    <!--[if IE 9]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie9.css"/>
            <![endif]-->
    <!--[if IE 8]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
            <![endif]-->
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie7.css"/>
            <![endif]-->

    <script language="javascript" type="text/javascript">
    function getFileSize(filename)
    {
       var filename; //获得上传文件的物理路径
       alert (filename);
       if(filename =='')
       {
          alert("You did not browse the file you want to upload"); 
          return false;
       }
       try {
           var fso,f,fname,fsize;
           //设置上传的文件最大值（单位：kb），超过此值则不上传。
           var flength=1024;  
           var fso=new ActiveXObject("Scripting.FileSystemObject");
           f=fso.GetFile(filename);//文件的物理路径
           fname=fso.GetFileName(filename);//文件名（包括扩展名）
           fsize=f.Size; //文件大小（bit）
           fsize=fsize/1024;

            if(fsize>flength)
            {
                alert("The file size is："+ fsize + "kb,\nwas exceeded "+ flength +"kb, not allow to upload ");
                return false;
            }
            else{
                alert("allow to upload, file size is："+fsize+"kb");
            }
        }
        catch(e) {
            alert(e+"\n 跳出此消息框，是由于你的activex控件没有设置好,\n"+
            "你可以在浏览器菜单栏上依次选择\n"+
            "工具->internet选项->\"安全\"选项卡->自定义级别,\n"+
            "打开\"安全设置\"对话框，把\"对没有标记为安全的\n"+
            "ActiveX控件进行初始化和脚本运行\"，改为\"启动\"即可");
             return false;
       }

       return true;

    }
    
    function Check(){
        var name=document.add_recipe.recipe_name.value;
        if(name==null||name==""){
            alert("Please input recipe name!");
            return false;
        }
        var cooktime2=document.add_recipe.cooktime.value;
        if(cooktime2==null||cooktime2==""){
            alert("Please input cooktime!");
            return false;
        }
        var summary2=document.add_recipe.summary.value;
        if(summary2==null||summary2==""){
            alert("Please input summary!");
            return false;
        }
        var instruction2=document.add_recipe.instruction.value;
        if(instruction2==null||instruction2==""){
            alert("Please input instruction!");
            return false;
        }
        var file=document.add_recipe.userfile.value;
        if(file==null||file==""){
            alert("Please upload a file!");
            return false;
        }
        var ingredient_name=document.add_recipe.ingredient_name[].value;
        if(ingredient_name==null||ingredient_name==""){
            alert("Please choose a ingredient!");
            return false;
        }
        
    }
    
    </script>
    
    </head>
    <body>
        <!--- - - - - - - - -  HEADER STARTS - - - - - - - - --->
        <?php require_once 'admin_header.php'; ?>
        <!--- - - - - - - - -  HEADER ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  NAVIGATION STARTS - - - - - - - - --->
        <?php require_once 'admin_navigation.php'; ?>
        <!--- - - - - - - - -  NAVIGATION ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  CONTENT STARTS - - - - - - - - --->
        <section>
            <article id="main">
                <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">CONTENT</div>
                <div id="articleHeadR">
                    <form id="form" method="get" action="http://www.google.com">
                    <input id="searchbox" type="search" name="search">
                    <button id="searchbutton" class="roundcorner" type="button">SEARCH</button>
                    </form>
                </div><!--articleHeadR-->
                
                <!--- - - - - - - - -  Please put your own content code here - - - - - - - - --->
                <!--Content Main-->
                
            <p style="margin-left: 5%"><a href="recipe.php">View Recipe List</a></p>
            <form action="add_recipePstmclass.php" method="post" name="add_recipe" id="add_recipe" enctype="multipart/form-data">
                <center>
                    <table border="1">
                        <tr>
                            <td style="text-align: right">Recipe Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="recipe_name" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Cooktime:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="cooktime" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Summary:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <textarea name="summary" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Instruction:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <textarea name="instruction" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Country:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="country" id="country">
                                    <?php foreach($countries as $country): ?>
                                    <option value="<?php echo $country['id'] ?>"><?php echo $country['country']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Image:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <input type="hidden" name="max_file_size" value="100000">
                                <input name="userfile" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Ingredients:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <?php foreach($ingredient_names as $ingredient_name): ?>
                                <input type="checkbox" name="ingredient_name[]" value="<?php echo $ingredient_name['ingredient_name'] ?>" />
                                <?php echo $ingredient_name['ingredient_name'] ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </center>
                
                <label>&nbsp;</label>
                <input type="submit" value="Submit" onClick="return Check();getFileSize(document.all('userfile').value)" style="float: right;margin-right: 30%" />
                <br />
                
                </form>

  
             <!--- - - - - - - - -  Finish your own content - - - - - - - - --->
            </table> 
            </article>
        </section>
        </div><!--clearfix-->
        <!--- - - - - - - - -  CONTENT ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  FOOTER STARTS - - - - - - - - --->
        <?php require_once 'admin_footer.php'; ?>

        <!--- - - - - - - - -  FOOTER ENDS - - - - - - - - --->
    </body>
    
    <!-- jQuery lightbox -->
    <script type="text/javascript" charset="utf-8">
        //var $k = jQuery.noConflict();
        $(function() {
            function launch() {
                 $('#sign_up').lightbox_me({centered: true, onLoad: function() { $('#sign_up').find('input:first').focus();}});
            }

            $('#logout').click(function(e) {
                $("#sign_up").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                        $("#sign_up").find("input:first").focus();
                                }});

                e.preventDefault();
            });
            $('table tr:nth-child(even)').addClass('stripe');
        });
    </script>
</html>
    <?php } else{
        header("location:../recipe.php");}
    ?>