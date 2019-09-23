<?php
use Bitrix\Highloadblock\HighloadBlockTable as HL;

CModule::IncludeModule('iblock');
CModule::IncludeModule('highloadblock');

$res = CIBlock::GetList(
    Array(),
    Array(
        'ACTIVE'=>'Y',
    ), true
);
while($ar_res = $res->Fetch()) {
    $arIblockType[$ar_res['ID']] = '['.$ar_res['ID'].'] '.$ar_res['NAME'];
}

$hlBlock = HL::getList();
$allHlBlocks = [];

while ($row = $hlBlock->fetch())
{
    $allHlBlocks[$row['ID']] = $row['NAME'];
}

$arComponentParameters = array(
    'GROUPS' => array(
        'SETTINGS' => array(
            'NAME' => 'Настройки'
        ),
        'PARAMS' => array(
            'NAME' => GetMessage('PARAMS_PHR')
        ),
    ),
    'PARAMETERS' => array(
        'IBLOCK_ID' => array(
            'PARENT' => 'SETTINGS',
            'NAME' => 'Инфоблок компонента',
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'N',
            'VALUES' => $arIblockType,
            'REFRESH' => 'Y'
        ),
        'HL_ID' => array(
            'PARENT' => 'SETTINGS',
            'NAME' => 'HighloadBlock комментариев',
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'N',
            'VALUES' => $allHlBlocks,
            'REFRESH' => 'Y'
        ),
        'SEF_MODE' => array(
            'list' => array(
                'NAME' => 'Страница списка',
                'DEFAULT' => 'index.php',
                'VARIABLES' => array()
            ),
            'detail' => array(
                'NAME' => 'Детальная страница',
                'DEFAULT' => '#ELEMENT_ID#',
                'VARIABLES' => array()
            ),
            'json' => array(
                'NAME' => 'Страница в формате json',
                'DEFAULT' => 'json',
                'VARIABLES' => array()
            )

        ),
    )
);
