<?php

/*
 * This file is part of the Studio Fact package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2132
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = array(
    'PARAMETERS' => array(
        'IBLOCK_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('IBLOCK_ID'),
            'TYPE' => 'STRING',
        ),
        'IBLOCK_TYPE' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('IBLOCK_TYPE'),
            'TYPE' => 'STRING',
        ),
        'FILTER_NAME' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('FILTER_NAME'),
            'TYPE' => 'STRING',
        ),
        'CACHE_TIME' => array(
            'DEFAULT' => 36000000
        ),
        'CACHE_GROUPS' => array(
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => Loc::getMessage('CACHE_GROUPS'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ),
    )
);
?>