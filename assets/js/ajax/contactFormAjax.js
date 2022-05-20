const form = document.getElementById('contact-form');

const contactFormAjax = () => {
    if(! form) return;
    const sendBtn = form.querySelector('button');
    const msgDiv = form.querySelector('.contact-form__msg');
    
    sendBtn.addEventListener('click', () => {
        sendBtn.innerText = 'Sending...';
   
        const ajaxData = {
            'action': 'contact_form',
            'nonce': cheevt_object.nonce,
            'data': getFormValues()
        };
    
        jQuery.ajax({
            url: cheevt_object.ajax_url,
            type: 'POST',
            data: ajaxData,
            cache: false,
            success: function (response, textStatus, jqXHR) {
                if (textStatus == 'success') {
                    console.log('success', response);
                    sendBtn.innerText = 'Send';
                    
                    msgDiv.classList.remove('contact-form__msg--hidden');
                    setTimeout(() => {
                        msgDiv.classList.add('contact-form__msg--hidden');
                    }, 3000);
                    msgDiv.innerHTML = `<p>${response.data.message}</p>`;
                    form.reset();
                }
    
            },
            error: function (jqXHR, textStatus, errorThrown) {
                sendBtn.innerText = 'Send';

                msgDiv.classList.remove('contact-form__msg--hidden');
                    setTimeout(() => {
                        msgDiv.classList.add('contact-form__msg--hidden');
                    }, 3000);
                    msgDiv.innerHTML = `<p>${jqXHR.responseJSON.data.message}</p>`;
                console.log('error', jqXHR);
            }
        });
    });
}

const getFormValues = () => {
    const formData = new FormData(form)
    const data = {};
    for (var pair of formData.entries()) {
        data[pair[0]] = pair[1];
    }

    return data;
}

export default contactFormAjax;