 <?php
// введенное слово с опечаткой
$input = 'patato';
 
// массив сверяемых слов
$words  = array('apple','pineapple','banana','orange',
                'radish','carrot','pea','bean','potato');
 
// кратчайшее расстояние пока еще не найдено
$shortest = -1;
 
// проходим по словам для нахождения самого близкого варианта
foreach ($words as $word) {
 
    // вычисляем расстояние между входным словом и текущим
    $lev = levenshtein($input, $word);
 
    // проверяем полное совпадение
    if ($lev == 0) {
 
        // это ближайшее слово (точное совпадение)
        $closest = $word;
        $shortest = 0;
 
        // выходим из цикла - мы нашли точное совпадение
        break;
    }
 
    // если это расстояние меньше следующего наименьшего расстояния
    // ИЛИ если следующее самое короткое слово еще не было найдено
    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $word;
        $shortest = $lev;
    }
}
 
echo "Вы ввели: $input\n";
if ($shortest == 0) {
    echo "Найдено точное совпадение: $closest\n";
} else {
    echo "Вы не имели в виду: $closest?\n";
}
 
?>
