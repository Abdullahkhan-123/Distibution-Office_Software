<?php
include('header.php'); 

  $PID = $_GET['PID'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    $(document).ready(function()
    {
        $('#btnclear').click(function()
        {
            $('#addform')[0].reset();
        });
    });

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

    // function text(x)
    // {
    //     if(x == 0) document.getElementById('ShowAndHide').style.display= "block";
    //     else document.getElementById('ShowAndHide').style.display= "none";
    //     return;
    // }


</script>


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
                            <input type="text" id="ProductName" name="ProductName" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" id="Size" name="Size" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" id="PackingCtnQty" name="PackingCtnQty" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" id="RetailPrice" name="RetailPrice" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" id="RateDozen" name="RateDozen" class="form-control" readonly>
                        </td>
                        <td>
                            <input type="text" id="CortanRate" name="CortanRate" class="form-control" readonly>
                        </td>
                        <td>
                            <input type="text" id="Sechem" name="Sechem" class="form-control" required>
                        </td>
                        <td>
                            <input type="text" id="TpRate" name="TpRate" class="form-control" onkeyup="multi(this.value);" required>
                        </td>
                        <td class="d-flex">
                            <button type="submit" name="submit" class="bg-success text-white border border-white" id="addbtn"><i class="fa fa-fw fa-cloud-upload"></i></button>
                            <button type="button" class="bg-danger text-white border border-white ml-2" id="btnclear"><i class="fa fa-fw fa-undo"></i></button>
                            <!-- <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-cloud-upload"></i> fa-cloud-upload</div> -->
                        </td>
                      </tr>                      
                    </tbody>                
                    </form>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->





        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header mt-2">
                  <h3 class="box-title">Added Product Show Here</h3>
                
                  <!-- <form action="">

                    <div class="float-right mr-5">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" name="ProductName" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  
                            <button type="submit" class="border border-none">
                                <a href="CompanyName.php?ID=<?php #echo $CompanyNameID ?>">
                            <span class="input-group-text border-0" id="search-addon">
                            <i class="fa fa-fw fa-search"></i>
                            </span>
                            </a>
                            </button>
                        </div>
                    </div>
                  </form> -->
                  <div class="float-right mr-5 text-center">

                        <!-- <p>Please Check here if you want to edit</p> -->
                        <div class="form-check form-check-inline">
                        <!-- <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" onclick="text(0)">
                        <label class="form-check-label" for="inlineRadio1">Yes</label> -->
                          <button class="btn btn-primary"><a href="Stockreport.php?PID=<?php echo $PID ?>" class="text-white text-decoration-none">Stock Report</a></button>
                        </div>
                        <div class="form-check form-check-inline">
                        <!-- <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="text(1)">
                        <label class="form-check-label" for="inlineRadio1">No</label> -->
                          <button class="btn btn-primary"><a href="Salereport.php?PID=<?php echo $PID ?>" class="text-white text-decoration-none">Sale Report</a></button>
                        </div>                        
                  </div>

                </div><!-- /.box-header -->                  
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
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

                      <?php

                        $sql = "SELECT * FROM `product` WHERE `CompanyNameID` = '$_GET[PID]' ORDER BY `ID` DESC";
                        $res = mysqli_query($conn,$sql);
                        $run = mysqli_num_rows($res);
                        $No = 1;

                        if($run>0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                                    $ID = $row['ID'];
                                    $ProductName = $row['ProductName'];
                                    $Size = $row['Size'];
                                    $CotonQty = $row['CotonQty'];
                                    $RetailPrice = $row['RetailPrice'];
                                    $DozenRate = $row['DozenRate'];
                                    $CotonRate = $row['CotonRate']; 
                                    $Sechem = $row['Sechem'];
                                    $TpRate = $row['TpRate'];                                    

                                ?>
                                    <tr>
                                        <td><?php echo $No++ ?></td>
                                            <td><?php echo $ProductName ?></td>
                                            <td><?php echo $Size ?></td>
                                            <td><?php echo $CotonQty ?></td>
                                            <td><?php echo $RetailPrice ?></td>
                                            <td><?php echo $DozenRate ?></td>
                                            <td><?php echo $CotonRate ?></td>
                                            <td><?php echo $Sechem ?></td>
                                            <td><?php echo $TpRate ?></td>
                                            <td class="d-flex">
                                                <button type="button" name="submit" class="bg-info border border-white" id="addbtn"><a href="UpdateProduct.php?ID=<?php echo $ID ?>&&PID=<?php echo $PID ?>" class="text-white text-decoration-none"><i class="fa fa-fw fa-refresh"></i></a></button>
                                                <button type="button" class="bg-danger text-white border border-white ml-2" id="btnclear"><a href="files/DeleteProduct.php?ID=<?php echo $ID ?>&&PID=<?php echo $PID ?>" class="text-white text-decoration-none"><i class="fa fa-fw fa-trash-o"></i></a></button>
                                                <!-- <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-cloud-upload"></i> fa-cloud-upload</div> -->
                                            </td>
                                    </tr>
                                <?php
                                

                            }
                        }
                        else
                        {
                            ?>                               
                                    <div class="alert alert-danger" role="alert">
                                        You have not added product in this company
                                    </div>                                        
                            <?php
                        }


                    ?>  
                      
                    </tbody>

                    
               
                    </form>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->







          

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
        $CompanyNameID = $_GET['PID'];

        $sql = "INSERT INTO `product`(`ProductName`, `Size`, `CotonQty`, `RetailPrice`, `DozenRate`, `CotonRate`, `Sechem`, `TpRate`, `CompanyNameID`) VALUES ('$ProductName','$Size','$PackingCtnQty','$RetailPrice','$RateDozen','$CortanRate','$Sechem','$TpRate','$CompanyNameID')";
        $res = mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            echo "<script>
                alert('Product Add Sucesfully')
                window.location.href='CompanyProduct.php';
                <script>";
        }
        else
        {
            echo "<script>
                alert('Product Not Add Server Problem')
                window.location.href='CompanyProduct.php';
                <script>";
        }
    }

?>