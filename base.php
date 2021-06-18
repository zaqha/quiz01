<?php


class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=db_story";
    private $root='root';
    private $password='123456';
    private $table;
    private $pdo;

    //construct接下來所有function以此資料表
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->password);
    }

    //arg=argument引數、參數 用來呼叫函式/ ...表不定參數
    public function all(...$arg){
        $sql="select * from $this->table ";    
        
        //if $arg有東西
        if(isset($arg[0])){
            //if $arg[0]是陣列 
            // ["欄位"=>"值","欄位"=>"值"]
            // where `欄位`='值' && `欄位`='值'
            //"欄位"=>"值" ===>`欄位`＝'值'
            foreach($arg[0] as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            //(空)&&(空) 一定要空白
            $sql=$sql . "where" . implode(" && ",$tmp);
            
        }else{
            // else當它是字串
            $sql=$sql . $arg[0];
        }

        if(isset($arg[1])){
            // 當它是字串
            $sql=$sql . $arg[1];
        }

        //沒參數的時侯 
        return $this->pdo->query($sql)->fetchAll();
    }
}

$db=new DB("user");
echo "<pre>";
print_r($db->all());
echo "</pre>";


$db2=new DB("stories");
echo "<pre>";
print_r($db2->all());
echo "</pre>";



// 考丙級``可省略(上癮號:表欄位、特殊用途) ''(單引號:字串) ""(字串or模板 變數)
?>