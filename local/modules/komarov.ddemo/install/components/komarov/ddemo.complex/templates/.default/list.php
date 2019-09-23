<?php
$APPLICATION->SetTitle('Список');
?>
<?php
$APPLICATION->IncludeComponent(
    'komarov:ddemo.list',
    '',
    Array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'JSON' => false
    ),
    $component
);?>
