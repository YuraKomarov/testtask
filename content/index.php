<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?php
$APPLICATION->IncludeComponent(
    'komarov:ddemo.complex',
    '',
    Array(
        'IBLOCK_ID' => 2,
        'HL_ID' => 11,
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/content/",
        "SEF_URL_TEMPLATES" => array(
            "list" => "/",
            "detail" => "/#content_id#",
        ),
    )
);?>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>