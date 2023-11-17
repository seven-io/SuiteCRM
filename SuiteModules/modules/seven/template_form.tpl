<form method='POST' action='index.php' enctype='multipart/form-data'>
    <input type='hidden' name='module' value='seven'/>
    <input type='hidden' name='action' value='template'/>

    <span class='error'>{$error.main}</span>

    <table>
        <tr>
            <td>{$MOD.LBL_SEVEN_ACTIVE}</td>
            <td>
                {if empty($config.seven_template_active)}
                    {assign var='seven_template_active' value=$seven_config.seven_template_active.default}
                {else}
                    {assign var='seven_template_active' value=$config.seven_template_active}
                {/if}

                <label for='seven_template_active_yes'>Yes</label>
                <input
                        id='seven_template_active_yes'
                        type='radio'
                        value='yes'
                        name='seven_template_active'
                        {if $seven_template_active =='yes'}checked{/if}
                />

                <label for='seven_template_active_no'>No</label>
                <input
                        id='seven_template_active_no'
                        type='radio'
                        name='seven_template_active'
                        value='no'
                        {if $seven_template_active =='no'}checked{/if}
                />
            </td>
        </tr>

        <tr>
            <td><label for='description'>{$MOD.LBL_SEVEN_TEXT}</label>
            </td>
            <td>
                {if empty($config.seven_template_body)}
                    {assign var='seven_template_body' value=$seven_config.seven_template_body.default}
                {else}
                    {assign var='seven_template_body' value=$config.seven_template_body}
                {/if}

                <textarea
                        cols='80'
                        id='description'
                        style='height: 1.6.em; overflow-y:auto; font-family:sans-serif,monospace; font-size:inherit;'
                        name='seven_template_body'
                        rows='10'
                        tabindex='0'
                >{$seven_template_body}</textarea>
            </td>
        </tr>
    </table>

    <p>
        <span class='text-danger'>Notice: </span>
        If active, an SMS gets sent when a new <i>Contact</i> gets created.
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
                class='button' type='button' name='cancel'
                onclick='document.location.href="index.php?module=Administration&action=index"'
                value='{$APP.LBL_CANCEL_BUTTON_LABEL}'
                title='{$MOD.LBL_CANCEL_BUTTON_TITLE}'
        />
    </div>
</form>



