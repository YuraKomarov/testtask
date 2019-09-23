<?php

class DdemoComplex extends CBitrixComponent
{
    public function test()
    {

        $arDefaultUrlTemplates404 = array(
            'list' => 'index.php',
            'detail' => '#ELEMENT_ID#',
            'json' => 'json'
        );

        if($this->arParams['SEF_MODE'] == 'Y')
        {
            $arVariables = array();
            
            $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($arDefaultUrlTemplates404, $this->arParams['SEF_URL_TEMPLATES']);
            $componentPage = CComponentEngine::ParseComponentPath($this->arParams['SEF_FOLDER'], $arUrlTemplates, $arVariables);
            $this->arResult['ELEMENT_ID'] = $arVariables['ELEMENT_ID'];

            return $componentPage;
        }
    }


    public function executeComponent()
    {
        $comp = $this->test();

        $this->includeComponentTemplate($comp);
    }
}