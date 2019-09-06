<?php
namespace Komarov\Ddemo;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;



class DataTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'komarov_test';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('DATA_ENTITY_ID_FIELD'),
            ),
            'TITLE' => array(
                'data_type' => 'text',
                'required' => true,
                'title' => Loc::getMessage('DATA_ENTITY_TITLE_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_SORT_FIELD'),
            ),
            'CREATED' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_CREATED_FIELD'),
            ),
        );
    }
}
