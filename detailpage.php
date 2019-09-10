<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Детальная страница");
?>
<?
$contentId = (!empty($_GET['ID'])) ? $_GET['ID'] : '';
$APPLICATION->IncludeComponent(
    'komarov:ddemo.detail',
    '',
    Array(
        'CONTENT_ID' => $contentId,
        'IBLOCK_ID' => 2
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>