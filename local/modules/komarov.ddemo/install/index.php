<?php
//defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();
//use Bitrix\Main\Application;
//use Bitrix\Main\Loader;
//use Bitrix\Main\Localization\Loc;
//use Bitrix\Main\ModuleManager;
//use Maycat\D7dull\ExampleTable;
//Loc::loadMessages(__FILE__);
//if (class_exists('komarov_ddemo')) {
//    return;
//}
//class komarov_ddemo extends CModule
//{
//    /** @var string */
//    public $MODULE_ID;
//    /** @var string */
//    public $MODULE_VERSION;
//    /** @var string */
//    public $MODULE_VERSION_DATE;
//    /** @var string */
//    public $MODULE_NAME;
//    /** @var string */
//    public $MODULE_DESCRIPTION;
//    /** @var string */
//    public $MODULE_GROUP_RIGHTS;
//    /** @var string */
//    public $PARTNER_NAME;
//    /** @var string */
//    public $PARTNER_URI;
//    public function __construct()
//    {
//        $this->MODULE_ID = 'komarov.ddemo';
//        $this->MODULE_VERSION = '0.0.1';
//        $this->MODULE_VERSION_DATE = '2019-09-05 16:15:14';
//        $this->MODULE_NAME = Loc::getMessage('MODULE_NAME');
//        $this->MODULE_DESCRIPTION = Loc::getMessage('MODULE_DESCRIPTION');
//        $this->MODULE_GROUP_RIGHTS = 'N';
//        $this->PARTNER_NAME = "y.komarov";
//        $this->PARTNER_URI = "";
//    }
//    public function doInstall()
//    {
//        ModuleManager::registerModule($this->MODULE_ID);
//        $this->installDB();
//    }
//    public function doUninstall()
//    {
//        $this->uninstallDB();
//        ModuleManager::unregisterModule($this->MODULE_ID);
//    }
//    public function installDB()
//    {
//        if (Loader::includeModule($this->MODULE_ID)) {
//            ExampleTable::getEntity()->createDbTable();
//        }
//    }
//    public function uninstallDB()
//    {
//        if (Loader::includeModule($this->MODULE_ID)) {
//            $connection = Application::getInstance()->getConnection();
//            $connection->dropTable(ExampleTable::getTableName());
//        }
//    }
//}
//
//
////Class komarov_ddemo extends CModule
////{
////   var $MODULE_ID = "komarov.ddemo";
////   var $MODULE_NAME = "sdf";
////
////	    function DoInstall()
////	    {
////	        global $DB, $APPLICATION, $step;
////	        $APPLICATION->IncludeAdminFile(GetMessage("FORM_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/komarov.ddemo/install/step1.php");
////	    }
////
////	    function DoUninstall()
////        {
////            global $DB, $APPLICATION, $step;
////            $APPLICATION->IncludeAdminFile(GetMessage("FORM_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/komarov.ddemo/install/unstep1.php");
////
////        }
////}


IncludeModuleLangFile(__FILE__);

use \Bitrix\Main\ModuleManager;

Class komarov_ddemo extends CModule
{

    var $MODULE_ID = "komarov.ddemo";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "0.0.1";
        $this->MODULE_VERSION_DATE = "2019-09-05 16:15:14";
        $this->MODULE_NAME = "Komarov тестовое";
        $this->MODULE_DESCRIPTION = "Тестовый модуль для разработчиков, можно использовать как основу для разработки новых модулей для 1С:Битрикс";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        RegisterModule("komarov.ddemo");
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        UnRegisterModule("komarov.ddemo");
        return true;
    }

    function InstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/komarov.ddemo/install/db/install.sql");
        if (!$this->errors) {

            return true;
        } else
            return $this->errors;
    }

    function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/komarov.ddemo/install/db/uninstall.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }
}