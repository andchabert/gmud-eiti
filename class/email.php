<?php

/*
  Class  to send email easily with function mail
 */

class Email {

    private $from;
    private $reply;
    private $message;
    private $cc;
    private $bcc;
    private $to;
    private $subject;
    private $attachment;

    public function __construct($data = array()) {

        $this->clear();

        if (isset($data["from"])) {

            $this->setFrom($data["from"]);
        }

        if (isset($data["reply"])) {

            $this->setReply($data["reply"]);
        }

        if (isset($data["message"])) {

            $this->setMessage($data["message"]);
        }

        if (isset($data["cc"])) {

            $this->setCc($data["cc"]);
        }

        if (isset($data["bcc"])) {

            $this->setBcc($data["bcc"]);
        }

        if (isset($data["to"])) {

            $this->setTo($data["to"]);
        }

        if (isset($data["subject"])) {

            $this->setSubject($data["subject"]);
        }

        if (isset($data["attachment"])) {

            $this->setAttachment($data["attachment"]);
        }


        return $this;
    }

    public function clear() {

        $this->from = "";
        $this->reply = "";
        $this->message = "";
        $this->cc = array();
        $this->bcc = array();
        $this->to = array();
        $this->subject = "";
        $this->attachment = array();

        return $this;
    }

    public function setFrom($from) {

        $this->from = $from;

        return $this;
    }

    public function setReply($reply) {

        $this->reply = $reply;

        return $this;
    }

    public function addCc($cc) {

        $this->cc[] = $cc;

        return $this;
    }

    public function setCc($cc) {

        if (is_array($cc)) {

            $this->cc = $cc;
        } else {

            $this->cc = array();

            $this->addCc($cc);
        }

        return $this;
    }

    public function addBcc($bcc) {

        $this->bcc[] = $bcc;

        return $this;
    }

    public function setBcc($bcc) {

        if (is_array($bcc)) {

            $this->bcc = $bcc;
        } else {

            $this->bcc = array();

            $this->addBcc($bcc);
        }

        return $this;
    }

    public function addTo($to) {

        $this->to[] = $to;

        return $this;
    }

    public function setTo($to) {

        if (is_array($to)) {

            $this->to = $to;
        } else {

            $this->to = array();

            $this->addTo($to);
        }

        return $this;
    }

    public function setSubject($subject) {

        $this->subject = $subject;

        return $this;
    }

    public function setMessage($message) {

        $this->message = $message;

        return $this;
    }

    public function addAttachment($attachment) {

        $this->attachment[] = $attachment;

        return $this;
    }

    public function setAttachment($attachment) {

        if (is_array($attachment)) {

            $this->attachment = $attachment;
        } else {

            $this->attachment = array();

            $this->addAttachment($attachment);
        }

        return $this;
    }

    public function send() {

        $headers = "MIME-Version: 1.0\n";

        if (!empty($this->from)) {
            $headers .= "From: " . $this->from . "\r\n";
        }

        if (!empty($this->reply)) {
            $headers .= "Reply-To: " . $this->reply . "\r\n";
        }

        foreach ($this->cc as $cc) {
            $headers .= "Cc: " . $cc . "\r\n";
        }

        foreach ($this->bcc as $bcc) {
            $headers .= "Bcc: " . $bcc . "\r\n";
        }

        $boundary = "XYZ-" . date("dmYis") . "-ZYX";
        $headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
        $headers .= "$boundary\n";

        $fullMessage = "--$boundary\n";
        $fullMessage .= "Content-Transfer-Encoding: 8bits\n";
        $fullMessage .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
        $fullMessage .= $this->message . "\n";

        foreach ($this->attachment as $a) {

            $fullMessage .= "--$boundary\n";
            $fullMessage .= "Content-Type: " . $a->getMimeType() . "\n";
            $fullMessage .= "Content-Disposition: attachment; filename=\"" . $a->getBasename() . "\"\n";
            $fullMessage .= "Content-Transfer-Encoding: base64\n\n";
            $fullMessage .= chunk_split(base64_encode($a->getFile())) . "\n";
        }

        $fullMessage .= "--$boundary\n";

        return mail(implode(",", $this->to), $this->subject, $fullMessage, $headers);
    }

    public function __toString() {

        return print_r($this, true);
    }

}

class AttachmentEmail {

    private $path;
    private $file;

    public function __construct($path) {

        $this->file = "";

        $this->path = $path;

        $fp = fopen($this->path, "rb");

        $this->file = fread($fp, $this->getFileSize());

        fclose($fp);
    }

    public function getFileSize() {

        return filesize($this->path);
    }

    public function getPath() {

        return $this->path;
    }

    public function getBasename() {

        return basename($this->path);
    }

    public function getMimeType() {

        return mime_content_type($this->path);
    }

    public function getFile() {

        return $this->file;
    }

    public function __toString() {

        return $this->path;
    }

}

// Ex1
//$email = new Email(array(
//    "from" => "from@email.com",
//    "to" => "to@email.com",
/*    "message" => "message",
    "subject" => "subject",
    "cc" => "cc@email.com",
    "bcc" => "bcc@email.com",
    "attachment" => array(new AttachmentEmail("Email.php"))
        ));

$email->send();


// Ex2
$email = new Email();

$email->setFrom("from@email.com");
$email->setReply("reply@email.com");
$email->setSubject("Subject");
$email->setMessage("message");
$email->addTo("to@email.com");
$email->addCc("cc@email.com");
$email->addBcc("bcc@email.com");
$email->addAttachment(new AttachmentEmail("Email.php"));
$email->send();


// Ex3
$email = new Email();

$email->setSubject("Subject")->setMessage("message")->addTo("to@email.com")->send();
*/