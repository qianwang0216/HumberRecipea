$(document).ready(function() {
 
	//ACCORDION BUTTON ACTION	
	$("div#dairy").show();
    $("div.dairyContent").hide();
 
    $('div#dairy').click(function(){
	$("div.fruitsContent").slideUp();
	$("div.grainsContent").slideUp();
	$("div.liquidsContent").slideUp();
	$("div.proteinContent").slideUp();
        $("div.vegetabelsContent").slideUp();
    	$("div.dairyContent").slideToggle();
    });

 
    $("div#fruits").show();
    $("div.fruitsContent").hide();
 
    $('div#fruits').click(function(){
    	$("div.dairyContent").slideUp();
	$("div.grainsContent").slideUp();
	$("div.liquidsContent").slideUp();
	$("div.proteinContent").slideUp();
        $("div.vegetabelsContent").slideUp();
	$("div.fruitsContent").slideToggle();
    });
	
    $("div#grains").show();
    $("div.grainsContent").hide();
 
    $('div#grains').click(function(){
	$("div.dairyContent").slideUp();
	$("div.fruitsContent").slideUp();
	$("div.liquidsContent").slideUp();
	$("div.proteinContent").slideUp();
        $("div.vegetabelsContent").slideUp();
    	$("div.grainsContent").slideToggle();
    });;
	
    $("div#liquids").show();
    $("div.liquidsContent").hide();
 
    $('div#liquids').click(function(){
	$("div.dairyContent").slideUp();
	$("div.fruitsContent").slideUp();
	$("div.grainsContent").slideUp();
	$("div.proteinContent").slideUp();
        $("div.vegetabelsContent").slideUp();
    	$("div.liquidsContent").slideToggle();
    });
    
    $("div#protein").show();
    $("div.proteinContent").hide();
 
    $('div#protein').click(function(){
	$("div.dairyContent").slideUp();
	$("div.fruitsContent").slideUp();
	$("div.grainsContent").slideUp();
	$("div.liquidsContent").slideUp();
        $("div.vegetabelsContent").slideUp();
    	$("div.proteinContent").slideToggle();
    });
	
    $("div#vegetables").show();
    $("div.vegeteblesContent").hide();
 
    $('div#vegetables').click(function(){
	$("div.dailyContent").slideUp();
	$("div.fruitsContent").slideUp();
        $("div.grainsContent").slideUp();
	$("div.liquidsContent").slideUp();
	$("div.proteinContent").slideUp();
   	$("div.vegetablesContent").slideToggle();
    });
 
});


