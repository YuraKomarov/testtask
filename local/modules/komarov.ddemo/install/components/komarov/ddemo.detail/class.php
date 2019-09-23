<?php

use \Bitrix\Main\Loader;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

class DdemoDetail extends CBitrixComponent implements Controllerable
{
    private function chekModules()
    {
        if(Loader::includeModule('iblock') && Loader::includeModule('highloadblock')){
            return true;
        }
        return false;
    }

    public function configureActions()
    {
        return [
            'test' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    new ActionFilter\HttpMethod(
                        array(ActionFilter\HttpMethod::METHOD_GET, ActionFilter\HttpMethod::METHOD_POST)
                    ),
                    new ActionFilter\Csrf(),
                ],
                'postfilters' => []
            ]
        ];
    }

    protected function listKeysSignedParameters()
    {
        return [
            'HL_ID',
            'CONTENT_ID'
        ];
    }

    public function getCommentsAction($showComments, $params){

        $signer = new \Bitrix\Main\Component\ParameterSigner;
        $parameters = $signer->unsignParameters($this->__name, $params);
        $hlId = $parameters['HL_ID'];

        $contentId = $parameters['CONTENT_ID'];

        if($showComments){
            if($this->chekModules()){
                $hlblock = HL\HighloadBlockTable::getById($hlId)->fetch();
                $entity = HL\HighloadBlockTable::compileEntity($hlblock);
                $entity_data_class = $entity->getDataClass();

                $rsData = $entity_data_class::getList(array(
                    'select' => array('*'),
                    'order' => array('ID' => 'ASC'),
                    'filter' => array('UF_CONTENT_ID' => $contentId)
                ));
                $allComments = [];

                while($arData = $rsData->Fetch()){
                    $allComments[] = $arData;
                }
                return $allComments;
            }
        }
        return false;

    }

    public function addCommentAction($comment, $params)
    {
        $signer = new \Bitrix\Main\Component\ParameterSigner;
        $parameters = $signer->unsignParameters($this->__name, $params);
        $hlId = $parameters['HL_ID'];
        $contentId = $parameters['CONTENT_ID'];
        if($this->chekModules()){
            $hlblock = HL\HighloadBlockTable::getById($hlId)->fetch();
            $entity = HL\HighloadBlockTable::compileEntity($hlblock);
            $entity_data_class = $entity->getDataClass();
            $data = [
                'UF_NAME' => $comment['name'],
                'UF_COMMENT' => $comment['text'],
                'UF_CONTENT_ID' => $contentId,
                'UF_DATE' => date('d.m.Y H:i:s')
            ];
            $result = false;
            if(!empty($data['UF_NAME'] && !empty($data['UF_COMMENT']))){
                $result = $entity_data_class::add($data);
            }

            if($result->isSuccess()){
                $allComments = [];

                $rsData = $entity_data_class::getList(array(
                    'select' => array('*'),
                    'order' => array('ID' => 'ASC'),
                    'filter' => array('UF_CONTENT_ID' => $contentId)
                ));

                while($arData = $rsData->Fetch()){
                    $allComments[] = $arData;
                }
                return $allComments;
            }
            return false;
        }
        return false;
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
            while($ob = $res->GetNextElement()) {
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