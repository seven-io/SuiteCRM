<form id='sms77_sms_form'>
    <input name='bean_id' type='hidden' value='{$SMS77_BEAN_ID}'/>
    <input name='module' type='hidden' value='{$SMS77_MODULE}'/>

    <div class='form-group'>
        <label for='sms77_from'>{$MOD.LBL_SMS77_FROM}</label>
        <input class='form-control' id='sms77_from' maxlength='16' name='sms77_from'
               value='{$SMS77_FROM}'/>
    </div>

    <div class='form-group'>
        <label for='sms77_to'>
            {$MOD.LBL_SMS77_TO}
            <p class='help-block'><small>{$MOD.LBL_SMS77_TO_HELP}</small></p>
        </label>
        <input class='form-control' id='sms77_to' name='sms77_to' required
               value='{$SMS77_TO}'/>
    </div>

    <div class='form-group'>
        <label for='sms77_text'>{$MOD.LBL_SMS77_TEXT}</label>
        <textarea class='form-control' id='sms77_text' name='sms77_text' required
                  rows='8'></textarea>
    </div>

    <button class='btn btn-primary btn-block button-padding' type='submit'>
        {$MOD.LBL_SMS77_SEND_SMS}
    </button>
</form>

<p id='sms77_notification'></p>