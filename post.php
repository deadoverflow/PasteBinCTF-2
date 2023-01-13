<?php

class Paste {
    var $code;
    var $exec_ = 'You are previewing a shared paste';
    public function __construct($code) {
        $this->code = $code;
    }
    public function __wakeup() {
        eval('echo "' . $this->exec_ . '";');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_REQUEST['code'];
    $paste = new Paste($code);
    $paste_serialized = serialize($paste);
    $paste_encoded = base64_encode($paste_serialized);
    echo '<a href="share.php?paste='. $paste_encoded .'">Share the paste';
}

?>