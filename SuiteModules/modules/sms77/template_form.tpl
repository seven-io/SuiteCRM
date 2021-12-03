<form method='POST' action='index.php' enctype='multipart/form-data'>
    <input type='hidden' name='module' value='sms77'/>
    <input type='hidden' name='action' value='template'/>

    <span class='error'>{$error.main}</span>

    <table>
        <tr>
            <td>{$MOD.LBL_SMS77_ACTIVE}</td>
            <td>
                {if empty($config.sms77_template_active)}
                    {assign var='sms77_template_active' value=$sms77_config.sms77_template_active.default}
                {else}
                    {assign var='sms77_template_active' value=$config.sms77_template_active}
                {/if}

                <label for='sms77_template_active_yes'>Yes</label>
                <input
                        id='sms77_template_active_yes'
                        type='radio'
                        value='yes'
                        name='sms77_template_active'
                        {if $sms77_template_active =='yes'}checked{/if}
                />

                <label for='sms77_template_active_no'>No</label>
                <input
                        id='sms77_template_active_no'
                        type='radio'
                        name='sms77_template_active'
                        value='no'
                        {if $sms77_template_active =='no'}checked{/if}
                />
            </td>
        </tr>

        <tr>
            <td><label for='description'>{$MOD.LBL_SMS77_TEXT}</label>
            </td>
            <td>
                {if empty($config.sms77_template_body)}
                    {assign var='sms77_template_body' value=$sms77_config.sms77_template_body.default}
                {else}
                    {assign var='sms77_template_body' value=$config.sms77_template_body}
                {/if}

                <textarea
                        cols='80'
                        id='description'
                        style='height: 1.6.em; overflow-y:auto; font-family:sans-serif,monospace; font-size:inherit;'
                        name='sms77_template_body'
                        rows='10'
                        tabindex='0'
                >{$sms77_template_body}</textarea>
            </td>
        </tr>
    </table>

    <p>
        <span class='text-danger'>Notice: </span>
        If active, a SMS gets sent when a new <i>Contact</i> gets created.
    </p>

    <p>
        <span class='text-danger'>Property Placeholders:</span><br/>
        {$placeholders}
    </p>

    <div>
        <input
                class='button'
                title='{$APP.LBL_SAVE_BUTTON_TITLE}'
                type='submit'
                value='{$APP.LBL_SAVE_BUTTON_LABEL}'
                name='save'
        />

        <input
                class='button' type='button' name='cancel'
                onclick='document.location.href="index.php?module=Administration&action=index"'
                value='{$APP.LBL_CANCEL_BUTTON_LABEL}'
                title='{$MOD.LBL_CANCEL_BUTTON_TITLE}'
        />
    </div>
</form>



