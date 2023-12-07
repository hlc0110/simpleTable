<?php
require_once './table/TableBuilder.php';


$tableHead = [
	-1 => '待处理',
	0 => '初始化',
	1 => '进行中',
	2 => '成功',
	3 => '失败',
];


$data = array(
	[
		'name' => '李XX',
		'detail' => [
			// 从数据库里统计的数，key 和$tableHead中的key是一致的，可以顺序不一致，后面会按key排序
			0 => 100,			// 初始化数据条数
			-1 => 500, 			// 待处理条数
			3 => 0,				// 失败条数
			2 => 30, 			// 成功条数
			1 => 89, 			// 进行中条数
		]
	],
	[
		'name' => '王XX',
		'detail' => [
			0 => 1,
			-1 => 3,
			3 => 5,
			2 => 7,
			1 => 9,
		]
	],
);

// 创建table
$table = TableBuilder::createSimpleTable();
$table->setCssStyle("
	table,table tr th, table tr td { border:1px solid #517bde;text-align: center;}
	.red{color:red;}
	.font-size-20{font-size:20px;}
	.width_90{width:90px;}
");


// 创建title行
$titleTR = TableBuilder::createSimpleTR();
$titleTD = TableBuilder::createSimpleTD("2023-12-01 XXXX统计");
$titleTD->setColSpan(6)->setClass('red font-size-20');		// 横跨6格,有两个css class 
$titleTR->appendTD($titleTD);

// 创建table表头
$headFirstTR = TableBuilder::createSimpleTR();

$employeeTD = TableBuilder::createSimpleTD('员工');
$employeeTD->setRowSpan(2);		// 竖着占两行
$headFirstTR->appendTD($employeeTD);

$subTitleTD = TableBuilder::createSimpleTD('统计详情');
$subTitleTD->setColSpan(5);
$headFirstTR->appendTD($subTitleTD);

$headSecondTR = TableBuilder::createSimpleTR();
ksort($tableHead);
foreach ($tableHead as $head) {
	$headTD = TableBuilder::createSimpleTD($head);
	$headTD->setClass('width_90');
	$headSecondTR->appendTD($headTD);
}

$table->appendTR($titleTR)->appendTR($headFirstTR)->appendTR($headSecondTR);

// 初始数据行
foreach ($data as $row) {
	$tr = TableBuilder::createSimpleTR();
	$td = TableBuilder::createSimpleTD($row['name']);
	$tr->appendTD($td);
	// 这一步是为了数据顺序和表头一一对应
	$detail = $row['detail'];
	ksort($detail);
	foreach ($detail as $count) {
		$td = TableBuilder::createSimpleTD($count);
		$tr->appendTD($td);
	}
	$table->appendTR($tr);
}


echo $table->generalHtml();
?>