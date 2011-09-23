jQuery(document).ready(function() {
//The menu javascript is seperated and put at the bottom of the page so as not to break if flickr, or twitter farts

//hide the menu based on calculated menu length

  var navHeight = '-' + (jQuery('#access').height() - 22).toString() + 'px';
   jQuery("#access").css('marginTop',navHeight);
   jQuery("#access").show();
   
    jQuery("#access_button").click( function() {
        var navHeight = '-' + (jQuery('#access').height() - 22).toString() + 'px'; 
        if (jQuery("#openCloseIdentifier").is(":hidden")) {
            jQuery("#access").animate({
                marginTop: navHeight
                }, 500 );
            jQuery("#openCloseIdentifier").show();
            jQuery("#access_button").text('open');
        } else {
            jQuery("#access").animate({
                marginTop: "-8px"
                }, 500 );
            jQuery("#openCloseIdentifier").hide();
             jQuery("#access_button").text('close');
        }
    });
    
}); 
