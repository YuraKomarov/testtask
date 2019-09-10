<?php
namespace Komarov\Ddemo;

use Bitrix\Main\Loader;
Loader::includeModule("highloadblock");


class LinkType
{
    function GetUserTypeDescription()
    {

        return array(
            "PROPERTY_TYPE" => "E",
            "USER_TYPE" => "Link",
            "DESCRIPTION" => "Ссылка",
            "GetPropertyFieldHtml" => function($arProperty, $value, $strHTMLControlName){
                $id = $_GET['ID'];
                $hlCode = 'Comments';
                $hlBlock = \Bitrix\Highloadblock\HighloadBlockTable::getList([
                    'filter' => ['=NAME' => $hlCode]
                ])->fetch();
                if (!$hlBlock){
                    $hlId = null;
                }else{
                    $hlId = $hlBlock['ID'];
                }
                $url = '/bitrix/admin/highloadblock_rows_list.php?PAGEN_1=1&SIZEN_1=20&ENTITY_ID='.$hlId.'&lang=ru&set_filter=Y&adm_filter_applied=0&find_UF_CONTENT_ID='. $id;
                $link = '<a href="'.$url.'">Комментарии к записи</a>';

                return $link;
            }
        );

    }

}
