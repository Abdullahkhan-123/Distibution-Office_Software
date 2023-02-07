<?php include('header.php'); ?>

<section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All companies data will show on click the company name</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                            $sql = "SELECT * FROM `companyname`";
                            $res = mysqli_query($conn,$sql);
                            $run = mysqli_num_rows($res);
                            $No = 1;

                            if($run==TRUE)
                            {
                                while($row = mysqli_fetch_assoc($res))
                                {
                                        $ID = $row['ID'];
                                        $CompanyName = $row['CompanyName'];
                                    ?>
                                        <tr onclick="window.location.href='CompanyProduct.php?PID=<?php echo $ID ?>'">
                                            <td><?php echo $No++ ?></td>
                                            <td><?php echo $CompanyName ?></td>
                                            <td>
                                              <button type="button" class="bg-danger text-white border border-white ml-2" id="btnclear"><a href="files/DeleteCompany.php?ID=<?php echo $ID ?>" class="text-white text-decoration-none"><i class="fa fa-fw fa-trash-o"></i></a></button>
                                            </td>
                                        </tr>
                                    <?php
                                    

                                }
                            }


                      ?>  
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
          
<?php include('footer.php'); ?>