 jQuery(document).ready(function() {
    
 // slide toggle the "leave a reply" link
 jQuery("#reply-title").click(function(){
  jQuery("#commentform").slideToggle();
});

// show the reply form when the threaded reply link is clicked 

jQuery(".comment-reply-link").click(function(){
  jQuery("#commentform").show();
});



});
 





















