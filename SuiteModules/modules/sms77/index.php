<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
if (!is_admin($current_user) && !defined('configurator_util')) sugar_die('Admin Only');

require_once 'modules/Configurator/Configurator.php';
require_once 'include/Sugar_Smarty.php';
require_once 'settings_form.php';

global $sugar_config, $mod_strings;

echo getClassicModuleTitle(
    $mod_strings['LBL_SMS77_TITLE'], $mod_strings['LBL_SMS77_TITLE']);

foreach (array_keys($settingsForm) as $k)
    if (!isset($sugar_config[$k])) $sugar_config[$k] = '';

$configurator = new Configurator;
$administration = new Administration;

if (!empty($_POST['save'])) {
    $configurator->saveConfig();

    $administration->saveConfig();

    header('Location: index.php?module=Administration&action=index');
}

$administration->retrieveSettings();

$sugar_smarty = new Sugar_Smarty;
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
$sugar_smarty->assign('APP_LIST', $app_list_strings);
$sugar_smarty->assign('config', $configurator->config);
$sugar_smarty->assign('sms77_config', $settingsForm);
$sugar_smarty->assign('error', $configurator->errors);
$sugar_smarty->display('modules/sms77/template_form_config.tpl');
