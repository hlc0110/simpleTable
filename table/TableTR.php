<?php

class TableTR extends AbstractTable 
{
    private $class;
    private $tds = array();

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }
    public function appendTD($tableTD) {
        $this->tds[] = $tableTD;
        return $this;
    }

    public function generalHtml() {
    	$class = $tdstr = "";
        if ($this->class) {
            $class = "class='{$this->class}'";
        }
        foreach ($this->tds as $td) {
            $tdstr .= $td->generalHtml();
        }
        return "<tr {$class}>{$tdstr}</tr>";
    }
}

?>