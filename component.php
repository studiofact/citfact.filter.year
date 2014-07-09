<?php

/*
 * This file is part of the Studio Fact package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$app = Application::getInstance();
$request = $app->getContext()->getRequest();

$filter['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
$filter['IBLOCK_TYPE'] = $arParams['IBLOCK_TYPE'];
$filter['ACTIVE'] = 'Y';

$elementListResult = CIBlockElement::GetList(array('ACTIVE_FROM' => 'DESC'), $filter, false, false, array('ID', 'ACTIVE_FROM'));
while ($element = $elementListResult->Fetch()) {
    $date = new DateTime($element['ACTIVE_FROM']);
    $currentYear = $date->format('Y');
    $currentMonth = $date->format('n');
    $arResult['FILTER'][$currentYear][$currentMonth] = array(
        'QUERY' => $currentMonth,
        'VIEW' => FormatDate('f', $date->getTimestamp()),
    );
}

foreach ($arResult['FILTER'] as $year => $month) {
    $arResult['FILTER'][$year] = array_reverse($month, true);
}

$queryYear = ($request->getQuery('FILTER_YEAR')) ?: 0;
$queryMonth = ($request->getQuery('FILTER_MONTH')) ?: 0;

$arResult['YEAR'] = (!isset($arResult['FILTER'][$queryYear]))
    ? array_keys($arResult['FILTER'])[0]
    : $queryYear;

$arResult['MONTH'] = (!isset($arResult['FILTER'][$arResult['YEAR']][$queryMonth]))
    ? array_keys($arResult['FILTER'][$arResult['YEAR']])[0]
    : $queryMonth;

$dateStart = mktime(0, 0, 0, $arResult['MONTH'], 1, $arResult['YEAR']);
$dateFinish = mktime(0, 0, 0, $arResult['MONTH'], 31, $arResult['YEAR']);
$GLOBALS[$arParams['FILTER_NAME']] = array(
    '>=DATE_ACTIVE_FROM' => date($GLOBALS['DB']->DateFormatToPHP(CLang::GetDateFormat('SHORT')), $dateStart),
    '<DATE_ACTIVE_FROM' => date($GLOBALS['DB']->DateFormatToPHP(CLang::GetDateFormat('SHORT')), $dateFinish),
);

$this->IncludeComponentTemplate();