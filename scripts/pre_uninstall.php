<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

function pre_uninstall() {
    require_once 'modules/ModuleBuilder/parsers/ParserFactory.php';

    foreach (['detailview', 'editview'] as $view) {
        $parser = ParserFactory::getParser($view, 'Users');

        if (isset($parser->_viewdefs['panels']['LBL_SMS77_PANEL'])) {
            unset($parser->_viewdefs['panels']['LBL_SMS77_PANEL']);

            $parser->handleSave(false);
        }
    }
}

