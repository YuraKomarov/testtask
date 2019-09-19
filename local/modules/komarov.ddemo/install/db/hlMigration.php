<?php
namespace Komarov\Ddemo;

use Bitrix\Highloadblock\HighloadBlockTable as HL;
use \Bitrix\Main\Loader;
use CUserTypeEntity;

class HlMigration
{
    public function test()
    {
        echo 1; exit();
    }


    private $hlBlockCode = 'Comments';


    private function checkModules()
    {
        if(Loader::includeModule('highloadblock')){
            return true;
        }
        return false;
    }

    private function hlBlockCreate()
    {
        $highloadBlockData = array ( 'NAME' => $this->hlBlockCode, 'TABLE_NAME' => strtolower($this->hlBlockCode));
        $result = HL::add($highloadBlockData);
        $highLoadBlockId = $result->getId();

        if($highLoadBlockId){
            return $highLoadBlockId;
        }
        return false;
    }

    private function addFields($hlBlockId)
    {
        $typeEntity    = new CUserTypeEntity();

        $typeNameData    = array(
            'ENTITY_ID'         => 'HLBLOCK_'.$hlBlockId,
            'FIELD_NAME'        => 'UF_NAME',
            'USER_TYPE_ID'      => 'string',
            'XML_ID'            => 'XML_ID_NAME',
            'SORT'              => 500,
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'Y',
            'SHOW_FILTER'       => 'N',
            'SHOW_IN_LIST'      => '',
            'EDIT_IN_LIST'      => '',
            'IS_SEARCHABLE'     => 'N',
            'SETTINGS'          => array(
                'DEFAULT_VALUE' => '',
                'SIZE'          => '20',
                'ROWS'          => '1',
                'MIN_LENGTH'    => '0',
                'MAX_LENGTH'    => '100',
                'REGEXP'        => '',
            ),
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'Имя',
                'en'    => 'name',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'Имя',
                'en'    => 'name',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'Имя',
                'en'    => 'name',
            ),
            'ERROR_MESSAGE'     => array(
                'ru'    => 'Ошибка при заполнении пользовательского свойства "Имя"',
                'en'    => 'An error in completing the user field "Name"',
            ),
            'HELP_MESSAGE'      => array(
                'ru'    => '',
                'en'    => '',
            ),
        );

        $typeCommentData    = array(
            'ENTITY_ID'         => 'HLBLOCK_'.$hlBlockId,
            'FIELD_NAME'        => 'UF_COMMENT',
            'USER_TYPE_ID'      => 'string',
            'XML_ID'            => 'XML_ID_COMMENT',
            'SORT'              => 500,
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'Y',
            'SHOW_FILTER'       => 'N',
            'SHOW_IN_LIST'      => '',
            'EDIT_IN_LIST'      => '',
            'IS_SEARCHABLE'     => 'N',
            'SETTINGS'          => array(
                'DEFAULT_VALUE' => '',
                'SIZE'          => '20',
                'ROWS'          => '1',
                'MIN_LENGTH'    => '0',
                'MAX_LENGTH'    => '500',
                'REGEXP'        => '',
            ),
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'Комментарий',
                'en'    => 'Comment',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'Комментарий',
                'en'    => 'Comment',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'Комментарий',
                'en'    => 'Comment',
            ),
            'ERROR_MESSAGE'     => array(
                'ru'    => 'Ошибка при заполнении пользовательского свойства "Комментарий"',
                'en'    => 'An error in completing the user field "Comment"',
            ),
            'HELP_MESSAGE'      => array(
                'ru'    => '',
                'en'    => '',
            ),
        );

        $typeDateData    = array(
            'ENTITY_ID'         => 'HLBLOCK_'.$hlBlockId,
            'FIELD_NAME'        => 'UF_DATE',
            'USER_TYPE_ID'      => 'datetime',
            'XML_ID'            => 'XML_ID_DATE',
            'SORT'              => 500,
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'Y',
            'SHOW_FILTER'       => 'N',
            'SHOW_IN_LIST'      => '',
            'EDIT_IN_LIST'      => '',
            'IS_SEARCHABLE'     => 'N',
            'SETTINGS'          => array(
                'DEFAULT_VALUE' => '',
                'SIZE'          => '20',
                'ROWS'          => '1',
                'MIN_LENGTH'    => '0',
                'MAX_LENGTH'    => '0',
                'REGEXP'        => '',
            ),
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'Дата',
                'en'    => 'Date',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'Дата',
                'en'    => 'Date',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'Дата',
                'en'    => 'Date',
            ),
            'ERROR_MESSAGE'     => array(
                'ru'    => 'Ошибка при заполнении пользовательского свойства "Дата"',
                'en'    => 'An error in completing the user field "Date"',
            ),
            'HELP_MESSAGE'      => array(
                'ru'    => '',
                'en'    => '',
            ),
        );

        $typeContentIdData    = array(
            'ENTITY_ID'         => 'HLBLOCK_'.$hlBlockId,
            'FIELD_NAME'        => 'UF_CONTENT_ID',
            'USER_TYPE_ID'      => 'integer',
            'XML_ID'            => 'XML_ID_CONTENT_ID',
            'SORT'              => 500,
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'Y',
            'SHOW_FILTER'       => 'I',
            'SHOW_IN_LIST'      => '',
            'EDIT_IN_LIST'      => '',
            'IS_SEARCHABLE'     => 'Y',
            'SETTINGS'          => array(
                'DEFAULT_VALUE' => '',
                'SIZE'          => '20',
                'ROWS'          => '1',
                'MIN_LENGTH'    => '0',
                'MAX_LENGTH'    => '0',
                'REGEXP'        => '',
            ),
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'ID записи инфоблока',
                'en'    => 'IBlock record ID',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'ID записи инфоблока',
                'en'    => 'IBlock record ID',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'ID записи инфоблока',
                'en'    => 'IBlock record ID',
            ),
            'ERROR_MESSAGE'     => array(
                'ru'    => 'Ошибка при заполнении пользовательского свойства "ID записи инфоблока"',
                'en'    => 'An error in completing the user field "IBlock record ID"',
            ),
            'HELP_MESSAGE'      => array(
                'ru'    => '',
                'en'    => '',
            ),
        );

        $typeEntity->Add($typeNameData);
        $typeEntity->Add($typeCommentData);
        $typeEntity->Add($typeDateData);
        $typeEntity->Add($typeContentIdData);

        return true;
    }

    public function execute()
    {
        if($this->checkModules()){
            $hlBlockId = $this->hlBlockCreate();
            if($hlBlockId){
                $result = $this->addFields($hlBlockId);
            }
            return false;
        }
        return false;
    }

    private function getHlId()
    {
        $hlBlock = HL::getList([
            'filter' => ['=NAME' => $this->hlBlockCode]
        ])->fetch();
        if (!$hlBlock){
            $hlId = null;
        }else{
            $hlId = $hlBlock['ID'];
        }
        return $hlId;
    }

    public function delete()
    {
        if($this->checkModules()){
            $hlId = $this->getHlId();
            HL::delete($hlId);
        }
    }
}