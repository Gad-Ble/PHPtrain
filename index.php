<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lesson</title>
</head>

<body>
    <div>
        <h2>Подключение файлов</h2>
        <p>Подключить файлы можно несколькими способами:</p>
        <ul>
            <li><b>include</b> - позволяет дальше выполнять код, даже при отсутствии файла.</li>
            <li><b>require</b> - выдает фатальную ошибку и не дает дальнейшему коду выполняться.</li>
            <li>При добавлении ключевого слова<b>_once</b> - код будет проверять - подключался ли файл ранее и выведет его лишь один раз.</li>
        </ul>
        <pre>
            require_once 'script.php';
            require_once 'utilits/script.php';
        </pre>
        <p>Все пути указываются относительно <b>index.php</b></p>
    </div>

    <div>
        <h2>ТИПЫ ДАННЫХ</h2>
        <h3>Четыре скалярных типа:</h3>
        <ul>
            <li>boolean - логический;</li>
            <li>integer - целое число;</li>
            <li>float(double) - число с плавающей точкой;</li>
            <li>string - строка;</li>
        </ul>
        <h3>Два смешанных типа:</h3>
        <ul>
            <li>array - массив;</li>
            <li>object - экземпляр класса;</li>
        </ul>
        <h3>Два специальных типа:</h3>
        <ul>
            <li>resource - ссылка на внешний по отношении к скрипту источник данных (файл на диске, изображение в памяти и т.п.);</li>
            <li>NULL - отсутствие какого-либо значения;</li>
        </ul>
    </div>
    <div>
        <h2>Объявление переменной</h2>
        <p>Переменная объявляется знаком <b>$</b>. <br>
            Например: <b>$num</b>
        </p>
        <p>
            Переменная, которой не присвоено значение выводится как <b>Notice</b>, что является ошибкой. <br>
            Чтоб включить проверку на ошибки, нужно ввести: <b>ini_set('error_reporting', E_ALL);</b>
        </p>
        Чтоб уничтожить переменную, нужно применить функцию <b>unset();</b><br>
        Например: <b>unset($var);</b>
        </p>

    </div>
    <div>
        <h2>Проверка переменных</h2>
        <ul>
            <li><b>isset()</b> - проверка, существует ли переменная. Если да, то получим 1, если нет - то ничего не получим. <br>
                Например: <b>isset($var)</b>
            </li>
            <li><b>empty()</b> - проверка, существует ли переменная. Если нет, то получим 1, если да - то ничего не получим. <br>
                Например: <b>isset($var)</b>
            </li>
            <li><b>gettype()</b> - проверяет тип переменной. (Возвращает результат в виде строкового значения) <br>
                Например: <b>gettype($var)</b>
            </li>
            <li><b>is_int()</b> - проверка на конкретный тип переменной (тип указывается после нижнего подчеркивания (_)). <br>
                Например: <b>is_int($var)</b>
            </li>
        </ul>
        <h3>Пример применения проверки переменной</h3>
        <pre>
            if(isset($var)){
                echo "Переменная существует";
            }
        </pre>
    </div>
    <div>
        <h2>Классы и объекты</h2>
        <p>Для объявления класса используется зарезервированное слово: <b>class</b></p>
        <P>Также для указания области видимости есть ключевые слова:</P>
        <ul>
            <li><b>public (общедоступный)</b> - разрешен отовсюду.</li>
            <li><b>protected (защищенный) - разрешает доступ самому классу, наследующим его классам и родительским классам.</b></li>
            <li><b>private (закрытый) - ограничивает область видимости так, что только класс, где объявлен сам элемент, имеет к нему доступ.</b></li>
        </ul>
        <pre>
            class SomePeople {
                public $age;
                public $name;
            }
        </pre>
        <p>Класс создает конструкцию переменных, по которой в дальнейшем можно будет создавать объект, с помощью ключевого слова new и указания имени класса. Например</p>
        <pre>
            $nick = new SomePeople();
            $nick->age = 30;
            $nick->name = "Nick";
        </pre>
        <p>Также можно задать и статическую переменную класса, к которой можно обратиться даже не создавая переменной на его основе:</p>
        <pre>
            class SomePeople {
                public $age;
                public $name;
                public static $people = 1;
            }
            </pre>
    </div>

    <div>
        <h2>Копирование в PHP</h2>
        <p>При копировании методом присваивания:</p>
        <pre>
            $nick = 10;
            $dave = $nick;
        </pre>
        <p>переменная не занимает отдельную ячейку в оперативной памяти, и даже при дальнейшем изменении первой переменной - меняется и вторая.</p>
        <p>Чтобы этого избежать, применяется ключевое слово <b>clone</b>:
        <pre>
             $nick = 30;
             $dave = clone $nick;
        </pre>
        Такая конструкция создает новую ячейку в оперативной памяти и присваивает значение первой переменной, а не обращается каждый раз к его значению.
        </p>
    </div>
    <div>
        <h2>Константы</h2>
        <p><b>Константа</b> - это переменная, которую нельзя изменить.</p>
        <p>Конструкция создания константы выглядит следующим образом: <b>define(name, value);</b>, а также <b>const NAME = "name";</b></p>
        <p>Имя константы принято записывать в верхнем регистре, т.к. это обозначает её неизменность.</p>
        <pre>
            define('PI', 3.14);
            const NAME = "name";
        </pre>
        <p>Имя константы регистрозависимо, чтоб отменить зависимость от регистра, нужно добавить третье булевое значение - <b>true</b></p>
        <pre>
            define('PI', 3.14, true);
            echo pi;
        </pre>
        <p>При таком обращении к константе, ошибки не будет</p>
        <p>Проверка на наличие константы: <b>defined('name');</b> Возвращает либо <b>true</b>, либо <b>false</b></p>
        <h2>Предопределенные константы</h2>
        <ul>
            <li><b>__LINE__</b> - показывает какая текущая строка, с которой мы работаем</li>
            <li><b>__FILE__</b> - показывает путь файла</li>
            <li><b>__FUNCTION__</b> - показывает имя функции</li>
            <li><b>__CLASS__</b> - показывает имя класса</li>
            <li><b>__METHOD__</b> - показывает имя метода</li>
            <li><b>__DIR__</b> - показывает текущую директорию в котором расположен скрипт</li>
            <li><b>PHP_VERSION</b> - версия интерпритатора</li>
            <li><b>PHP_OS</b> - версия ОС</li>
            <li><b>PHP_EOL</b> - символ конца строки, используемый на текущей платформе</li>
        </ul>
    </div>
    <div>
        <h2>Массивы</h2>
        <p>Массивы можно объялять 2-мя способами:</p>
        <ul>
            <li>$array = array(val1, val2, ...);</li>
            <li>$array = [val1, val2, ...];</li>
        </ul>
        <h2>Функции для работы с массивами:</h2>
        <p>Слияние массивов:</p>
        <pre>
        $arr1 = [1, 2, 3];
        $arr1 = [4, 5, 6];
        $array = array_merge($arr1, $arr2, ...);
    </pre>
        <p>Проверка существования значения массива:</p>
        <pre>
            $arr = [1,2,3,4,5,6];
            for ($i=0; $i<8; $i++) {
                if (isset($arr[$i])){
                    echo "Элемент массива \$arr[$i] существует";
                } else {
                    echo "Элемент массива \$arr[$i] не существует";
                }
            }
    </pre>
        <p>Проверка является ли переменная массивом:</p>
        <pre>
        $arr = [1,2,3];
        if (is_array($arr)){
            echo "переменная является массивом";
        } else {
            echo "переменная не является массивом";
        }
    </pre>
        <p>Проверка существования определенного значения в массиве:<br>
            <b>in_array(val, array, true</b> <br>
            <b>true</b> - вконце записи добавляет проверку по типу (по умолчанию <b>false</b>)
        </p>

        <pre>
            $arr = [1,2,3,4,5,6];
            if(in_array(2, $arr, true)){
                echo "Существует";
            } else {
                echo "Не существует";
            }
        </pre>
        <p>Поиск ключа в массиве: <b>array_key_exists($key, $array)</b></p>
        <pre>
        $array = [1,2,3,4,5,6, 8 => 6];
        if (array_key_exists(8, $array)) {
            echo "Такой ключ есть в массиве";
        } else {
            echo "Такого ключа нет в массиве";
        }
        </pre>
        <p>Удаление массива или его элемента:</p>
        <pre>
            $arr1= [1,2,3];
            $arr2 = [4,5,6];
            unset($arr1); // Удаление массива
            unset($arr2[ind]); // Удаление элемента массива. Где ind - индекс элемента
        </pre>
    </div>
    <div>
        <h2>Самооткрытия:</h2>
        <p>Для преобразования строки в массив по указанию распределителя используется функция <b>explode(separator, $string, $limit)</b> <br>
            <b>separator</b> - это разделитель; <br>
            <b>$string</b> - переменная, в которой содержится строка;
            <b>$limit</b> - лимит длины строки. (необязательный параметр).
        </p>
        <p><b>array_reverse($array)</b> изменяет порядок массива задом наперед по ключу</p>
        <p><b>strtolower($string)</b> - преобразует каждый символ строки в нижний регистр</p>
        <p><b>strrev($str)</b> - разворачивает строку задом наперед</p>
        <p><b>str_split($str)</b> - разбивка строки по символам</p>
        <p><b>substr_count(string $haystack,string $needle,int $offset = 0, ?int $length = null): int</b> - Возвращает число вхождений подстроки:</p>
        <ul>
            <li><b>$haystack</b> - Строка, в которой ведётся поиск;</li>
            <li><b>$needle</b> - Искомая подстрока</li>
            <li><b>$offset</b> - Смещение начала отсчёта. Если задано отрицательное значение, отсчёт позиции будет произведён с конца строки.</li>
            <li><b>$length</b> - Максимальная длина строки, в которой будет производится поиск подстроки после указанного смещения. Если сумма смещения и максимальной длины будет больше длины haystack, то будет выведено предупреждение. Отрицательное значение будет отсчитываться с конца haystack.</li>
        </ul>
        <p><b>strlen</b> - отображает длину строки. Можно также обратиться другим образом: <b>$str[-1]</b></p>
        <p><b>preg_match_all</b> — Выполняет глобальный поиск шаблона в строке:
            <b>preg_match_all(
                string $pattern,
                string $subject,
                array &$matches = null,
                int $flags = 0,
                int $offset = 0
                ): int|false</b> <br>
            <b>pattern</b>
            Искомый шаблон в виде строки. <br>
            <b>subject</b>
            Входная строка.<br>
            <b>matches</b>
            Массив совпавших значений, отсортированный в соответствии с параметром flags.<br>
            <b>flags</b>
            Может быть комбинацией следующих флагов (обратите внимание, указывать флаг PREG_PATTERN_ORDER одновременно с флагом PREG_SET_ORDER бессмысленно):<br>
            <b>PREG_PATTERN_ORDER</b>
            Упорядочивает результаты так, что элемент $matches[0] содержит массив полных вхождений шаблона, элемент $matches[1] содержит массив вхождений первой подмаски и т. д.<br>
            Например: <br>
        <pre>
        preg_match_all('/[aeiou]/i', $str);
        </pre>
        Этот код подсчитает указанное кол-во указанных букв в строке.
        </p>


    </div>

    <?php
    function getCount($str)
    {
        $vowelsCount = 0;
        $array = ['a', 'e', 'i', 'o', 'u', 'y'];
        foreach ($array as $letter) {
            $vowelsCount += substr_count($str, $letter);
        }

        return $vowelsCount;
    }
    echo getCount('my pyx');
    ?>
</body>

</html>