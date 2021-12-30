<?php

require_once 'netting/class.crud.php';
$db=new crud();

if($_GET["id"]){
		$id =  $_GET["id"];
        $sql=$db->qSql("SELECT * FROM account WHERE account_id='{$_GET['id']}'");
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        $accounttype = $row["type"];
        $accountbakiye = $row["bakiye"];
        $accountmoneytype = $row["birim"];
    }

if($_POST){
    $gaccid = $_POST["gonderilecekhesapid"];
    $gaccmoney = $_POST["paramiktar"];

    $hesap=$db->qSql("SELECT * FROM account WHERE account_id=$gaccid");
    $row=$hesap->fetch(PDO::FETCH_ASSOC);
    $gacctype = $row["type"];
    $gaccbakiye = $row["bakiye"];
    $gaccmt = $row["birim"];


    if(!isset($gaccmoney)){
        echo "bos";
    }
    else{
        if($gaccmoney>$accountbakiye){
            echo "parafazla";
        }
        else{
            if($gaccmt == "TL"){
               if($accountmoneytype == "TL"){
                    $accountbakiye = ($accountbakiye - $gaccmoney);
                    $gaccbakiye = ($gaccbakiye + $gaccmoney);

                    $upd1 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                    $upd1 -> execute(array(":id" => $gaccid, ":miktar" => $gaccbakiye));

                    if($upd1){
                        $upd2 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                        $upd2 -> execute(array(":id" => $id, ":miktar" => $accountbakiye));

                        if($upd2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }else{echo"naber";}
                }
                else if($accountmoneytype == "DOLAR"){

                    $donusumpara = ($gaccmoney * 7.64);
                    $accountbakiye = ($accountbakiye - $gaccmoney);
                    $gaccbakiye = $gaccbakiye + $donusumpara;

                    $upd1 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                    $upd1 -> execute(array(":id" => $gaccid, ":miktar" => $gaccbakiye));

                    if($upd1){
                        $upd2 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                        $upd2 -> execute(array(":id" => $id, ":miktar" => $accountbakiye));

                        if($upd2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }else{echo"naber";}
                }
            }
            else if($gaccmt == "DOLAR"){
                if($accountmoneytype == "TL"){
                    $donusumpara = ($gaccmoney / 7.64);
                    $accountbakiye = ($accountbakiye - $gaccmoney);
                    $gaccbakiye = ($gaccbakiye + $donusumpara);

                    $upd1 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                    $upd1 -> execute(array(":id" => $gaccid, ":miktar" => $gaccbakiye));

                    if($upd1){
                        $upd2 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                        $upd2 -> execute(array(":id" => $id, ":miktar" => $accountbakiye));

                        if($upd2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }else{echo"naber";}
                }
                else if($accountmoneytype == "DOLAR"){
                    $accountbakiye = ($accountbakiye - $gaccmoney);
                    $gaccbakiye = $gaccbakiye + $gaccmoney;

                    $upd1 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                    $upd1 -> execute(array(":id" => $gaccid, ":miktar" => $gaccbakiye));

                    if($upd1){
                        $upd2 = $db -> qSql("UPDATE account SET bakiye=:miktar WHERE account_id=:id");
                        $upd2 -> execute(array(":id" => $id, ":miktar" => $accountbakiye));

                        if($upd2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }else{echo"naber";}
                }else{echo"naber";}
            }
        }
    }


}

?>