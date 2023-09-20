<?php
//Записываем все полученные данные и находящиеся в суперглобальном массиве $_POST в соответствующие переменные
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$password_hash = null;
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
} else {
    //Формируем хэш пароля, для последующего помещения его в базу данных
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}



$conn = include "./db.php"; //Подключаемся к базе данных
//---------------------------ПОЕХАЛИ------------------------------------
$stmt = $conn->prepare("INSERT INTO user (name, email, password_hash) VALUES (:name, :email, :password_hash) ");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password_hash', $password_hash);
$stmt->execute();
//Закрываем соединение
$conn = null;
$stmt = null;
//-------------------------ЗАЕБИСЬ!!!!!!-------------------------------------------------------------

//Теперь перенаправляем пользователя на страничку, сообщающую, что регистрация прошла успешно
header('Location: ./signup-successfull.html');