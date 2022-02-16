<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require('init.php');
$app->header();
$app->pager->addString('<title>Stage 2</title>');
try{
    $app->includeComponent(
        '\Fw\Components\Element:CustomList',
        'default',
        [
            'List of somethings' => ['First item', 'Second item', 'Third item']
        ]
    );
    
}catch (Exception $e){
    echo "<h1>", $e->getMessage(), "</h1>", "\n";
}
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
    
    ------02.02.2022------
    1)Переименовал trait ApplicationTrait в Singleton;
    2)Переписал метод restartBuffer класса Application;
    
    ------03.02.2022------
    1)Изменил имя переменной в методе endBuffer класса Application;
    2)Добавлена проверка на подключение ядра в header и footer;
    3)Переписал метод getConfig в классе Config;
    4)Переписал добавление метатегов в методе addString класса Page;
    5)Переименовал свойство класса Page customTags в customReplacements;
    6)Переписал методы добавления ссылок для стилей css и js скриптов в методах addJs, addCss в классе Page;
    7)Добавил три вспомогательных метода для получения макросов и их замен для js, css и meta tags в классе Page;
    8)Установил заголовок страницы через написанные методы добавления метатегов в head страницы;
    9)Переименовал методы getHeader и getFooter в классе Application;

    ------08.02.2022------
    1)Изменил запись макросов и значений для замены для скриптов JS, CSS стилей и метатегов;
    2)Переписал метод замены макросов на значения endBuffer в классе Application;

    ------09.02.2022------
    1)Начал третий этап;
    2)Создал класс Dictionary, реализующий интерфейсы IteratorAggregate, ArrayAccess, Countable;
    3)Создал классы Server и Request, наследуемые от Dictionary;
    4)Добавил создание экземпляров классов Server и Request при инициализации класса Application;

    ------10.02.2022------
    1)

</pre>
<?php
    
$app->footer();
    