<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 07.07.2016
 * Time: 11:23
 */
/**
 * Для отправки писема
 * @param $to - кому
 * @param $from - от кого
 * @param $subject - тема
 * @param $headers - название
 * @param $body - текст сообщения
 */
function smart_mail($to, $from = '', $subject = '', $body = '', $headers = '')
{
    global $mailer;


    $mailer->isMail(); // Для отправки писем использует функцию mail()

    //по умолчанию от кого
    $from = ($from != '') ? $from : 'from@example.com';
    // объявить тему по умолчанию
    $subject = ($subject != '') ? $subject : 'Письмо с сайта';
    //Текст сообщения по умолчанию
    $body = ($body != '') ? $body : 'Текст письма с сайта';

// поменять имя пользователя
    $mailer->setFrom($from, ' Мейлер ');//Адрес отправителя

    if (is_array($to)) {
        foreach ($to as $email) {
            // проверка на соответствие email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // правильный email
                $mailer->addAddress($email); // Добавить получателя// пароль
            }
        }
    } else {
        if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
            // правильный email
            $mailer->addAddress($to); // Добавить получателя// пароль
        }
    }


    $mailer->Subject = $subject;
    $mailer->Body = $body;

    if (!$mailer->send()) {
        echo 'Сообщение не может быть отправлено';
        echo 'Ошибка: ' . $mailer->ErrorInfo;
    } else {
        echo 'Сообщение было отправлено';
    }
}