<form method='POST' action='index.php' enctype='multipart/form-data'>
    <input type='hidden' name='module' value='sms77'/>
    <input type='hidden' name='action' value='index'/>

    <span class='error'>{$error.main}</span>

    <table>
        <tr>
            <td><label for='sms77_api_key'>{$MOD.LBL_SMS77_API_KEY}</label></td>
            <td>
                {if empty($config.sms77_api_key)}
                    {assign var='sms77_api_key' value=$sms77_config.sms77_api_key.default}
                {else}
                    {assign var='sms77_api_key' value=$config.sms77_api_key}
                {/if}

                <input
                        id='sms77_api_key'
                        name='sms77_api_key'
                        placeholder='{$sms77_config.sms77_api_key.placeholder}'
                        required
                        size='64'
                        type='password'
                        value='{$sms77_api_key}'
                />
            </td>
        </tr>

        <tr>
            <td><label for='sms77_sender'>{$MOD.LBL_SMS77_SENDER}</label></td>

            <td>
                {if empty($config.sms77_sender)}
                    {assign var='sms77_sender' value=$sms77_config.sms77_sender.default}
                {else}
                    {assign var='sms77_sender' value=$config.sms77_sender}
                {/if}

                <input
                        id='sms77_sender'
                        maxlength='16'
                        name='sms77_sender'
                        size='16'
                        type='text'
                        value='{$sms77_sender}'
                        placeholder='{$sms77_config.sms77_sender.placeholder}'
                />
            </td>
        </tr>

        <tr>
            <td>{$MOD.LBL_SMS77_ACTIVE}</td>

            <td>
                {if empty($config.sms77_active)}
                    {assign var='sms77_active' value=$sms77_config.sms77_active.default}
                {else}
                    {assign var='sms77_active' value=$config.sms77_active}
                {/if}

                <label for='sms77_active_yes'>Yes</label>
                <input
                        id='sms77_active_yes'
                        name='sms77_active'
                        type='radio'
                        value='yes'
                        {if $sms77_active =='yes'}checked{/if}
                />

                <label for='sms77_active_no'>No</label>
                <input
                        id='sms77_active_no'
                        name='sms77_active'
                        type='radio'
                        value='no'
                        {if $sms77_active =='no'}checked{/if}
                />
            </td>
        </tr>
    </table>
    <br/>
    <div>
        <input
                class='button'
                name='save'
                title='{$APP.LBL_SAVE_BUTTON_TITLE}'
                type='submit'
                value='{$APP.LBL_SAVE_BUTTON_LABEL}'
        />

        <input
                class='button' type='button' name='cancel'
                onclick='document.location.href="index.php?module=Administration&action=index"'
                title='{$MOD.LBL_CANCEL_BUTTON_TITLE}'
                value='{$APP.LBL_CANCEL_BUTTON_LABEL}'
        />
    </div>
</form>



