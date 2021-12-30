<?php 
require_once 'header.php';
require_once 'sidebar.php'

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  

  <section class="content">


   <?php 

   if (isset($_GET['accountInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Hesap Ekle</h1>  
        <hr>       
      </div>

      <div class="box-body">

        <?php 
        if (isset($_POST['account_insert'])) {

         $sonuc=$db->insert("account",$_POST,[
          "form_name" => "account_insert"
        ]
      );

      if ($sonuc['status']) {?>
       <div class="alert alert-success">
         Kayıt Başarılı <a href="<?php $link=explode("?",$_SERVER['REQUEST_URI']); echo $link[0]; ?>">Listele</a>
       </div>
     <?php } else {?>

      <div class="alert alert-danger">
       Kayıt Başarısız.<?php echo $sonuc['error'] ?>
     </div>
   <?php }
 }
 ?>


      <!--  <div class="alert alert-success">
        Kayıt Başarılı
      </div> -->


      <form method="POST" enctype="multipart/form-data">


        

        <div class="form-group">
          <label>Yetkili Adı*</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="account_authorized_name_surname" required="" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Hesap Tipi</label>
          <div class="row">
            <div class="col-xs-12">
              <select class="form-control" required="" name="type">
                <option value="">Seçim Yapın</option>

                <option value="Nakit">Nakit</option>
                <option value="Kart">Kart</option>

              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Para Birimi</label>
          <div class="row">
            <div class="col-xs-12">
              <select class="form-control" required="" name="birim">
                <option value="">Seçim Yapın</option>

                <option value="TL">TL</option>
                <option value="DOLAR">DOLAR</option>

              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="email" name="account_email"class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Telefon</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="account_phone"  class="form-control">
            </div>
          </div>
        </div>

     

       
        <div class="form-group">
          <label>IBAN</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="account_iban"  class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Bakiye</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="bakiye"  class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Adres</label>
          <div class="row">
            <div class="col-xs-12">
              <textarea class="form-control" name="account_adress"></textarea>
            </div>
          </div>
        </div>



        <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="account_insert">Ekle</button>
        </div>



      </form>
    </div>

  </div>
<?php }  else if (isset($_GET['accountUpdate'])) {

  //bağlı id bilgilerini çek...


  ?>

  <div class="box box-primary">



    <div class="content-header">
      <h1 >Hesap Düzenle</h1>  
      <hr>       
    </div>

    <div class="box-body">

      <?php 

      if (isset($_POST['account_update'])) {

       $sonuc=$db->update("account",$_POST,[
        "form_name" => "account_update",
        "columns" => "account_id"
      ]
    );

    if ($sonuc['status']) {?>
     <div class="alert alert-success">
       Kayıt Başarılı <a href="<?php $link=explode("?",$_SERVER['REQUEST_URI']); echo $link[0]; ?>">Listele</a>
     </div>
   <?php } else {?>

    <div class="alert alert-danger">
     Kayıt Başarısız.<?php echo $sonuc['error'] ?>
   </div>
 <?php }
}

$sql=$db->wread("account","account_id",$_GET['account_id']);
$row=$sql->fetch(PDO::FETCH_ASSOC);



?>

<!-- update işlem sorgusu -->


<form method="POST" enctype="multipart/form-data">


 

<div class="form-group">
  <label>Yetkili Adı*</label>
  <div class="row">
    <div class="col-xs-12">
      <input type="text" name="account_authorized_name_surname" value="<?php echo $row['account_authorized_name_surname']; ?>" required="" class="form-control">
    </div>
  </div>
</div>
<div class="form-group">
          <label>Para Birimi</label>
          <div class="row">
            <div class="col-xs-12">
              <select class="form-control" required="" name="birim">
                <option value="<?php echo $row['birim']; ?>"><?php echo $row['birim']; ?></option>

                <option value="TL">TL</option>
                <option value="DOLAR">DOLAR</option>

              </select>
            </div>
          </div>
        </div>
<div class="form-group">
  <label>Email</label>
  <div class="row">
    <div class="col-xs-12">
      <input type="email" name="account_email" value="<?php echo $row['account_email']; ?>" class="form-control">
    </div>
  </div>
</div>

<div class="form-group">
  <label>Telefon</label>
  <div class="row">
    <div class="col-xs-12">
      <input type="text" name="account_phone" value="<?php echo $row['account_phone']; ?>"  class="form-control">
    </div>
  </div>
</div>



<div class="form-group">
  <label>IBAN</label>
  <div class="row">
    <div class="col-xs-12">
      <input type="text" name="account_iban" value="<?php echo $row['account_iban']; ?>"  class="form-control">
    </div>
  </div>
</div>

<div class="form-group">
  <label>Adres</label>
  <div class="row">
    <div class="col-xs-12">
      <textarea class="form-control" name="account_adress"><?php echo $row['account_adress']; ?></textarea>
    </div>
  </div>
</div>


<input type="hidden" name="account_id" value="<?php echo $row['account_id']; ?>">

<div align="right" class="box-footer">
  <button type="submit" class="btn btn-success" name="account_update">Düzenle</button>
</div>



</form>
</div>

</div>

<?php }

?>

<?php
if($_GET["id"]){
		$id =  $_GET["id"];
        // $sorgu = $db->pSql("SELECT * FROM account WHERE account_id=:id");
        // $sorgu->execute(["id" => $id]);
        // $row = $sorgu->fetch(PDO::FETCH_ASSOC);
        // $accounttype = $row["type"];
        // $accountbakiye = $row["bakiye"];
        // $accountmoneytype = $row["birim"];
        $sql=$db->qSQL("SELECT * FROM account WHERE account_id='{$_GET['id']}'");
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        $accounttype = $row["type"];
        $accountbakiye = $row["bakiye"];
        $accountmoneytype = $row["birim"];
    }
?>
<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Hesaplar Arası Para Transferi</h1>  
  <div align="right">
     <br><br>
  </div>
  <div class="box">

  	<script type="text/javascript">
  		function transfer(){
  			var transferveriler = $("#transferform").serialize();
            $.ajax({
                type : "POST",
                data : transferveriler,
                url : "transferetislem.php?id=<?php echo $id; ?>",
                success : function(deger){ alert(deger);
                    if($.trim(deger) == "bos"){
                        sweetAlert('hata','Lütfen boş alan bırakmayınız','error');
                    }
                    else if($.trim(deger) == "dogru"){
                        sweetAlert('Başarılı','Transfer İşlemi Başarılı','success')
                        .then((value) => {
                            window.location.href = "transferet.php?id=<?php echo $id; ?>";
                        })  
                    } 
                    else if($.trim(deger) == "hata"){
                        sweetAlert('hata','HATA','error');
                    } 
                    else if($.trim(deger) == "parafazla"){
                        sweetAlert('hata','parafazla','error');
                    }      
                }
            });
  		}
  	</script>


  	<form id="transferform" onsubmit="return false">
  		<div class="form-group">
  			<label>Gönderilecek Olan Hesabı Seçin</label>
  			
  				<?php 
  					if($accounttype == "Nakit"){
                        ?>
                           
                    <select name="gonderilecekhesapid" id="gonderilecekhesapid">
                    <?php
                    
                     $Listele=$db->qSQL("SELECT * FROM account WHERE type='Kart'");
        			$rows=$Listele->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                    ?>
                   <option value="<?php echo $row["account_id"]; ?>"><p><?php echo $row["account_iban"]?></p></option>
                    <?php 
                    }
                    ?>
                    </select>
         
                                
                       <?php
                    }
                    else if($accounttype == "Kart"){
                            ?>
                               <select name="gonderilecekhesapid" id="gonderilecekhesapid">
		                    <?php
		                    
		                     $Listele=$db->qSQL("SELECT * FROM account WHERE type='Nakit'");
		        			$rows=$Listele->fetchAll(PDO::FETCH_ASSOC);
		                    foreach($rows as $row){
		                    ?>
		                   <option value="<?php echo $row["account_id"]; ?>"><p><?php echo $row["account_iban"]?></p></option>
		                    <?php 
		                    }
		                    ?>
		                    </select>
                            <?php
                        }
  				?>
  			
  		</div>
  		<div class="form-group">
  			<label>Gönderilecek Para Miktarını Girin</label>
  			<input type="text" name="paramiktar" class="form-control">
  		</div>
  		<div class="form-group">
  			<button class="btn btn-primary" onclick="transfer()">Gönder</button>
  		</div>
  	</form>
  </div>
  <?php 
  if (isset($_GET['accountDelete'])) {

   $sonuc=$db->delete("account","account_id",$_GET['account_id'],$_GET['file_delete']);


   if ($sonuc['status']) {?>
     <div class="alert alert-success">
       Silme Başarılı
     </div>
   <?php } else {?>

    <div class="alert alert-danger ">
     Silme Başarısız.<?php echo $sonuc['error'] ?>
   </div>
 <?php }
}
?>
</div>
<!-- /.box-header -->


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'footer.php'; ?>

<script type="text/javascript">

  $(function() {
    $("#sortable").sortable({
      revert:true,
      handle:".sortable",
      stop:function(event,ui) {
        var data=$(this).sortable('serialize');

        $.ajax({
          type:"POST",
          dataType:"json",
          data:data,
          url:"netting/order-ajax.php?account_must=true",
          success:function(msg) {
            if (msg.islemMsj) {
              alert("Sıralama Başarılı");
            } else {
              alert("Hata Var...");
            }

          }
        });
      }



    });
    $("#sortable").disableSelection();
  });

</script>