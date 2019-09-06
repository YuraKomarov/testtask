<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$aMenu = array(
array(
'parent_menu' => 'global_menu_content',
'sort' => 400,
'text' => "komarov тестовое",
'title' => "komarov тестовое",
'url' => 'perfmon_table.php?lang=ru&table_name=komarov_test',
'items_id' => 'menu_references'
)
);
return $aMenu;