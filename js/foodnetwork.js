$(document).ready(function(){

    //send the value from the category navigation when user click the link
    $('.link_style').click(function(event) {
        event.preventDefault();
        $('#hidden_cat').val($(this).data('value')); // set the value of data-value to hidden_cat
        $('#category_name').submit();
    });
    
});


