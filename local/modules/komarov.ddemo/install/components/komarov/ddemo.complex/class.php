<?php

class DdemoComplex
{
    public function executeComponent()
    {
        Loader::includeModule('komarov.ddemo');
        $this->arResult = $this->getOneRecord();

        $this->includeComponentTemplate();
    }
}