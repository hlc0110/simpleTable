<?php
    require_once 'AbstractTable.php';
    require_once 'TableTR.php';
    require_once 'TableTD.php';
    /**
     * 表格类
     */
    class Table extends AbstractTable
    {
        private $html;
        private $tableTrArray = array();
        private $cssStyle;

        public function appendTR($tableTr) {
            $this->tableTrArray[] = $tableTr;
            return $this;
        }

        public function setCssStyle($cssStyle) {
            $this->cssStyle = "<style>".$cssStyle."</style>";
            return $this;
        }

        public function generalHtml() {
            $trStr = "";
            foreach ($this->tableTrArray as $tr) {
                $trStr .= $tr->generalHtml();
            }

            $css = $this->cssStyle ? $this->cssStyle : $this->defaultCssStyle();
            $this->html = $css . "<table>{$trStr}</table>";
            return $this->html;
        }

        private function defaultCssStyle() {
            return "
            <style>
                table,table tr th, table tr td { border:1px solid #517bde; }
            </style>
            ";
        }
    }
?>