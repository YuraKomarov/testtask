<?php

use \Bitrix\Main\Loader;

class DdemoContent extends CBitrixComponent
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

    private function getAllRecordsJson($get = [])
    {
        if(isset($get['PAGE_SIZE']) && isset($get['PAGE'])) {
            $pageSize =  $get['PAGE_SIZE'];
            $page = $get['PAGE'];
            $arNav = ['iNumPage' => $page, 'nPageSize' => $pageSize];
        }else{
            $arNav = false;
        }
        $iblockId = $this->arParams['IBLOCK_ID'];

        if($this->checkModules()){
            $arSelect = ['DATE_CREATE', 'NAME', 'PREVIEW_TEXT'];
            $allItems = [];
            $arFilter = ["IBLOCK_ID"=>$iblockId, "ACTIVE"=>"Y"];
            $res = CIBlockElement::GetList(['ID' => 'asc'], $arFilter, false, $arNav, $arSelect);

            $i = 0;
            while($ob = $res->GetNextElement()){
                $arFields = $ob->GetFields();
                $allItems[$i]['date'] = $arFields['DATE_CREATE'];
                $allItems[$i]['title'] = $arFields['NAME'];
                $allItems[$i]['preview'] = $arFields['PREVIEW_TEXT'];
                $i++;
            }
            $json = json_encode($allItems);
            echo "<pre>".print_r($json, true)."</pre>";exit();
        }
    }

    public function executeComponent()
    {
        if($this->arParams['JSON']){
            $this->getAllRecordsJson($this->arParams['GET']);
        }
        $this->arResult = $this->getAllRecords();

        $this->includeComponentTemplate();
    }
}