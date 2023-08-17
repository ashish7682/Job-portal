<?php

function mailer($mail, $email, $msg)
{

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "deepdummy2021@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "dummydeep2021";
    //Set who the message is to be sent from
    $mail->setFrom('deepdummy2021@gmail.com', 'deepdummy2021@gmail.com');
    //Set an alternative reply-to address
    $mail->addReplyTo('deepdummy2021@gmail.com', 'deepdummy2021@gmail.com');
    //Set who the message is to be sent to
    $mail->addAddress($email, $email);
    //Set the subject line
    $mail->Subject = 'PASSWORD RESET FOR ONLINE JOB PORTAL SYSTEM';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($msg);
    //Replace the plain text body with one created manually
    $mail->AltBody = '';
    //send the message, check for errors
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}


//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}
