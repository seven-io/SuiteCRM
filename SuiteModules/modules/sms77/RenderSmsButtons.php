<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class RenderSmsButtons {
    public function render() {
        if (!$this->shouldRender()) return;

        echo '<head>
                    <title></title>
                    <script>window.siteUrl = ' . '"' . $GLOBALS['sugar_config']['site_url'] . '"' . ';</script>
                    <script src="modules/sms77/scripts/sms.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
                </head>';
    }

    private function shouldRender() {
        if (!empty($_REQUEST['to_pdf']) || !empty($_REQUEST['to_csv'])) return false;

        return !in_array($_REQUEST['module'], [
            'Emails',
            'ModuleBuilder',
            'Timesheets',
        ]);
    }
}
