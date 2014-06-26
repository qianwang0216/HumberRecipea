<?php
    session_start();
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/recipedb.php';
    require_once '../Class_Folder/measuredb.php';
    //$countryname = $_POST['countryselect'];
    $pdb=new RecipeDB();
    $recipes=$pdb->getRecipes();
    $recipe=$recipes->fetch();
    
    $pdb2=new MeasureDB();
    $measures=$pdb2->getMeasures();
    $measure=$measures->fetch();
     
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
        var name=document.add_ingredient.ingredient_name.value;
        if(name==null||name==""){
            alert("Please input ingredient name!");
            return false;
        }
        var amount2=document.add_ingredient.amount.value;
        if(amount2==null||amount2==""){
            alert("Please input amount!");
            return false;
        }
        var calorie2=document.add_ingredient.calory.value;
        if(calorie2==null||calorie2==""){
            alert("Please input calory!");
            return false;
        }
        var file=document.add_ingredient.userfile.value;
        if(file==null||file==""){
            alert("Please upload a file!");
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
                <p style="margin-left: 5%"><a href="ingredient.php">View Ingredient List</a></p>
                <form name="add_ingredient" action="add_ingredientPstmclass.php" method="post" id="add_ingredient" enctype="multipart/form-data">
                    <center>
                    <table border="1">
                        <tr>
                            <td style="text-align: right">Recipe Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="recipe_name" id="recipe_name">
                                    <?php foreach($recipes as $recipe): ?>
                                    <option value="<?php echo $recipe['recipe_name'] ?>"><?php echo $recipe['recipe_name']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Ingredient Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <input type="input" name="ingredient_name" />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Amount:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="amount" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Measure:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="measure" id="measure">
                                    <?php foreach($measures as $measure): ?>
                                    <option value="<?php echo $measure['measures'] ?>"><?php echo $measure['measures']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Calorie:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="calory" /> </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Image:&nbsp;&nbsp;&nbsp;</td>
                            <!--<td><input type="input" name="image_name" /></td>-->
                            <td style="text-align: left">
                                <input type="hidden" name="max_file_size" value="100000">
                                <input name="userfile" type="file">
                            </td>
                        </tr>
                    </table>
                    </center>

                    <label>&nbsp;</label>
                    <input type="submit" value="Submit" onClick="return Check();getFileSize(document.all('userfile').value)" style="float: right;margin-right: 30%" />
                    <br />
                </form>

            </div><!-- end main -->
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
        header("location:../ingredient.php");}
    ?>
