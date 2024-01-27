
<?php
//!---- (PHP): Email:
//* отправка настроенным сервером:
mail("my@email.com", "subject", "body");

//* через phpmailer:
class MAILER extends PHPMailer{}
$m = new MAILER;

$m->From      = "from@example.com";
$m->FromName  = "fullname";
$m->Subject   = "subject";
$m->Body      = "this is the body";
$m->addReplyTo("reply@example.com", "reply address");
$m->addAttachment("/path/to/file.pdf", "filename.pdf");

if($m->send()){}

//* получение имейлов:
// открываем IMAP
$mail = imap_open('{mail.server.com:143}', 'username', 'password');

// или, открываем POP3 
$mail = imap_open('{mail.server.com:110/pop3}', 'username', 'password');

// получаем список заголовков
$headers = imap_headers($mail);

// получаем хедеры от последнего сообщения в ящике:
$last = imap_num_msg($mail);
$header = imap_header($mail, $last);

// получаем тело сообщения
$body = imap_body($mail, $last);

// закрываем соединение
imap_close($mail);

//* гугол мейл:
$yourEmail = "you@gmail.com";
$yourEmailPassword = "your password";
$mailbox = imap_open("{imap.gmail.com:993/ssl}INBOX", $yourEmail, $yourEmailPassword);
$mail = imap_search($mailbox, "ALL");
$mail_headers = imap_headerinfo($mailbox, $mail[0]);
$subject = $mail_headers->subject;
$from = $mail_headers->fromaddress;
imap_setflag_full($mailbox, $mail[0], "\\Seen \\Flagged");
imap_close($mailbox);
?>

