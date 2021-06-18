<?php
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=db_story";
    private $root='root';
    private $password='123456';
    private $table;
    private $pdo;

    //設定建構式-接下來所有function以此資料表
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->password);
    }

    //取得全部資料的函式
    //arg=argument引數、參數 用來呼叫函式/ ...表不定參數
    public function all(...$arg){
        $sql="select * from $this->table ";    
        
        //判斷第一個參數是否存在
        if(isset($arg[0])){
            //if $arg[0]是陣列 
            // ["欄位"=>"值","欄位"=>"值"]
            // where `欄位`='值' && `欄位`='值'
            //"欄位"=>"值" ===>`欄位`＝'值'
            foreach($arg[0] as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            //組合條件語句字串
            //(空)&&(空) 一定要空白
            $sql=$sql . "where" . implode(" && ",$tmp);
            
        }else{
            // else當它是字串
            $sql=$sql . $arg[0];
        }

        //如果第二個參數存在，
        //則我們規定第二個參數為一個sql的語法字串
        //因此直接將語法字串接在$sql之後即可
        if(isset($arg[1])){
            // 當它是字串
            $sql=$sql . $arg[1];
        }

        //沒參數的時侯 
        return $this->pdo->query($sql)->fetchAll();
    }

    //計算筆數
    public function count(...$arg){
        $sql="select count(*) from $this->table ";
    
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                    $sql=$sql . " where " . implode(" && ",$tmp);
            }else{
                $sql=$sql . $arg[0];
            }
    
            if(isset($arg[1])){
                $sql=$sql . $arg[1];
            }
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    //取得單筆資料
    public function find($id){
        $sql="select * from $this->table ";
            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                    $sql=$sql . " where " . implode(" && ",$tmp);
            }else{
                $sql=$sql . " where `id`='$id'";
            }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    //刪除
    public function del($id){
        $sql="delete from $this->table ";
            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                    $sql=$sql . " where " . implode(" && ",$tmp);
            }else{

                $sql=$sql . " where `id`='$id'";
            }
        return $this->pdo->exec($sql);

    }

    //新增\更新資料
    public function save($array){
        if(isset($array['id'])){
            //update
                foreach($array as $key => $value){
                    if($key!='id'){
                        $tmp[]=sprintf("`%s`='%s'",$key,$value);
                    }
                }

            $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$array['id']}'";
        }else{
            //insert
            // `name`,`addr`,`tel`
            $sql="insert into $this->table 
                    (`".implode("`,`",array_keys($array))."`) values
                    ('".implode("','",$array)."')";
        }

        return $this->pdo->exec($sql);
    }

    //頁面導向
    function to($url){
    header("location:".$url);
    }

}





// 考丙級``可省略(上引號:表欄位、特殊用途) ''(單引號:字串) ""(字串or模板 變數)
?>