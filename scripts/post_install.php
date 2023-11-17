<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

/** @noinspection PhpUnused */
function post_install() {
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';
    require_once 'modules/Administration/QuickRepairAndRebuild.php';

    foreach ([
                 'Accounts',
                 'Contacts',
                 'Employees',
                 'Leads',
             ] as $module) {
        $parser = ParserFactory::getParser('detailview', $module);

        if (!isset($parser->_viewdefs['templateMeta']['includes'])) {
            $parser->_viewdefs['templateMeta']['includes'] = [];
        }

        $idx = in_array(
            ['file' => 'modules/seven/scripts/sms.js'],
            $parser->_viewdefs['templateMeta']['includes']
        );

        if (false === $idx) {
            echo 'Adding includes for module ' . $module;

            $parser->_viewdefs['templateMeta']['includes'][] = [
                'file' => 'modules/seven/scripts/sms.js',
            ];
        }

        if (!isset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SEVEN_PANEL_HEADING'])) {
            echo 'Adding tab definition for module ' . $module . '<br/>';

            $parser->_viewdefs['templateMeta']['tabDefs']['LBL_SEVEN_PANEL_HEADING'] = [
                'newTab' => true,
                'panelDefault' => 'expanded',
            ];
        }

        if (!isset($parser->_viewdefs['panels']['lbl_seven_panel_heading'])) {
            echo 'Adding panel for module ' . $module . '<br/>';

            $parser->_viewdefs['panels']['lbl_seven_panel_heading'] = [
                [
                    [
                        'customCode' => '{include file=\'modules/seven/tpls/sms_history.tpl\'}',
                        'label' => 'LBL_SEVEN_MESSAGES',
                        'name' => 'seven_sms_history',
                    ],
                ],
                [
                    [
                        'customCode' => '<button class=\'button\' onclick=\'seven_suitecrm.openSmsDialog();\'>
                        {$MOD.LBL_SEVEN_WRITE_SMS}
                    </button>',
                        'label' => 'LBL_SEVEN_TEXT',
                        'name' => 'seven_compose_sms',
                    ],
                ],
            ];
        }

        $parser->handleSave(false);
    }

    (new RepairAndClear)->repairAndClearAll(
        ['clearAll'],
        [translate('LBL_ALL_MODULES')],
        false,
        true
    );

    echo '<br /><p>Successfully installed module <strong>seven</strong>!</p><br />';
}

