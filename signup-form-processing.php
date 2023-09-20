<?php
//Записываем все полученные данные и находящиеся в суперглобальном массиве $_POST в соответствующие переменные
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
//Проводим валидацию данных формы на стороне сетвера
if (strlen($name) < 1) {
    die("Name must be at least 1 character");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email is not valid email address");
}
//------------------------------------Произвоним валидацию введённого пароля-------------------------------------------------
// $uppercase = preg_match('@[A-Z]@', $password);
//Проверка наличия в пароле заглавных букв
// $lowercase = preg_match('@[a-z]@', $password);
//Проверка наличия в пароле строчных букв
// $number    = preg_match('@[0-9]@', $password);
//Проверка наличия в пароле чисел
// $specialChars = preg_match('@[^\w]@', $password);
//Проверка наличия в пароле специальных символов

// if (!$uppercase || !$lowercase || !$number || !$specialChars) {
//     die("Password should be at least 8 characters in length and should include at least one upper case letter, 
//     one number, and one special character");
// }
//-----------------------------------------------------------------------------------------------------------------------------

//Проверяем совпадает ли введённый пароль с подтверждением
if ($password !== $password_confirm) {
    die("Passwords does not matches!");
}


