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
            ['file' => 'modules/seven/scripts/sms.js'],
            $parser->_viewdefs['templateMeta']['includes']
        );

        if (false !== $idx) {
            echo 'Removing includes for module ' . $module;
            unset($parser->_viewdefs['templateMeta']['includes'][$idx]);
        }

        $parser->_viewdefs['templateMeta']['includes'][] = [
            'file' => 'modules/seven/scripts/sms.js',
        ];

        if (isset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SEVEN_PANEL_HEADING'])) {
            echo 'Removing tabDefs for module ' . $module;
            unset($parser->_viewdefs['templateMeta']['tabDefs']['LBL_SEVEN_PANEL_HEADING']);
        }

        if (isset($parser->_viewdefs['panels']['LBL_SEVEN_PANEL'])) {
            echo 'Removing panels for module ' . $module;
            unset($parser->_viewdefs['panels']['LBL_SEVEN_PANEL']);
        }

        $parser->handleSave(false);
    }
}

