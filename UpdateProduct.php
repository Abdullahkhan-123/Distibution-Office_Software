
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    function multi(value)
    {
        var cotonRate, dozenRate, Sechem

        cotonRate = document.getElementById('TpRate').value * document.getElementById('PackingCtnQty').value; 
        dozenRate = document.getElementById('TpRate').value * document.getElementById('Sechem').value;
        // Sechem = document.getElementById('TpRate').value * document.getElementById('Sechem').value;

        document.getElementById('CortanRate').value = cotonRate;
        document.getElementById('RateDozen').value = dozenRate;
        // document.getElementById('Sechem').value = Sechem; 

    }

</script>

<?php
include('header.php'); 

  $PID = $_GET['PID'];
  $ID = $_GET['ID'];


  $sql = "SELECT * FROM `product` WHERE `ID` = '$ID'";
  $res = mysqli_query($conn,$sql);
  $run = mysqli_num_rows($res);
  $No = 1;

  if($run>0)
  {
      while($row = mysqli_fetch_assoc($res))
      {              
              $ProductName1 = $row['ProductName'];
              $Size1 = $row['Size'];
              $CotonQty1 = $row['CotonQty'];
              $RetailPrice1 = $row['RetailPrice'];
              $DozenRate1 = $row['DozenRate'];
              $CotonRate1 = $row['CotonRate'];
              $Sechem1 = $row['Sechem'];
              $TpRate1 = $row['TpRate'];

              ?>

                    <section class="content">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Add Product Here</h3>                  
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered"> <!--table-hover-->
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th class="col-3">Product Name</th>
                                        <th class="col-1">Size</th>
                                        <th class="col-1">Coton Qty</th>
                                        <th class="col-1">Retail Price</th>
                                        <th class="col-1">Dozen Price</th>
                                        <th class="col-1">Coton Rate</th>
                                        <th class="col-1">Sechem</th>
                                        <th class="col-1">T.P Rate</th>
                                        <th class="col-1">Action</th>
                                        </tr>
                                    </thead>
                                <form action="" method="POST" id="addform">
                                    <tbody>
                                        <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" id="ProductName" name="ProductName" class="form-control" value="<?php echo $ProductName1 ?>">
                                        </td>
                                        <td>
                                            <input type="text" id="Size" name="Size" class="form-control" value="<?php echo $Size1 ?>">
                                        </td>
                                        <td>
                                            <input type="text" id="PackingCtnQty" name="PackingCtnQty" class="form-control" value="<?php echo $CotonQty1 ?>">
                                        </td>
                                        <td>
                                            <input type="text" id="RetailPrice" name="RetailPrice" class="form-control" value="<?php echo $RetailPrice1 ?>">
                                        </td>
                                        <td>
                                            <input type="text" id="RateDozen" name="RateDozen" class="form-control" value="<?php echo $DozenRate1 ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="CortanRate" name="CortanRate" class="form-control" value="<?php echo $CotonRate1 ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="Sechem" name="Sechem" class="form-control" value="<?php echo $Sechem1 ?>">
                                        </td>
                                        <td>
                                            <input type="text" id="TpRate" name="TpRate" class="form-control" onkeyup="multi(this.value);" value="<?php echo $TpRate1 ?>">
                                        </td>
                                        <td class="d-flex">
                                            <button type="submit" name="submit" class="bg-success text-white border border-white py-2"><i class="fa fa-fw fa-refresh"></i></button>
                                        </td>
                                        </tr>                      
                                    </tbody>                
                                </form>
                                    </table>
                                </div><!-- /.box-body -->
                                </div><!-- /.box -->

                    </section><!-- /.content -->

              <?php

      }
   }


?>

<?php include('footer.php'); ?>

<?php

   if(isset($_POST['submit']))
   {
        $ProductName = $_POST['ProductName'];
        $Size = $_POST['Size'];
        $PackingCtnQty = $_POST['PackingCtnQty'];
        $RetailPrice = $_POST['RetailPrice'];
        $RateDozen = $_POST['RateDozen'];
        $CortanRate = $_POST['CortanRate'];
        $Sechem = $_POST['Sechem'];
        $TpRate = $_POST['TpRate'];

        $update = "UPDATE `product` SET `ProductName`='$ProductName',`Size`='$Size',`CotonQty`='$PackingCtnQty',`RetailPrice`='$RetailPrice',`DozenRate`='$RateDozen',`CotonRate`='$CortanRate',`Sechem`='$Sechem',`TpRate`='$TpRate' WHERE `ID`='$ID'";

        $runQuery = mysqli_query($conn,$update);

        if($runQuery==TRUE)
        {
            echo "<script>
                    alert('Product update')
                    window.location.href='CompanyProduct.php?PID=$PID';
                </script>";
        }
        else
        {
            echo "<script>
                    alert('Product not update')
                    window.location.href='UpdateProduct.php?ID=$ID&&?PID=$PID';
                </script>";
        }



   }

?>