<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Детальная страница");
?>
<?php
$contentId = (!empty($_GET['ID'])) ? $_GET['ID'] : '';
$APPLICATION->IncludeComponent(
    'komarov:ddemo.detail',
    '',
    Array(
        'CONTENT_ID' => $contentId,
        'IBLOCK_ID' => 2,
        'HL_ID' => 2
    )
);?>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>