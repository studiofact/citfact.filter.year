<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$GLOBALS['APPLICATION']->AddHeadScript($templateFolder . '/script.js');
$GLOBALS['APPLICATION']->SetAdditionalCSS($templateFolder . '/style.css');
?>

<div class="row">
    <div class="col-sm-12 filter-year">
        <div class="row-one table-emulate">
            <? foreach ($arResult['FILTER'] as $year => $month): ?>
                <a class="cell-emulate item<?= ($year == $arResult['YEAR']) ? ' active' : '' ?>"
                   href="?<?= http_build_query(array_merge($_GET, array('FILTER_YEAR' => $year))) ?>"><?= $year ?></a>
            <? endforeach; ?>
        </div>
        <div class="row-one table-emulate">
            <? foreach ($arResult['FILTER'][$arResult['YEAR']] as $month): ?>
                <a class="cell-emulate item<?= ($month['QUERY'] == $arResult['MONTH']) ? ' active' : '' ?>"
                   href="?<?= http_build_query(array_merge($_GET, array('FILTER_MONTH' => $month['QUERY']))) ?>"><?= $month['VIEW'] ?></a>
            <? endforeach; ?>
        </div>
    </div>
</div>