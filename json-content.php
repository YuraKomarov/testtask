<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent(
    "komarov:ddemo.list",
    "",
    Array(
        "IBLOCK_ID" => 2,
        "JSON" => true,
        "GET" => $_GET,
    )
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>