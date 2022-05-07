//import $ from 'jquery';

const exampleAjax = () => {
    const data = {
        'message': 'Hello from ajax'
    };

    const ajaxData = {
        'action': 'example_func',
        'nonce': cheevt_object.nonce,
        'data': data
    };

    jQuery.ajax({
        url: cheevt_object.ajax_url,
        type: 'POST',
        data: ajaxData,
        cache: false,
        success: function (response, textStatus, jqXHR) {
            if (textStatus == 'success') {
                console.log('success', response);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error', jqXHR);
        }
    });
}

export default exampleAjax;