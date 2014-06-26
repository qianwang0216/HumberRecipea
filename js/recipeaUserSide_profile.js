$(document).ready(function(){
    
    // show pop-up by clicking on the ruPopUp
    $('.ruPopUp').click(function(event){
    event.preventDefault(); // disable href link, ruPopUp, to go any other page by clicking
    $('.popUp_background').show().animate({"left":'419px'},500); //display your popup
    });
   
    //close pop-up by clicking close button
    $('.img_closebtn').click(function(){
    $('.popUp_background').animate({"left":'-419px'},1000);
    });
    
    // hides the popup if user clicks anywhere in the page
    $('.popUp_background').click(function(){
        return false;
    });
    
    // by clicking in Header or Content of pop-up, pop-up doesn't close
    $('.popUp_header').click(function(){
        return false;
    });
    
    $('.popUp_content').click(function(){
        return false;
    });
 
});
