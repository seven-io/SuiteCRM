<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

function pre_uninstall() {
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';

    foreach ([
                 'Contacts',
                 'Leads',
                 //'Users', // TODO add users messaging
             ] as $module) {
        $parser = ParserFactory::getParser('detailview', $module);

        $idx = array_search(
            ['file' => 'modules/sms77/scripts/sms.js'],
            $parser->_viewdefs['templateMeta']['includes']
        );

        if (false !== $idx) {
            echo 'Removing includes for module ' . $module;
            unset($parser->_viewdefs['templateMeta']['includes'][$idx]);
        }

        $parser->_viewdefs['templateMeta']['includes'][] = [
            'file' => 'modules/sms77/scripts/sms.js',
        ];

        if (isset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING'])) {
            echo 'Removing tabDefs for module ' . $module;
            unset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SMS77_PANEL_HEADING']);
        }

        if (isset($parser->_viewdefs['panels']['LBL_SMS77_PANEL'])) {
            echo 'Removing panels for module ' . $module;
            unset($parser->_viewdefs['panels']['LBL_SMS77_PANEL']);
        }

        $parser->handleSave(false);
    }
}

