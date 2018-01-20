    /*
    |--------------------------------------------------------------------------
    | ALERTS - IziToast (http://izitoast.marcelodolce.com/)
    |--------------------------------------------------------------------------
    */
    // Positions:  bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter or center.
    
    function toast_success(title, text, position, action, time){
        iziToast.show({
            title: title,
            message: text,
            position: position,
            messageSize: '1.5rem',
            color: 'green',
            timeout: time,
            onClosing: function () {
                switch(action) {
                    case 'reload':
                        location.reload();
                        break;
                    default:
                        console.log('No action');
                        break;
                }
            },
        });
    }

    function toast_error(title, text, position, action, time){
        iziToast.show({
            title: title,
            message: text,
            position: position,
            color: 'red',
            timeout: time,
            onClosing: function () {
                switch(action) {
                    case 'reload':
                        location.reload();
                        break;
                    case 'none':
                        console.log('No action');
                        break;
                    default:
                        
                        break;
                }
            },
        });
    }