// Dodolan Jquery Lib
// Author : Zidni Mubarock
// Url    : http://barockprojects.com
// Email  : zidmubarock@gmail.com
// file name : dodolan_js_lib.js
// Date Picker
// -------------------------------------------------------------------------------------/
$(document).ready(function () {
    $(".hasdate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: 'c-90:c+0'

    });


});
$(document).ready(function () {

    $(".hastime").datetimepicker({
        dateFormat: "yy-mm-dd",
        timeFormat: 'hh:mm:ss'
    });
});

// COPY TO CLIP BOARD
/*
$(document).ready(function(){
	ZeroClipboard.setMoviePath('http://localhost/dodolan//assets/global_js/zeroclip/ZeroClipboard.swf');
	clip = new ZeroClipboard.Client();
	clip.setHandCursor( true );
	// assign a common mouseover function for all elements using jQuery
	$('.toClipBoard').mouseover( function() {
		// set the clip text to our innerHTML
		text = $(this).attr('alt');
		clip.setText(text);
		// reposition the movie over our element
		// or create it if this is the first time
		if (clip.div) {
			clip.receiveEvent('mouseout', null);
			clip.reposition(this);
		}
		else clip.glue(this);
		// gotta force these events due to the Flash movie
		// moving all around. This insures the CSS effects
		// are properly updated.
		clip.receiveEvent('mouseover', null);
	
	} );


});
*/

$(document).ready(function () {

    var current = $(location).attr('href');
    $('a').each(function () {
        var a_link = $(this).attr("href");
        if (a_link == current) {
            $(this).addClass('current_link');
        }

    });

});

$(document).ready(function () {
    $(".table-Ui tbody tr:visible:even", this).addClass("even");
    $(".table-Ui tbody tr:visible:odd", this).addClass("odd");
});

// delte confirmation 
$(document).ready(function () {
    $('span.del').click(function () {
        var link = $(this).parent().attr('href');
        $('.ajaxdialog').append('Are you Sure to Delete this item permanently ?');
        $('.ajaxdialog').dialog({
            resizable: false,
            title: 'Delete Confirmation',
            height: 140,
            buttons: {
                "Yes": function () {
                    $(location).attr('href', link);
                    $(this).empty().dialog('destroy');
                },
                Cancel: function () {
                    $(this).dialog("close");
                    $(this).empty().dialog('destroy');
                }
            }
        });
        return false;
    });
});


//Tab UI
//---------------------------------------------------------------------------------------/
$(document).ready(function () {

    //Default Action
    $(".tab-Ui .comp .item").hide(); //Hide all content
    $(".tab-Ui .nav .item:first").addClass("actv").show(); //Activate first tab
    $(".tab-Ui .comp .item:first").show(); //Show first tab content
    //On Click Event
    $(".tab-Ui .nav .item").click(function () {
        var tabId = $(this).parent().parent().attr("id");
        $('#' + tabId + ' .nav .item').removeClass("actv"); //Remove any "active" class
        $(this).addClass("actv"); //Add "active" class to selected tab
        $('#' + tabId + ' .comp>.item').hide(); //Hide all tab content
        var activeTab = $(this).attr("rel"); //Find the rel attribute value to identify the active tab + content
        $('#' + tabId + ' .comp > .item[no=' + activeTab + ']').fadeIn(); //Fade in the active content
        return false;
    });

});
$(document).ready(function () {

    $('.msg-Ui .msg-item .close').click(function () {
        var msgItem = $(this).parent();
        $(msgItem).fadeOut(1000);

    });
    $('.msg-Ui .msg-item').delay(4000).slideUp();

})

jQuery(document).ready(function () {
    jQuery('.text-input').each(function () {
        var default_value = this.value;
        jQuery(this).keypress(function () {
            if (this.value == default_value) {
                this.value = '';
            }
        });
        jQuery(this).blur(function () {
            if (this.value == '') {
                this.value = default_value;
            }
        });
    });
});


//The jQuery Setup
$(document).ready(function () {

    $('#clonetrigger').click(function () {
        var yourclass = ".clonable"; //The class you have used in your form
        var clonecount = $(yourclass).length; //how many clones do we already have?
        var newid = Number(clonecount) + 1; //Id of the new clone   
        $(yourclass + ":first").fieldclone({ //Clone the original elelement
            newid_: newid,
            //Id of the new clone, (you can pass your own if you want)
            target_: $("#formbuttons"),
            //where do we insert the clone? (target element)
            insert_: "before",
            //where do we insert the clone? (after/before/append/prepend...)
            limit_: 4 //Maximum Number of Clones
        });
        return false;
    });

});

(function ($) {
    $.fn.notice = function (title, content) {
        $(this).append('<div class="header_notice">' + content + '</div>');
        $(this).dialog({
            title: title,
            show: 'easeInExpo',
            hide: 'easeOutExpo',
            minHeight: 100,
            create: function (event, ui) {

            },
            open: function (event, ui) {
                $('.ui-dialog').addClass('msg-Ui');
                $('.ui-dialog-titlebar').addClass('msg-header');
                $('.ui-dialog-titlebar').addClass(title);


            },
            close: function (event, ui) {
                $('.ui-dialog').removeClass('msg-Ui');
                $('.ui-dialog-titlebar').removeClass('');
                $(this).empty().dialog('destroy');
            }
        });




    }

})(jQuery);

//The Plugin Script Cloning Form
(function ($) {

    $.fn.fieldclone = function (options) {

        //==> Options <==//
        var settings = {
            newid_: 0,
            target_: $(this),
            insert_: "before",
            limit_: 0
        };
        if (options) $.extend(settings, options);

        if ((settings.newid_ <= (settings.limit_ + 1)) || (settings.limit_ == 0)) { //Check the limit to see if we can clone
            //==> Clone <==//
            var fieldclone = $(this).clone();
            var node = $(this)[0].nodeName;
            var classes = $(this).attr("class");

            //==> Increment every input id <==//
            var srcid = 1;
            $(fieldclone).find(':input').each(function () {
                var s = $(this).attr("name");
                $(this).attr("name", s.replace(eval('/_' + srcid + '/ig'), '_' + settings.newid_));
            });

            //==> Locate Target Id <==//
            var targetid = $(settings.target_).attr("id");
            if (targetid.length <= 0) {
                targetid = "clonetarget";
                $(settings.target_).attr("id", targetid);
            }

            //==> Insert Clone <==//
            var newhtml = $(fieldclone).html().replace(/\n/gi, "");
            newhtml = '<' + node + ' class="' + classes + '">' + newhtml + '</' + node + '>';

            eval("var insertCall = $('#" + targetid + "')." + settings.insert_ + "(newhtml)");
        }
    };

})(jQuery);
(function ($) {

    $.fn.jRedi = function (location) {
        $(location).attr('href', location)
    }
})(jQuery);



jQuery.event.special.keyupdelay = {
    add: function (handler, data, namespaces) {
        var delay = data && data.delay || 100,
            that = this;

        return function (event) {
            setTimeout(function () {
                handler.apply(that, arguments);
            }, data);
        }
    },

    setup: function (data, namespaces) {
        jQuery(this).bind("keyup", jQuery.event.special.keyupdelay.handler);
    },

    teardown: function (namespaces) {
        jQuery(this).unbind("keyup", jQuery.event.special.keyupdelay.handler);
    },

    handler: function (event) {
        event.type = "keyupdelay";
        jQuery.event.handle.apply(this, arguments);
    }
};

/*! Copyright 2011, Ben Lin (http://dreamerslab.com/)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 1.0.0
 *
 * Requires: jQuery 1.2.6+
 */

$.fn.center = function (options) {

    // cache gobal
    var $w = $(window),

        scrollTop = $w.scrollTop();

    return this.each(function () {

        // cache $( this )
        var $this = $(this),

            // merge user options with default settings
            settings = $.extend({
                against: 'window',
                top: false,
                topPercentage: 0.5
            }, options),

            centerize = function () {
                var $against, x, y;

                if (settings.against === 'window') {
                    $against = $w;
                } else if (settings.against === 'parent') {
                    $against = $this.parent();
                    scrollTop = 0;
                } else {
                    $against = $this.parents(against);
                    scrollTop = 0;
                }

                x = (($against.width()) - ($this.outerWidth())) * 0.5;
                y = (($against.height()) - ($this.outerHeight())) * settings.topPercentage + scrollTop;

                if (settings.top) y = settings.top + scrollTop;

                $this.css({
                    'left': x,
                    'top': y
                });
            };

        // apply centerization
        centerize();
        $w.resize(centerize);
    });
};
/// STORE PRODUCT SNAP ANIMATION
$(document).ready(function () {
    $('.productSnap .productImg').hover(function () {
        var tool = $(this).find('.snap_tool');
        tool.show('drop', {
            direction: "down"
        }, 500);

    }, function () {

        var tool = $(this).find('.snap_tool');
        tool.hide('fade', 500);


    });

});

// JQUERY TABED LINE MENU
/*********************
//* jQuery Drop Line Menu- By Dynamic Drive: http://www.dynamicdrive.com/
//* Last updated: May 9th, 11'
//* Menu avaiable at DD CSS Library: http://www.dynamicdrive.com/style/
*********************/

var droplinemenu = {

    arrowimage: {
        classname: 'downarrowclass',
        src: 'down.gif',
        leftpadding: 5
    },
    //customize down arrow image
    animateduration: {
        over: 200,
        out: 100
    },
    //duration of slide in/ out animation, in milliseconds
    buildmenu: function (menuid) {
        jQuery(document).ready(function ($) {
            var $mainmenu = $("#" + menuid + ">ul")
            var $headers = $mainmenu.find("ul").parent()
            $headers.each(function (i) {
                var $curobj = $(this)
                var $subul = $(this).find('ul:eq(0)')
                this._dimensions = {
                    h: $curobj.find('a:eq(0)').outerHeight()
                }
                this.istopheader = $curobj.parents("ul").length == 1 ? true : false
                if (!this.istopheader) $subul.css({
                    left: 0,
                    top: this._dimensions.h
                })
                var $innerheader = $curobj.children('a').eq(0)
                $innerheader = ($innerheader.children().eq(0).is('span')) ? $innerheader.children().eq(0) : $innerheader //if header contains inner SPAN, use that
                $innerheader.append('<img src="' + droplinemenu.arrowimage.src + '" class="' + droplinemenu.arrowimage.classname + '" style="border:0; padding-left: ' + droplinemenu.arrowimage.leftpadding + 'px" />')
                $curobj.hover(

                function (e) {
                    var $targetul = $(this).children("ul:eq(0)")
                    if (this.istopheader) $targetul.css({
                        left: $mainmenu.position().left,
                        top: $mainmenu.position().top + this._dimensions.h
                    })
                    if (document.all && !window.XMLHttpRequest) //detect IE6 or less, fix issue with overflow
                    $mainmenu.find('ul').css({
                        overflow: (this.istopheader) ? 'hidden' : 'visible'
                    })
                    $targetul.fadeIn(droplinemenu.animateduration.over)
                }, function (e) {
                    var $targetul = $(this).children("ul:eq(0)")
                    $targetul.fadeOut(droplinemenu.animateduration.out)
                }) //end hover
            }) //end $headers.each()
            $mainmenu.find("ul").css({
                display: 'none',
                visibility: 'visible',
                width: $mainmenu.width()
            })
        }) //end document.ready
    }
}

$(document).ready(function () {
    $('.hv_child > span >  a').click(function () {
        return false;
    })
});

function delayTimer(delay) {
    var timer;
    return function (fn) {
        timer = clearTimeout(timer);
        if (fn) timer = setTimeout(function () {
            fn();
        }, delay);
        return timer;
    }
}

function print_autolist(object, class_to, ident, target) {
    wrap = $(target).parent();
    width = $(target).before().outerWidth();

    var list = '<div class="ajx_autolist ' + class_to + '" style="width:' + (width - 2) + 'px"><ul>';
    $.each(object, function (key, val) {
        list += '<li ' + ident + '="' + val.id + '" class="cat_name">' + val.name + '</li>';
    });
    list += '</ul></div>';
    wrap.append(list);

}