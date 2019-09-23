<?php

IncludeModuleLangFile(__FILE__);

use \Bitrix\Main\ModuleManager;
use Komarov\Ddemo\HlMigration;
use Komarov\Ddemo\LinkType;
use Bitrix\Main\EventManager;
use \Bitrix\Main\Loader;

Class komarov_ddemo extends CModule
{
    var $MODULE_ID;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        include(__DIR__.'/version.php');
        $this->MODULE_ID = 'komarov.ddemo';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = 'Komarov тестовое';
        $this->MODULE_DESCRIPTION = 'Этот модуль нужен только для того, чтобы обернуть в него компоненты(ну и потрениться))';
    }

    function DoInstall()
    {
        RegisterModule($this->MODULE_ID);
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        return true;
    }

    function DoUninstall()
    {
        UnRegisterModule($this->MODULE_ID);
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        return true;
    }

    function InstallEvents()
    {
        EventManager::getInstance()->registerEventHandler(
            'iblock',
            'OnIBlockPropertyBuildList',
            $this->MODULE_ID,
            'Komarov\\Ddemo\\LinkType',
            'GetUserTypeDescription'
        );
        return true;
    }

    function UnInstallEvents()
    {
        EventManager::getInstance()->unRegisterEventHandler(
            'iblock',
            'OnIBlockPropertyBuildList',
            $this->MODULE_ID,
            'Komarov\\Ddemo\\LinkType',
            'GetUserTypeDescription'
        );
        return true;
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/local/modules/komarov.ddemo/install/components/', $_SERVER['DOCUMENT_ROOT'].'/local/components', true, true);
        CopyDirFiles(__DIR__ . '/admin', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin');
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFiles($_SERVER['DOCUMENT_ROOT'].'/local/modules/komarov.ddemo/install/components/', $_SERVER['DOCUMENT_ROOT'].'/local/components');
        return true;
    }



    function InstallDB()
    {
        require($_SERVER['DOCUMENT_ROOT'] . '/local/modules/komarov.ddemo/install/db/hlMigration.php');
        $hlMigration = new HlMigration();
        $hlMigration->execute();
    }

    function UnInstallDB()
    {
        require($_SERVER['DOCUMENT_ROOT'] . '/local/modules/komarov.ddemo/install/db/hlMigration.php');
        $hlMigration = new HlMigration();
        $hlMigration->delete();
    }
}