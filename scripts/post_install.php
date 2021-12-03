<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

function post_install() {
    require 'config.php';

    $url = $sugar_config['site_url'];

    require_once 'modules/Configurator/Configurator.php';
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';
    require_once 'modules/Administration/QuickRepairAndRebuild.php';

    foreach (['detailview', 'editview'] as $view) {
        $parser = ParserFactory::getParser($view, 'Users');

        if (!isset($parser->_viewdefs['panels']['LBL_SMS77_PANEL'])) {
            $parser->_viewdefs['panels']['LBL_SMS77_PANEL'] = [
                [
                    [
                        'name' => 'sms77',
                    ],
                ],
            ];

            $parser->handleSave(false);
        }
    }

    (new RepairAndClear)->repairAndClearAll(
        ['clearAll'],
        [translate('LBL_ALL_MODULES')],
        false,
        true
    );

    echo '<br /><p>Successfully installed module <strong>sms77</strong>!</p><br />';
}

