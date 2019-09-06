<?php

namespace Komarov\Ddemo;


class Test{

    public static function get($cond = false) {
        $result = DataTable::getList(
            array(
                'select' => array('*')
            ));
        $row = $result->fetch();
        print "<pre>"; print_r($row); print "</pre>";
        return $row;
    }

}