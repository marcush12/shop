<?php
class Format {

    public function formatDate($date){
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');//ótimo para Br
        date_default_timezone_set('America/Sao_Paulo');
        echo strftime(' %d de %B de %Y', strtotime($date));//acrescentar %A, para dia da semana

        //return date('F j, Y, g:i a', strtotime($date));//in English
    }

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
