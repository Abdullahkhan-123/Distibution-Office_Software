<?php
include('header.php');

  $PID = $_GET['PID'];
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    function multi(value)
    {
        var Percentage,Percente,Result,Final

        TotalAmount = document.getElementById('totalPur').value;
        Percente = document.getElementById('Percent').value;
        Result = TotalAmount*(Percente/100);
        Final = TotalAmount - Result;

        document.getElementById('PercentageAmount').value = Result;
        document.getElementById('AfterPercentAmount').value = Final;        
    }

    function multi1(value)
    {
        var Percentage1,Percente1,Result1,Final1

        TotalAmount1 = document.getElementById('totalPur1').value;
        Percente1 = document.getElementById('Percent1').value;
        Result1 = TotalAmount1*(Percente1/100);
        Final1 = TotalAmount1 - Result1;

        document.getElementById('PercentageAmount1').value = Result1;
        document.getElementById('AfterPercentAmount1').value = Final1;        
    }


</script>



<section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">This table data is for watching the monthly stock and sale report</h3>
                  <div class="float-right">
                  
                      <form action="search.php?PID=<?=$PID?>" method="POST">


                      <div class="input-group">
                      <div class="form-outline">
                          <input type="date" id="form1" class="form-control" name="FromDate"/>
                          <label class="form-label" for="form1">Search From Date</label>
                        </div>
                        <div class="form-outline">
                          <input type="date" id="form1" class="form-control" name="ToDate"/>
                          <label class="form-label" for="form1">Search To Date</label>
                        </div>
                        <button type="submit" name="SubmitDate" class="btn btn-primary" style="height:38px;">
                          <i class="fa fa-fw fa-search"></i>
                        </button>
                      </div>

                      </form>

                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">                  
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr class="text-center">
                        <th>ID</th>
                        <th class="col-2">Product Name</th>
                        <th>Size</th>
                        <th>Coton Qty</th>
                        <th>Retail Price</th>
                        <th>Dozen Rate</th>
                        <th>Sechem</th>                        
                        <th>T.P Rate</th>
                        <th>Purchase Stock</th>
                        <th>Purchase Amount</th>
                        <th class="col-1">Purchase Date</th>
                        <th>Sale Stock</th>
                        <th>Sale Amount</th>
                        <th class="col-1">Sale Date</th>                        
                      </tr>
                    </thead>

                    <?php

                        if(isset($_GET['FromDate']) && isset($_GET['ToDate']))
                        {
                          $FromDate = $_GET['FromDate'];
                          $ToDate = $_GET['ToDate'];
                          

                          ?>
                        <tbody>
                          <?php

                                $sql = "                            
                                SELECT product.ID, product.ProductName, 
                                product.Size, product.CotonQty, product.RetailPrice,
                                product.DozenRate, product.Sechem, product.TpRate, 
                                stockreport.InStock, stockreport.TotalAmount, 
                                stockreport.Date as PurchaseDate, salereport.SaleStock, 
                                salereport.SaleTotalAmount, 
                                salereport.Date as SaleDate
                                FROM product
                                INNER JOIN stockreport ON product.ID=stockreport.ProductID
                                INNER JOIN salereport ON product.ID=salereport.ProductID
                                WHERE stockreport.Date Between '$FromDate' AND 
                                '$ToDate' AND product.CompanyNameID='$PID' ORDER BY product.ID DESC;
                                ";

                                // $sql = "SELECT * FROM `product` WHERE `CompanyNameID` = '$_GET[PID]' ORDER BY `ID` DESC";
                                $res = mysqli_query($conn,$sql);
                                $run = mysqli_num_rows($res);
                                $No = 1;
                                $totalPur = 0;
                                $totalSal = 0;

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
                                            $Sechem = $row['Sechem'];
                                            $TpRate = $row['TpRate'];
                                            $InStock = $row['InStock'];
                                            $TotalAmount = $row['TotalAmount'];
                                            $PurchaseDate = $row['PurchaseDate'];
                                            $SaleStock = $row['SaleStock'];
                                            $SaleTotalAmount = $row['SaleTotalAmount'];
                                            $SaleDate = $row['SaleDate'];

                                            $PurPro = $row['InStock'] * $row['TpRate'];
                                            $totalPur = $totalPur + $PurPro;

                                            $SalPro = $row['TpRate'] * $row['SaleStock'];

                                            $totalSal = $totalSal + $SalPro;



                                        
                                        ?>                                    
                                            <tr class="text-center">
                                                <td><?php echo $No++ ?></td>
                                                <td><?php echo $ProductName ?></td>
                                                <td><?php echo $Size ?></td>
                                                <td><?php echo $CotonQty ?></td>
                                                <td><?php echo $RetailPrice ?></td>
                                                <td><?php echo $DozenRate ?></td>
                                                <td><?php echo $Sechem ?></td>
                                                <td><?php echo $TpRate ?></td>
                                                <td><?php echo $InStock ?></td>
                                                <td><?php echo $TotalAmount ?></td>
                                                <td><?php echo $PurchaseDate ?></td>
                                                <td><?php echo $SaleStock ?></td>
                                                <td><?php echo $SaleTotalAmount ?></td>
                                                <td><?php echo $SaleDate ?></td>
                                            </tr>
                                        <?php
                                        }                                           
                                      }
                                ?>
                          </tbody>
                          <?php
                        }
                        else
                        {
                          ?>
                              <tbody>
                                  <?php

                                        $sql = "                            
                                        SELECT product.ID, product.ProductName, 
                                        product.Size, product.CotonQty, product.RetailPrice,
                                        product.DozenRate, product.Sechem, product.TpRate, 
                                        stockreport.InStock, stockreport.TotalAmount, 
                                        stockreport.Date as PurchaseDate, salereport.SaleStock, 
                                        salereport.SaleTotalAmount, 
                                        salereport.Date as SaleDate

                                        FROM product
                                        INNER JOIN stockreport ON product.ID=stockreport.ProductID
                                        INNER JOIN salereport ON product.ID=salereport.ProductID
                                        WHERE product.CompanyNameID=$PID ORDER BY product.ID DESC;
                                        ";

                                        // $sql = "SELECT * FROM `product` WHERE `CompanyNameID` = '$_GET[PID]' ORDER BY `ID` DESC";
                                        $res = mysqli_query($conn,$sql);
                                        $run = mysqli_num_rows($res);
                                        $No = 1;
                                        $totalPur = 0;
                                        $totalSal = 0;

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
                                                    $Sechem = $row['Sechem'];
                                                    $TpRate = $row['TpRate'];
                                                    $InStock = $row['InStock'];
                                                    $TotalAmount = $row['TotalAmount'];
                                                    $PurchaseDate = $row['PurchaseDate'];
                                                    $SaleStock = $row['SaleStock'];
                                                    $SaleTotalAmount = $row['SaleTotalAmount'];
                                                    $SaleDate = $row['SaleDate'];

                                                    $PurPro = $row['InStock'] * $row['TpRate'];
                                                    $totalPur = $totalPur + $PurPro;

                                                    $SalPro = $row['TpRate'] * $row['SaleStock'];

                                                    $totalSal = $totalSal + $SalPro;



                                                
                                                ?>                                    
                                                    <tr class="text-center">
                                                        <td><?php echo $No++ ?></td>
                                                        <td><?php echo $ProductName ?></td>
                                                        <td><?php echo $Size ?></td>
                                                        <td><?php echo $CotonQty ?></td>
                                                        <td><?php echo $RetailPrice ?></td>
                                                        <td><?php echo $DozenRate ?></td>
                                                        <td><?php echo $Sechem ?></td>
                                                        <td><?php echo $TpRate ?></td>
                                                        <td><?php echo $InStock ?></td>
                                                        <td><?php echo $TotalAmount ?></td>
                                                        <td><?php echo $PurchaseDate ?></td>
                                                        <td><?php echo $SaleStock ?></td>
                                                        <td><?php echo $SaleTotalAmount ?></td>
                                                        <td><?php echo $SaleDate ?></td>
                                                    </tr>
                                                <?php
                                                }                                           
                                              }
                                        ?>
                              </tbody>


                          <?php
                        }

                    ?>                  
                </table>

                  <!-- this row is for showing the total amount of the sale items based on monthly report-->                                     
                      <div class="">
                        <div class="row justify-content-end" style="margin-right:5%; gap:10%;">
                      <p class="col-2" style="">
                        First Total Amount of Purchase Stock
                          <input type="text" class="form-control text-center" id="totalPur" value="<?php echo $totalPur ?>" readonly>
                      </p>                    
                      <p class="col-2">
                        First Total Amount of Sale Stock
                          <input type="text" class="form-control text-center" id="totalPur1" value="<?php echo $totalSal ?>" readonly>                    
                      </p>
                      </div>
                    </div>
                    

                  <!-- this row is for minuxing the total amount of the sale items based on monthly report-->                
                    <div class="">
                      <div class="row justify-content-end"  style="margin-right:5%; gap:10%;">
                      <p class="col-2">
                        Add Here Percentage
                          <input type="text" class="form-control text-center" id="Percent" value="" onkeyup="multi(this.value);">
                      </p>
                      <p class="col-2">
                        Add Here Percentage
                          <input type="text" class="form-control text-center" id="Percent1" value="" onkeyup="multi1(this.value);">
                      </p>
                      </div>
                    </div>


                  <!-- this row is for showing the percentage total amount of the sale items based on monthly report-->                  
                    <div class="">
                      <div class="row justify-content-end"  style="margin-right:5%; gap:10%;">
                      <p class="col-2">
                        Percentage Amount
                          <input type="text" class="form-control text-center" id="PercentageAmount" value="" >
                      </p>
                      <p class="col-2">
                        Percentage Amount
                          <input type="text" class="form-control text-center" id="PercentageAmount1" value="" >
                      </p>
                      </div>
                    </div>


                  <!-- this row is for after minuxing percent then shows the total amount of the sale items based on monthly report-->
                      <div class="">
                        <div class="row justify-content-end"  style="margin-right:5%; gap:10%;">
                        <p class="col-2">
                          Total Amount
                           <input type="text" class="form-control text-center" id="AfterPercentAmount" value="" >
                        </p>
                        <p class="col-2"> 
                          Total Amount
                            <input type="text" class="form-control text-center" id="AfterPercentAmount1" value="" >
                        </p>
                        </div>
                      </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
          
<?php include('footer.php'); ?>