const phones = $('[type=phone]')
const baseUrl = window.siteUrl

for (let i = 0; i < phones.length; i++) {
    const phone = $(phones[i])
    const callerButton = $(phone).attr('sms-button')

    if (callerButton === undefined) {
        const number = phone.text().trim()

        if (number === '') continue

        phone.append('<img src="' + baseUrl + '/themes/SuiteP/images/p_icon_email_address_32.png" alt="Send SMS" class="sms77-send-sms" data-to="' + number + '" />')
        $(phone).attr('sms-button', true)
    }
}

$('img.sms77-send-sms:not(.sms77-attached)').addClass('sms77-attached').on('click', function() {
    const number = $(this).data('to')

    Swal.fire({
        input: 'textarea',
        showCancelButton: true,
        text: 'Enter a message for the customer:',
        title: number,
    }).then(function(result) {
        if (!result.value) {
            fireAlert('error', 'The message is empty', 'Please enter a message')
            return false
        }

        $.ajax({
            data: {
                message: result.value,
                number: number,
            },
            dataType: 'json',
            success: function(json) {
                fireAlert('100' === json.success ? 'success' : 'error', 'Notice',
                    JSON.stringify(json, null, 2))
            },
            type: 'POST',
            url: baseUrl + '/index.php?entryPoint=sms77',
        })
    }).catch(console.error)
})

function fireAlert(icon, title, text) {
    Swal.fire({
        icon,
        text,
        title,
    })
}
