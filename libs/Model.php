<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Jiskit
 */
class Model {

    //put your code here
    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    function getSettings() {
        $info = $this->db->selectSingleData("SELECT * FROM settings");
        return $info;
    }

    function getStringBetween($string, $start, $end) {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0)
            return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function base64ToImageFile($base64String, $ext, $uploadDirectory) {
        $filenamePath = md5(time() . uniqid()) . "." . $ext;
        $decoded = base64_decode($base64String);
        file_put_contents($uploadDirectory . "/" . $filenamePath, $decoded);

        return $filenamePath;
    }

    public $toEmail = [];
    public $emailSubject;
    public $emailBody;
    public $emailAttach = [];
    public $errorInfo = '';

    public function sendLoginInfo() {
        $this->errorInfo = '';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP(true);
        $mail->Host = "localhost";
        $mail->SMTPDebug = 0;
        $mail->Port = 25; //465 or 587
        //$mail->SMTPSecure = 'ssl';
        //$mail->SMTPAuth = true;
        //Authentication
        $mail->Username = "localhost";
        //$mail->Username = "jigbashio@gmail.com";
        //$mail->Password = "*****************";
        $mail->addAddress($this->toEmail);
        $mail->setFrom("info@domain.com", ESTABLISHMENT);
        $mail->isHTML(true);
        $mail->Subject = $this->emailSubject;
        $body = preg_replace('/\\\\/', '', $this->emailBody);
        $mail->msgHTML($body);
        $mail->isHTML(true);
        if (!$mail->send()):
            $this->errorInfo = $mail->ErrorInfo;
            return false;
        endif;
        return true;
    }

    public function sendEmail($email, $name, $subject, $body) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP(true);
        $mail->Host = "localhost";
        $mail->SMTPDebug = 0;
        $mail->Port = 25; //465 or 587
        //$mail->SMTPSecure = 'ssl';
        //$mail->SMTPAuth = true;
        //Authentication
        $mail->Username = "localhost";
        //$mail->Username = "jigbashio@gmail.com";
        //$mail->Password = "********";
        $mail->addAddress('info@domain.com');
        $mail->setFrom($email, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->msgHTML(preg_replace('/\\\\/', '', $body));
        $mail->addReplyTo($email);
        $mail->AllowEmpty = true;
        $mail->isHTML(true);
        if (!$mail->send()):
            return $mail->ErrorInfo;
        endif;
        return 'send';
    }

}
