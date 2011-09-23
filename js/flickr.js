
    function loadFlickrImages(flickrUser,flickrUsrAmt,flickrUserSet){

     //bring in flickr. if userset isnt specified, display oublic photos

             flickrUserSet = typeof(flickrUserSet) != 'undefined' ? flickrUserSet : null;

             if (!flickrUserSet){
                  jQuery.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id=" + flickrUser + "&lang=en-us&format=json&jsoncallback=?", function (data) {
                                jQuery("#flickr_update_list").text('');
                                jQuery.each(data.items, function(i,item){

                                        jQuery("#flickr_update_list").append("<li><a href='" + item.link + "'>" + "<img src='"+item.media.m.replace("_m", "_s")+"' />" + "</a></li>");
                                if ( i == flickrUsrAmt) return false;
                                })
                        });
             }
             else {

                 jQuery.getJSON("http://api.flickr.com/services/feeds/photoset.gne?nsid=" + flickrUser + "&set="+flickrUserSet+"&format=json&jsoncallback=?", function (data) {
                           jQuery("#flickr_update_list").text('');
                            jQuery.each(data.items, function(i,item){

                                   jQuery("#flickr_update_list").append("<li><a href='" + item.link + "'>" + "<img src='"+item.media.m.replace("_m", "_s")+"' />" + "</a></li>");
                            if ( i == flickrUsrAmt) return false;
                            })
                    });

             }
    }
