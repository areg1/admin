function textChanging(selector) {

    if( $(selector).text() == 'Add admin' ) { 

        $(selector).text('Close'); 
    } else {

        $(selector).text('Add admin');
    }
}

$('#btnAdd').on('click',function() {

    textChanging(this);
    $('#add').toggle(500);

});

$('#closeAdd').on( 'click', function() {

    textChanging('#btnAdd');
    $('#add').hide(500);
});