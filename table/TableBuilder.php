<?php
require_once 'Table.php';

class TableBuilder {
    /**
     * 创建简单的TableTD对象
     * @param $txt td内的文字
     * @return void
     */
    public static function createSimpleTD($txt) {
        $td = new TableTD();
        $td->setTxt($txt);
        return $td;
    }

    public static function createSimpleTR() {
        return new TableTR();
    }

    public static function createSimpleTable() {
        return new Table();
    }
}
?>