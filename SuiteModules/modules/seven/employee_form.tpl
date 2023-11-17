<form method='POST' action='index.php' enctype='multipart/form-data'>
    <input type='hidden' name='module' value='seven'/>
    <input type='hidden' name='action' value='employee'/>

    <span class='error'>{$error.main}</span>

    <table>
        <tr>
            <td>{$MOD.LBL_SEVEN_ACTIVE}</td>

            <td>
                {if empty($config.seven_employee_active)}
                    {assign var='seven_employee_active' value=$seven_config.seven_employee_active.default}
                {else}
                    {assign var='seven_employee_active' value=$config.seven_employee_active}
                {/if}

                <label for='seven_employee_active_yes'>{$MOD.LBL_SEVEN_YES}</label>
                <input
                        id='seven_employee_active_yes'
                        name='seven_employee_active'
                        type='radio'
                        value='yes'
                        {if $seven_employee_active =='yes'}checked{/if}
                />

                <label for='seven_employee_active_no'>{$MOD.LBL_SEVEN_NO}</label>
                <input
                        id='seven_employee_active_no'
                        name='seven_employee_active'
                        type='radio'
                        value='no'
                        {if $seven_employee_active =='no'}checked{/if}
                />
            </td>
        </tr>

        <tr>
            <td><label for='description'>{$MOD.LBL_SEVEN_TEXT}</label></td>
            <td>
                {if empty($config.seven_employee_body)}
                    {assign var='seven_employee_body' value=$seven_config.seven_employee_body.default}
                {else}
                    {assign var='seven_employee_body' value=$config.seven_employee_body}
                {/if}

                <textarea
                        cols='80'
                        id='description'
                        name='seven_employee_body'
                        rows='10'
                        style='height: 1.6.em; overflow-y:auto; font-family:sans-serif,monospace; font-size:inherit;'
                        tabindex='0'
                >{$seven_employee_body}</textarea>
            </td>
        </tr>
    </table>

    <p>
        <span class='text-danger'>{$MOD.LBL_SEVEN_NOTICE}: </span>
        {$MOD.LBL_SEVEN_SMS_ON_CREATION}
    </p>

    <p>
        <span class='text-danger'>{$MOD.LBL_SEVEN_PROPERTY_PLACEHOLDERS}:</span>
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



