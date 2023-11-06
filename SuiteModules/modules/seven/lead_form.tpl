<form method='POST' action='index.php' enctype='multipart/form-data'>
    <input type='hidden' name='module' value='seven'/>
    <input type='hidden' name='action' value='lead'/>

    <span class='error'>{$error.main}</span>

    <table>
        <tr>
            <td>{$MOD.LBL_SEVEN_ACTIVE}</td>

            <td>
                {if empty($config.seven_lead_active)}
                    {assign var='seven_lead_active' value=$seven_config.seven_lead_active.default}
                {else}
                    {assign var='seven_lead_active' value=$config.seven_lead_active}
                {/if}

                <label for='seven_lead_active_yes'>Yes</label>
                <input
                        id='seven_lead_active_yes'
                        name='seven_lead_active'
                        type='radio'
                        value='yes'
                        {if $seven_lead_active =='yes'}checked{/if}
                />

                <label for='seven_lead_active_no'>No</label>
                <input
                        id='seven_lead_active_no'
                        name='seven_lead_active'
                        type='radio'
                        value='no'
                        {if $seven_lead_active =='no'}checked{/if}
                />
            </td>
        </tr>

        <tr>
            <td><label for='description'>{$MOD.LBL_SEVEN_TEXT}</label></td>
            <td>
                {if empty($config.seven_lead_body)}
                    {assign var='seven_lead_body' value=$seven_config.seven_lead_body.default}
                {else}
                    {assign var='seven_lead_body' value=$config.seven_lead_body}
                {/if}

                <textarea
                        cols='80'
                        id='description'
                        name='seven_lead_body'
                        rows='10'
                        style='height: 1.6.em; overflow-y:auto; font-family:sans-serif,monospace; font-size:inherit;'
                        tabindex='0'
                >{$seven_lead_body}</textarea>
            </td>
        </tr>
    </table>

    <p>
        <span class='text-danger'>Notice: </span>
        If active, a SMS gets sent when a new <i>Lead</i> gets created.
    </p>

    <p>
        <span class='text-danger'>Property Placeholders:</span>
        <br/>
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
                class='button'
                name='cancel'
                onclick='document.location.href="index.php?module=Administration&action=index"'
                title='{$MOD.LBL_CANCEL_BUTTON_TITLE}'
                type='button'
                value='{$APP.LBL_CANCEL_BUTTON_LABEL}'
        />
    </div>
</form>



