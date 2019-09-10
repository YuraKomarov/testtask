<?php

use \Bitrix\Main\Loader;

class ddemoContent extends CBitrixComponent
{
    private function checkModules()
    {
        if(!Loader::includeModule("iblock")){
            return false;
        }
        return true;
    }

    private function getAllRecords()
    {
        $iblockId = $this->arParams['IBLOCK_ID'];

        if($this->checkModules()){
            $arSelect = [];
            $allItems = [];
            $arFilter = ["IBLOCK_ID"=>$iblockId, "ACTIVE"=>"Y"];
            $res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);

            while($ob = $res->GetNextElement()){
                $arFields = $ob->GetFields();
                $allItems[] = $arFields;
            }
            return $allItems;
        }
        return false;
    }

    public function executeComponent()
    {
        $this->arResult = $this->getAllRecords();

        $this->includeComponentTemplate();
    }
}