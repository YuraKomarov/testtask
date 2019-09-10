<?php

use \Bitrix\Main\Loader;

class ddemoContent extends CBitrixComponent
{
    private function chekModules()
    {
        die(123);
        if(!CModule::IncludeModule("iblock")){
            return false;
        }
        return true;
    }

    private function getAllRecords()
    {
        $iblockId = $this->arParams['IBLOCK_ID'];

        if($this->chekModules()){

            $arSelect = [];
            $arFilter = ["IBLOCK_ID"=>42, "ACTIVE"=>"Y"];
            $res = CIBlockElement::GetList([], $arFilter, false, [], $arSelect);
            $allItems = [];
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $allItems[] = $arFields;
            }
            return $allItems;
        }
        return false;
    }

    public function executeComponent()
    {
        Loader::includeModule('komarov.ddemo');
        $this->arResult = $this->getAllRecords();

        $this->includeComponentTemplate();
    }
}