Фильтрация по годам
=======================

Простая фильтрация по годам и месяцам

Установка
==================
Создайте или обновите ``composer.json`` файл и запустите ``php composer.phar update``
``` json
  {
      "require": {
          "citfact/filter.year": "dev-master"
      }
  }
```

Пример использования
==================

``` php
  $APPLICATION->IncludeComponent(
      'citfact:filter.year',
      '.default',
      array(
          'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
          'IBLOCK_ID' => $arParams['IBLOCK_ID'],
          'FILTER_NAME' => 'arrFilterNews',
      )
  );
```
