<?php 
interface Save {
    public function insert($date);
}

class saveDb implements Save {
    protected function connectDb(){}
    public function insert($date){
        echo $date.' сохранено в БД <br>';
    }
}

class saveFile implements Save {
    protected function openFile(){}
    public function insert($date){
        echo $date.' сохранено в файл <br>';
    }
    protected function closeFile(){}
}

class saveSession implements Save {
    public function insert($date){
        echo $date.' сохранено в сессию <br>';
    }
}

////////////////////////////////////
class Date {

    public $date;
    
    public function __construct($date) {
        $this->date = $date;
    }
    
    // Save – интерфейс для сохранения данных, $obj – экземпляр одного из классов реализующих данный интерфейс.
    public function save(Save $obj){ 
        $date = $this->validate($this->date); //валидация
        $obj->insert($date); //вызов методов класса Db для сохранения
    }
    
    public function validate($date){
        // тут проверка данных
        return $date;
    }
}

$date = new Date('Контент');

$db = new saveDb();
$date->save($db); //Контент сохранено в БД 

$file = new saveFile();
$date->save($file); //Контент сохранено в файл 

$ses = new saveSession();
$date->save($ses); //Контент сохранено в сессию
 ?>