<?php
$APPLICATION->SetTitle("Детальная страница");
?>
<?php
$APPLICATION->IncludeComponent(
    'komarov:ddemo.detail',
    '',
    Array(
        'CONTENT_ID' => $arResult['ELEMENT_ID'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'HL_ID' => $arParams['HL_ID'],
    ),
    $component
);?>
