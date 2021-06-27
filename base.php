<?php
session_start();
date_default_timezone_set("Asia/Taipei");//這題沒有用到



//設定後台的抬頭文字
// title stream
$ts=[
    "title"=>"網站標題管理",
    "ad"=>"動態文字廣告管理",
    'mvim'=>"動畫圖片管理",
    "image"=>"校園映像資料管理",
    "total"=>"進站總人數管理",
    "bottom"=>"頁尾版權資料管理",
    "news"=>"最新消息資料管理",
    "admin"=>"管理者帳號管理",
    "menu"=>"選單管理"
]; 
$as=[
    "title"=>"新增網站標題圖片",
    "ad"=>"新增動態文字廣告",
    'mvim'=>"新增動畫圖片",
    "image"=>"新增校園映像資料",
    "news"=>"新增最新消息資料",
    "admin"=>"新增管理者帳號",
    "menu"=>"新增主選單"
]; 
$hs=[
    "title"=>"網站標題圖片",
    "ad"=>"動態文字廣告",
    'mvim'=>"動畫圖片",
    "image"=>"校園映像資料",
    "total"=>"進站總人數：",
    "bottom"=>"頁尾版權資料：",
    "news"=>"最新消息資料",
    "admin"=>"管理者帳號",
    "menu"=>"選單"
];
    
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=db01";
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
        
        // $arg=[] or [陣列],[SQL字串],[陣列,SQL字串],


        //判斷第一個參數是否存在
        if(isset($arg[0])){
            if(is_array($arg[0])){
                //if $arg[0]是陣列 
                // ex 把 ['acc'='XXX'
                //        'pw' = "1234"]
                // 改成字串 where acc='XXX' && pw = "1234"

                // ["欄位"=>"值","欄位"=>"值"]
                // where `欄位`='值' && `欄位`='值'
                //"欄位"=>"值" ===>`欄位`＝'值'
                // %s =>字串 (正規表達式)
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                    // (Before)[0]=[[name]=>amy, [visible]=>Y]
                    // (Result)[0]=>`name`='amy' [1]=>`visible`='Y'
                }
                //組合條件語句字串
                //ex "where `visible`='Y'"

                //(空)&&(空) 一定要空白
                $sql=$sql . "where" . implode(" && ",$tmp);
                // (Result) select * from $this->table where `name`='amy' && `visible`='Y'
                
            }else{
                // else不是陣列/當它是字串
                $sql=$sql . $arg[0];
            }

            //如果有第二個元素，表示條件後有其他附帶的SQL語法，
            //則我們規定第二個參數為一個sql的語法字串
            //因此直接將語法字串接在$sql之後即可
            // ex acc="mack" or acc='admin' "where `visible`='Y'", order by...
            if(isset($arg[1])){
                // 當它是字串
                $sql=$sql . $arg[1];
            }
        }
        //空陣列/沒參數的時侯，$sql="select * from $this->table "
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

    // $User=new DB("stories")
    // print_r($User->count()(" where name ='amy' "));

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
                // "where `id`='".$id."'"; 可省略
            }
            // query查詢
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
            //exec 執行 result=>幾筆被影響
        return $this->pdo->exec($sql);
    }

    //新增\更新資料
    //INSERT INTO stores (id, name , location, price, people) VALUE (NULL, '$name', '$location', '$price', '$people')
    //UPDATE `stores` SET `name`='$name',`location`='$location',`price`='$price',`people`='$people' WHERE id = '$id'
    //差別在於有無 where id
    public function save($array){
        // 省略 if(is_array)
        if(isset($array['id'])){
            //update 有ID就是要做更新
                foreach($array as $key => $value){
                    if($key!='id'){
                        $tmp[]=sprintf("`%s`='%s'",$key,$value);
                    }
                }
                // 不能這樣寫 "update $this->table set ".implode(',',$tmp)." where `id`='$array['id']'"
            $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$array['id']}'";
        }else{
            //insert 沒ID是要做新增
            // `name`,`addr`,`tel`
            $sql="insert into $this->table 
                    (`".implode("`,`",array_keys($array))."`) values
                    ('".implode("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }


}   

    //頁面導向
    function to($url){
        header("location:".$url);
        }

    $Total=new DB('total');
    $Bottom=new DB('bottom');
    $Title=new DB('title');
    $Ad=new DB('ad');
    $Mvim=new DB('mvim');
    $Image=new DB('image');
    $News=new DB('news');
    $Admin=new DB('admin');
    $Menu=new DB('menu');


    // 如果沒有session 資料庫+1
    if(!isset($_SESSION['total'])){
        $total=$Total->find(1);
        // $total['total']=$total['total']+1 OR
        // $total['total']+=1
        $total['total']++;
        $Total->save($total);
        $_SESSION['total']=1;//數字沒有影響，只是為了讓變數存在
        // +1後有了session就不會再加了
    }



// 考丙級``可省略(上引號:表欄位、特殊用途) ''(單引號:字串) ""(字串or模板 變數)
?>