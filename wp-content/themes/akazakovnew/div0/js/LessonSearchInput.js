//document.addEventListener("DOMContentLoaded", lessonDocumentReady);
var ver = "0.0.2";
console.log("IM LessonSearchInput "+ver);
var $ = jQuery.noConflict();

var courseItems;

$(document).ready(function($) {
    courseItems = $(".course-item");
    $(".course-item-search input").on("keyup keypress", onSearchInputKeyPressed);
   
});
function onSearchInputKeyPressed(e){
    console.log("search input key pressed key="+ e.keyCode);
    
    var value = $(".course-item-search input").val();
    var r = new RegExp(value, 'ig');

    courseItems.map(function () {
        var $item = $(this),
            itemName = $item.find('.item-name').text();
        if (itemName.match(r) || !value.length) {
            $item.show();
        } else {
            $item.hide();
        }
    });

    $('.section').show().each(function () {
        if (value.length) {
            if (!$(this).find('.section-content').children(':visible').length) {
                $(this).hide();
            } else {
                $(this).show();
            }
        } else {
            $(this).show();
        }
    });
    //$(this).closest('.course-item-search').toggleClass('has-keyword', !!this.value.length);
}
