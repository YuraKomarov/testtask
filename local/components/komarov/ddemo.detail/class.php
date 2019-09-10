<?php

use \Bitrix\Main\Loader;

class ddemoContent extends CBitrixComponent
{
    private function chekModules()
    {
        if(!CModule::IncludeModule('iblock')){
            return false;
        }
        return true;
    }

    private function getOneRecord()
    {
        $contentId = $this->arParams['CONTENT_ID'];
        $iblockId = $this->arParams['IBLOCK_ID'];

        if($this->chekModules()){

            $arSelect = [];
            $arFilter = ['IBLOCK_ID'=>$iblockId, 'ACTIVE'=>'Y', 'ID' => $contentId];
            $res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);
            $item = [];
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $item[] = $arFields;
            }
            return $item;
        }
        return false;
    }

    public function executeComponent()
    {
        Loader::includeModule('komarov.ddemo');
        $this->arResult = $this->getOneRecord();

        $this->includeComponentTemplate();
    }
}