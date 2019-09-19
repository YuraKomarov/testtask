<?php

class DdemoComplex extends CBitrixComponent
{
    public function test()
    {
        $componentPage = 'list';
        if ($this->arParams['SEF_MODE'] == 'Y') {

            CModule::IncludeModule("iblock");

            global $APPLICATION;
            $r = $APPLICATION->GetCurPage(true);
            $e = explode('/', $r);
            if(is_numeric($e[2])){

                $arFilter = Array('ACTIVE'=>'Y', 'ID' => $e[2]);
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
                while($ar_res = $res->Fetch()) {
                    $id = $ar_res['ID'];
                }
                if($id){
                    $this->arResult['ELEMENT_ID'] = $id;
                    $componentPage = 'detail';
                }
                //echo "SERVER<pre>".print_r($componentPage, true)."</pre>";exit();
            }

        }
        return $componentPage;
    }


    public function executeComponent()
    {
        //Loader::includeModule('komarov.ddemo');
        $comp = $this->test();

        $this->includeComponentTemplate($comp);
    }
}