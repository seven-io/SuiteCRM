<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

function pre_uninstall() {
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';

    foreach ([
                 'Contacts',
                 'Leads',
                 //'Users'
             ] as $module) {
        $parser = ParserFactory::getParser('detailview', $module);

        $jsIdx = array_search(['file' => 'modules/sms77/scripts/sms.js'], $parser->_viewdefs['templateMeta']['includes']);
        echo '$jsIdx: ' . $jsIdx . '<br/>';
        $GLOBALS['log']->debug('$jsIdx ' . $jsIdx);

        if (false !== $jsIdx) unset($parser->_viewdefs['templateMeta']['includes'][$jsIdx]);

        $parser->_viewdefs['templateMeta']['includes'][] = [
            'file' => 'modules/sms77/scripts/sms.js',
        ];

        if (isset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING']))
            unset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING']);

        if (isset($parser->_viewdefs['panels']['LBL_SMS77_PANEL'])) {
            unset($parser->_viewdefs['panels']['LBL_SMS77_PANEL']);
        }

        $parser->handleSave(false);
    }
}

