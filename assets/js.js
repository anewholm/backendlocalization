$(document).ready(function(){
    var button = $("button[data-request='onResetDefault']");
    button.removeAttr('data-request');
    button.removeAttr('data-request-confirm');
    button.on('click',function(){
        $.request('onNewResetDefault',{
            confirm: 'Are you sure?',
        });
    })


});
