<?php
/**
* HTML5 Audio player module.
* 2020-2030 bplugins
*
* NOTICE OF LICENSE
*
* @author  bplugins <support@bplugins.com>
* @copyright 2020-2030 bplugins
* @license GPLv2 or later
*/

class InstallAndUninstallTable
{
    /**
    * Install table
    */
    public function installTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'audio` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(55) NOT NULL,
            `audio_link` varchar(50) NOT NULL,
            `audio_name` varchar(100) NOT NULL,
            `status` tinyint(1) NOT NULL,
            `repeat` varchar(15) NOT NULL,
            `muted` tinyint(1) NOT NULL,
            `auto_play` tinyint(1) NOT NULL,
            `player_width` varchar(15) NOT NULL,
            `show_fast_forward_button` tinyint(1) NOT NULL,
            `show_rewidnd_button` tinyint(1) NOT NULL,
            `seek_time` int(10) NOT NULL,
            `show_restart_button` tinyint(1) NOT NULL,
            `disable_progressbar` tinyint(1) NOT NULL,
            `hide_duration` tinyint(1) NOT NULL,
            `show_current_time` tinyint(1) NOT NULL,
            `hide_mute_button` tinyint(1) NOT NULL,
            `hide_volume_control` tinyint(1) NOT NULL,
            `show_setting_button` tinyint(1) NOT NULL,
            `hide_download_button` tinyint(1) NOT NULL,
            `preload` varchar(10) NOT NULL,
            `hook_position` varchar(10) NOT NULL,
            PRIMARY KEY (`id`)
            )ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';
          $res = Db::getInstance()->execute($sql);
        if (!$res) {
             return false;
        }
    }
    /**
    * Uninstall table
    */
    public function uninstallTable()
    {
        $query = 'SELECT audio_name FROM `'._DB_PREFIX_.'audio`';
        $results = Db::getInstance()->ExecuteS($query);
        if (count($results) > 0) {
            foreach ($results as $result) {
                if (file_exists(_PS_UPLOAD_DIR_.'audio/'.$result['audio_name'])) {
                    unlink(_PS_UPLOAD_DIR_.'audio/'.$result['audio_name']);
                }
            }
        }
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'audio`';
        $res = Db::getInstance()->execute($sql);
        if (!$res) {
            return false;
        }
    }
}
