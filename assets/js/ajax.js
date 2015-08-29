(function(){
    var wp = window.wp;

    var action = 'get_minutes_to_read_post';
    var data   = { postId: 1 };

    wp.ajax.send( action, {
        data: data,
        success: successHandler,
        error: errorHandler
    });
});