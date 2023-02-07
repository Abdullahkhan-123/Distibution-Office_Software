<?php
include('header.php');

  $PID = $_GET['PID'];

?>

<section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">This table data is for entering the purchase stock report</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th >Product Name</th>
                        <th >Size</th>
                        <th >Coton Qty</th>
                        <th >T.P Rate</th>
                        <th >Purchase Stock</th>
                        <!-- <th >Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                          <form action="" method="POST">
                      <?php

                            $sql = "SELECT * FROM `product` WHERE `CompanyNameID` = '$_GET[PID]' ORDER BY `ID` DESC";
                            $res = mysqli_query($conn,$sql);
                            $run = mysqli_num_rows($res);
                            $No = 1;
                            $num = 1;


                            if($run>0)
                            {                              
                              
                              for($i=0; $i<$run; $i++)
                               {

                                  $row = mysqli_fetch_assoc($res);                                      
                                        $ID = $row['ID'];
                                        $ProductName = $row['ProductName'];
                                        $Size = $row['Size'];
                                        $CotonQty = $row['CotonQty'];
                                        $TpRate = $row['TpRate'];
                                    
                                    ?>                                    
                                        <tr>
                                            <td><?php echo $No++ ?></td>
                                            <td><?php echo $ProductName ?></td>
                                            <td><?php echo $Size ?></td>
                                            <td><?php echo $CotonQty ?></td>
                                            <td id="TpRate"><?php echo $TpRate ?></td>
                                            <td class="col-1">
                                          
                                            <input type="text" id="Qauntity" class="form-control" name="InStock<?= $i ?>" >
                                            <input type="hidden" class="form-control" name="ID<?= $i ?>" value="<?php echo $ID ?>">
                                            <input type="hidden" class="form-control" name="Tprate<?= $i ?>" value="<?php echo $TpRate ?>">

                                            </td>                                            
                                        </tr>
                                    <?php
                                    }                                  
                                  }
                            ?>

                                <div class="float-right mr-1 mb-2">                                
                                <p class="mb-1">Click the button below for save stock report</p>

                                <button type="submit" name="submit" class="bg-success text-white border float-right" id="btnclear">Save<i class="fa fa-fw fa-save"></i></button>
                                

                                </div>

                          </form>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
          
<?php include('footer.php'); ?>

<?php

function insert_into_db($data,$datee,$datTP)
{

  foreach($data as $key => $value) { $Instock = $value; } $Instock;
  foreach($datee as $key => $vale) { $ID = $vale; } $ID;
  foreach($datTP as $key => $vale) { $Tprate = $vale; } $Tprate;

    $server_Name = 'localhost';
    $userName = 'root';
    $password = '';
    $DB_Name = 'office';
    $date = date("y-m-d");
    $TotalAmount = $Instock * $Tprate;



    $conn = mysqli_connect($server_Name,$userName,$password,$DB_Name);

    $sql = "INSERT INTO `stockreport`(`InStock`, `CompanyID`, `ProductID`, `TotalAmount`, `Date`) VALUES 
                                      ('$Instock','$_GET[PID]','$ID','$TotalAmount','$date')";

    $res = mysqli_query($conn,$sql);
  
}

  


    if(isset($_POST['submit']))
    {
      
      for($i=0; $i<$run; $i++)
      {

          $data = array( $Instock = $_POST['InStock'.$i] );

          $datee = array( $ID = $_POST['ID'.$i] );

          $datTP = array( $Tprate = $_POST['Tprate'.$i] );

          insert_into_db($data,$datee,$datTP);

      }

      if($res==TRUE)
      {
          echo "<script>
            alert('Stock add sucessfully')
            window.location.href='Stockreport.php?PID=$PID';
            
          </script>";
      }
      
  }

?>