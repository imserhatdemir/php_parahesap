<?php 
require_once 'header.php';
require_once 'sidebar.php'

?>

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
          <label>Bakiye</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="bakiye"class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Yetkili Adı*</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="account_authorized_name_surname" required="" class="form-control">
            </div>
          </div>
        </div>
        <form >
  <p>Hesap Tipi Giriniz</p>
  <input type="radio" id="Kart" name="Kart" value="Kart">
  <label for="Kart">Kart</label><br>
  <input type="radio" id="Nakit" name="Kart" value="Nakit">
  <label for="Nakit">Nakit</label><br>
  

  </form>  
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
  <label>Bakiye</label>
  <div class="row">
    <div class="col-xs-12">
      <input type="text" name="bakiye" value="<?php echo $row['bakiye']; ?>" class="form-control">
    </div>
  </div>
</div>

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




<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Hesaplar</h1>  
  <div align="right">
    <a href="?accountInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
    <br><br>
  </div>
  <?php 
  if (isset($_GET['accountDelete'])) {

   $sonuc=$db->delete("account","account_id",$_GET['account_id']);


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
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Yetkili</th>
        <th>Bakiye</th>
        <th>Hesap Tipi</th>
        <th>Para Birimi</th>
        <th>IBAN</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $sql=$db->read("account",[
        "columns_name" => "account_id",
        "columns_sort" => "DESC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <tr> 
          <td><?php echo $say++; ?></td>
          <td width="100"><?php echo $row['account_authorized_name_surname'] ?></td>
          <td><?php echo $row['bakiye'] ?></td>
          <td><?php echo ($row['type']=='Nakit') ? "<span class='label label-success'>Nakit</span>" : "<span class='label label-danger'>Kart</span>" ?></td>
          <td><?php echo ($row['birim']=='DOLAR') ? "<span class='label label-success'>DOLAR</span>" : "<span class='label label-success'>TL</span>" ?></td>
          <td><?php echo $row['account_iban'] ?></td>
          
          <td width="20"><a href="transferet.php?id=<?php echo $row['account_id']; ?>"><button class="btn btn-primary btn-sm">TRANSFER ET</button></a></td>

          <td width="20"><a href="account-details.php?account_id=<?php echo $row['account_id']; ?>"><button class="btn btn-primary btn-sm">Hesap Detayı</button></a></td>



          <td align="center" width="5"><a href="?accountUpdate=true&account_id=<?php echo $row['account_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
          <td align="center" width="5"><a href="?accountDelete=True&account_id=<?php echo $row['account_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
        </tr>

      <?php } ?>

    </table>
  </div>
  <!-- /.box-body -->
</div>

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