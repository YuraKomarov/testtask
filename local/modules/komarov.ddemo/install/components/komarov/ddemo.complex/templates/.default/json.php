<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->RestartBuffer();
$get = $_GET;
$APPLICATION->IncludeComponent(
    'komarov:ddemo.list',
    '',
    Array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'GET' => $get,
        'JSON' => true
    ),
    $component
);?>
