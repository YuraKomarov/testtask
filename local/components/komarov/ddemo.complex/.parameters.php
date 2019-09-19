<?php
//use Bitrix\Highloadblock\HighloadBlockTable as HL;
//die(123);
//CModule::IncludeModule("iblock");
//CModule::IncludeModule("highloadblock");
//
//$res = CIBlock::GetList(
//    Array(),
//    Array(
//        'ACTIVE'=>'Y',
//    ), true
//);
//while($ar_res = $res->Fetch()) {
//    $arIblockType[$ar_res["ID"]] = "[".$ar_res["ID"]."] ".$ar_res["NAME"];
//}
//
//$hlBlock = HL::getList();
//$allHlBlocks = [];
//
//while ($row = $hlBlock->fetch())
//{
//    $allHlBlocks[$row['ID']] = $row['NAME'];
//}
//
//$arComponentParameters = array(
//    "GROUPS" => array(
//    ),
//    "PARAMETERS" => array(
//        "IBLOCK_ID" => array(
//            "PARENT" => "SETTINGS",
//            "NAME" => "Инфоблок компонента",
//            "TYPE" => "LIST",
//            "ADDITIONAL_VALUES" => "N",
//            "VALUES" => $arIblockType,
//            "REFRESH" => "Y"
//        ),
//        "HL_ID" => array(
//            "PARENT" => "SETTINGS",
//            "NAME" => "HighloadBlock комментариев",
//            "TYPE" => "LIST",
//            "ADDITIONAL_VALUES" => "N",
//            "VALUES" => $allHlBlocks,
//            "REFRESH" => "Y"
//        ),
//        "SEF_MODE" => array(
//            "list" => array(
//                "NAME" => "LIST PAGE",
//                "DEFAULT" => "/",
//                "VARIABLES" => array()
//            ),
//            "detail" => array(
//                "NAME" => "Детальная страница",
//                "DEFAULT" => "#ELEMENT_ID#/",
//                "VARIABLES" => array("ELEMENT_ID")
//            ),
//        ),
//    ),
//);

use Bitrix\Highloadblock\HighloadBlockTable as HL;

CModule::IncludeModule("iblock");
CModule::IncludeModule("highloadblock");

$res = CIBlock::GetList(
    Array(),
    Array(
        'ACTIVE'=>'Y',
    ), true
);
while($ar_res = $res->Fetch()) {
    $arIblockType[$ar_res["ID"]] = "[".$ar_res["ID"]."] ".$ar_res["NAME"];
}

$hlBlock = HL::getList();
$allHlBlocks = [];

while ($row = $hlBlock->fetch())
{
    $allHlBlocks[$row['ID']] = $row['NAME'];
}

$arComponentParameters = array(
    "GROUPS" => array(
        "SETTINGS" => array(
            "NAME" => "Настройки"
        ),
        "PARAMS" => array(
            "NAME" => GetMessage("PARAMS_PHR")
        ),
    ),
    "PARAMETERS" => array(
        "IBLOCK_ID" => array(
            "PARENT" => "SETTINGS",
            "NAME" => "Инфоблок компонента",
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "N",
            "VALUES" => $arIblockType,
            "REFRESH" => "Y"
        ),
        "HL_ID" => array(
            "PARENT" => "SETTINGS",
            "NAME" => "HighloadBlock комментариев",
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "N",
            "VALUES" => $allHlBlocks,
            "REFRESH" => "Y"
        ),
        "VARIABLE_ALIASES" => array(
            "IBLOCK_ID" => array(
                "NAME" => GetMessage("CATALOG_ID_VARIABLE_PHR"),
            ),
            "SECTION_ID" => array(
                "NAME" => GetMessage("SECTION_ID_VARIABLE_PHR"),
            ),
        ),
        "SEF_MODE" => array(
            "list" => array(
                "NAME" => 'Страница списка',
                "DEFAULT" => "/",
                "VARIABLES" => array()
            ),
            "detail" => array(
                "NAME" => 'Детальная страница',
                "DEFAULT" => "/#ELEMENT_ID#",
                "VARIABLES" => array()
            )
        ),
    )
);
