<?php

require('init.php');
$app->getHeader();
?>

<pre>

    ------21.01.2022------
    1)Добавлены footer и header в шаблон страницы;
    2)Добавлена буферизация вывода шаблона;
    3)добавлен trait для главного класса Application;

    ------24.01.2022------
    1)Добавлен класс Page для сборки страницы и ее заголовоков;
    
    ------27.01.2022------
    1)Переписал подключение файла 'config.php' в классе Config;
    2)Переписал функцию автозагрузки классов в 'init.php';
    3)Переписаны методы буферизации в классе Application;
    4)Добавлены методы замены макросов(JS, CSS, TAG) в классах Page и Application;

    ------31.01.2022------
    1)Написал методы showProperty и setProperty в классе Page;

    ------01.02.2022------
    1)Дописал методы для работы с Property в классе Page;    

</pre>
<?php
    $app->pager->setProperty('h1' , 'Changelist');
    $app->pager->getAllReplace();
    $app->getFooter();