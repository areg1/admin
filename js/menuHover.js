$('#menu>span').click( function() {

    if( $(this).children().is(':visible') ) {

        $(this).children().css({'display': 'none'});
    } else {

        $(this).children().css({'display': 'block'});
    }
});