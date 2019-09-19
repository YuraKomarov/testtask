<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>
<?php
$APPLICATION->IncludeComponent(
    "komarov:ddemo.list",
    "",
    Array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "JSON" => false
    ),
    $component
);?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>