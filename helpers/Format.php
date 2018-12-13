<?php
class Format {

    public function textShorten($text, $limit = 400) {
        $text = $text. "";
        $text = substr($text, 0, $limit);//$text inside is the first $text, line above; 0 está em ""
        $text = $text. "...";
        return $text;

    }

    public function validation($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}
?>
