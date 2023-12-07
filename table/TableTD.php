<?php

class TableTD extends AbstractTable 
{
    private $txt;
    private $colSpan;
    private $rowSpan;
    // css class选择器名字
    private $class;

    public function setTxt($txt)
    {
        $this->txt = $txt;
        return $this;
    }

    public function setColSpan($colSpan)
    {
        $this->colSpan = $colSpan;
        return $this;
    }

    public function setRowSpan($rowspan)
    {
        $this->rowSpan = $rowspan;
        return $this;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function generalHtml() {
        $tdAttrstr = '';
        if ($this->class) {
            $class = "class='{$this->class}'";
            $tdAttrstr = $this->tdAttr($tdAttrstr, $class);
        }
        if ($this->colSpan) {
            $colSpan = "colspan='{$this->colSpan}'";
            $tdAttrstr = $this->tdAttr($tdAttrstr, $colSpan);
        }
        if ($this->rowSpan) {
            $rowSpan = "rowspan='{$this->rowSpan}'";
            $tdAttrstr = $this->tdAttr($tdAttrstr, $rowSpan);
        }
        $tdstr = "<td{$tdAttrstr}>{$this->txt}</td>";
        return $tdstr;
    }

    private function tdattr($oldAttr, $attr) {
        $newAttr = $oldAttr ? $oldAttr : '';
        $newAttr .= ' ' . $attr;
        return ' ' . trim($newAttr);
    }
}
?>