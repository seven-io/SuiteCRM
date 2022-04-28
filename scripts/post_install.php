<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

function post_install() {
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';
    require_once 'modules/Administration/QuickRepairAndRebuild.php';

    foreach ([
                 'Contacts',
                 'Leads',
                 //'Users'
             ] as $module) {
        $parser = ParserFactory::getParser('detailview', $module);

        if (!isset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING'])) {
            echo 'Adding tab definition for module ' . $module . '<br/>';

            $parser->_viewdefs['templateMeta']['includes'][] = [
                'file' => 'modules/sms77/scripts/sms.js',
            ];

            $parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING'] = [
                'newTab' => true,
                'panelDefault' => 'expanded',
            ];
        }

        if (!isset($parser->_viewdefs['panels']['lbl_sms77_panel_heading'])) {
            echo 'Adding panel for module ' . $module . '<br/>';

            $parser->_viewdefs['panels']['lbl_sms77_panel_heading'] = [
                [
                    [
                        'customCode' => '{include file=\'modules/sms77/tpls/sms_history.tpl\'}',
                        'label' => 'LBL_SMS77_MESSAGES',
                        'name' => 'sms77_sms_history',
                    ],
                ],
                [
                    [
                        'customCode' => '<button class=\'button\' onclick=\'sms77_suitecrm.openSmsDialog();\'>
                        {$MOD.LBL_SMS77_WRITE_SMS}
                    </button>',
                        'label' => 'LBL_SMS77_TEXT',
                        'name' => 'sms77_compose_sms',
                    ],
                ],
            ];
        }

        $parser->handleSave(false); //$parser->handleSave(false);
        /*
                if (!isset($parser->_viewdefs['panels']['LBL_SMS77_PANEL'])) {
                    $parser->_viewdefs['panels']['LBL_SMS77_PANEL'] = [
                        [
                            [
                                'name' => 'sms77',
                            ],
                        ],
                    ];
                }*/
    }

    (new RepairAndClear)->repairAndClearAll(
        ['clearAll'],
        [translate('LBL_ALL_MODULES')],
        false,
        true
    );

    echo '<br /><p>Successfully installed module <strong>sms77</strong>!</p><br />';
}

