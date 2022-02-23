<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require('Fw/init.php');

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();

$app->header();
$app->pager->addCss('Fw/Templates/Default/style.css');

$app->pager->addString('<title>Stage 2</title>');
try{
    $app->includeComponent(
        'Framework:CustomList',
        'default',
        [
            'List of somethings' => ['First item', 'Second item', 'Third item']
        ]
    );

    $app->includeComponent(
        'Framework:Form',
        'default',
        [
            'additional_class' => 'window--full-form',
            'id' => 'form',
            'attr' => [ 
                'data-form-id' => 'form-123'
            ],
            'method' => 'post',
            'action' => '', 
            'elements' => [ 
                [
                    'type' => 'multiple-text',
                    'name' => 'multiple-text',
                    'additional_class' => 'form-group',
                    'title' => 'Enter names of your family',
                    'attr' => [
                        'data-id' => '18'
                    ],
                    'fields' => [
                        [
                            'type' => 'text',
                            'name' => 'Names[]',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '191'
                            ]
                        ],
                        [
                            'type' => 'text',
                            'name' => 'Names[]',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '192'
                            ]
                        ]
                    ]
                ],
                [
                    'type' => 'password',
                    'name' => 'password',
                    'title' => 'Password',
                    'additional_class' => 'form-control',
                    'attr' => [
                        'data-id' => '193'
                    ]
                ],
                [
                    'type' => 'number',
                    'name' => 'number',
                    'additional_class' => 'form-control number',
                    'attr' => [
                        'data-id' => '19'
                    ],
                    'title' => 'Choose a number',
                    'min' => '10',
                    'max' => '100'
                ],
                [
                    'type' => 'select',
                    'name' => 'server',
                    'additional_class' => 'form-control',
                    'attr' => [
                        'data-id' => '20'
                    ],
                    'title' => 'Choose server',
                    'list' => [
                        [
                            'title' => 'Onliner',
                            'value' => 'onliner',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '188'
                            ],
                            'selected' => true
                        ],
                        [
                            'title' => 'TutBy',
                            'value' => 'tut',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '189'
                            ],
                        ]
                    ]
                ],
                [
                    'type' => 'multiple-select',
                    'name' => 'Car',
                    'multiple' => 'multiple',
                    'size' => '2',
                    'additional_class' => 'form-control',
                    'attr' => [
                        'data-id' => '21'
                    ],
                    'title' => 'Choose car',
                    'list' => [
                        [
                            'title' => 'Tesla',
                            'value' => 'tesla',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '211'
                            ],
                            'selected' => true
                        ],
                        [
                            'title' => 'Lamborghini',
                            'value' => 'lambo',
                            'additional_class' => 'form-control',
                            'attr' => [
                                'data-id' => '212'
                            ]
                        ]
                    ]
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'checkbox',
                    'title' => 'Choose',
                    'additional_class' => 'checkbox',
                    'attr' => [
                        'data-id' => '23'
                    ],
                    'boxes' => [
                        [
                            'type' => 'checkbox',
                            'name' => 'first',
                            'additional_class' => 'form-check-input',
                            'value' => 'first',
                            'attr' => [
                                'data-id' => '201'
                            ],
                            'title' => 'First'
                        ],
                        [
                            'type' => 'checkbox',
                            'name' => 'second',
                            'additional_class' => 'form-check-input',
                            'value' => 'second',
                            'attr' => [
                                'data-id' => '202'
                            ],
                            'title' => 'Second'
                        ]
                    ]
                ],
                [
                    'type' => 'radio',
                    'name' => 'radio',
                    'title' => 'Choose',
                    'additional_class' => 'radio',
                    'attr' => [
                        'data-id' => '25'
                    ],
                    'radios' => [
                        [
                            'type' => 'radio',
                            'name' => 'form-radio',
                            'additional_class' => 'form-check-input',
                            'value' => 'first',
                            'attr' => [
                                'data-id' => '251'
                            ],
                            'title' => 'First'
                        ],
                        [
                            'type' => 'radio',
                            'name' => 'form-radio',
                            'additional_class' => 'form-check-input',
                            'value' => 'second',
                            'attr' => [
                                'data-id' => '252'
                            ],
                            'title' => 'Second'
                        ]
                    ]
                ],
                [
                    'type' => 'textarea',
                    'name' => 'textarea',
                    'additional_class' => 'form-control',
                    'attr' => [
                        'data-id' => '26'
                    ],
                    'title' => 'Introduce yourself',
                    'min' => '0',
                    'max' => '250',
                    'placeholder' => 'Write something abot yourself:',
                    'rows' => '5',
                    'cols' => '40'
                ],
            ]
        ]
    );
    
}catch (Exception $e){
    echo "<h1>", $e->getMessage(), "</h1>", "\n";
}
?>

<pre id="report">
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
    1)Написал классы Base и Template;

    ------14.02.2022------
    1)Переработал методы классов Base и Template;
    2)Написал класс ListComponent(class.php) для компонента CustomList;
    
    ------15.02.2022------
    1)Написал шаблон компонента CustomList, а так же создал файл стилей для шаблона style.css;
    2)Написал класс-рендер в классе Template для отрисовки шаблона компонента и подключения необходимых файлов;

    ------16.02.2022------
    1)Переработал метод includeComponent класса Application;
    2)Переработал методы класса ListComponent для реализации компонента;

    ------18.02.2022-----
    1)Написан и добавлен комплексный компонент form;
    2)Описаны и добавлены мини-компоненты для комплексного компонента form;

    ------21.02.2022------
    1)Добавлен bootstrap;
    2)Оформлен header и footer;
    3)Написаны стили для компонентов;

</pre>
<?php
    
$app->footer();
    