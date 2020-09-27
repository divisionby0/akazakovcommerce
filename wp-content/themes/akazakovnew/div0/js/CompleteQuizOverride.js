var ver = "0.0.1";
console.log("IM CompleteQuizOverride "+ver);
var $ = jQuery.noConflict();

$(document).ready(function($) {
    var isQuizPage = $("#quizPage").text().toString() == 'true';

    if(isQuizPage == true){
        $('form[name="complete-quiz"]').bind('submit',(event)=>onSubmit(event));
    }
});

function onSubmit(event){
    console.log("submit ! target=",event.target);

    var message = $(event.target).data('confirm');
    var action = $(event.target).data('action');

    console.log("message=", message, "action=",action);

    event.preventDefault();
    event.stopPropagation();

    $(event.target).unbind('submit');

    $(event.target).submit();

    return false;
}
