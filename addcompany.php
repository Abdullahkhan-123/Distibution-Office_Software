<?php include('header.php'); ?>

    <div class="container bg-dark col-6 mt-5">        
            <br>
        <div class="h1 bg-light text-dark text-center py-3">
            <h5>Add Company Name By clicking Add Now Button</h5>
        </div>
        
        <form action="" method="POST">

            <div class="main text-white">
                <label class="form-label" for="Company">Company Name</label>
                <input type="text" class="form-control" placeholder="Company Name Add Here...." name="CompanyName" aria-label="First name">
                
                <div class="submitbtn" style="margin-top: 1rem!important; float: right;">
                    <button type="submit" name="submit" class="btn btn-primary">Add Now</button>
                </div>
            </div>

        </form>
        <div><br></div>
    </div>

<?php include('footer.php'); ?>

<?php

    if(isset($_POST['submit']))
    {
        $CompanyName = $_POST['CompanyName'];

        $sql ="INSERT INTO `companyname`(`CompanyName`) VALUES ('$CompanyName')";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            echo "<script>
                    alert('Company Name Added Succesfully')
                    windoow.location.href='addcompany.php';
                </script>";
        }
        else
        {
            echo "<script>
                    alert('Company Name Added Succesfully')
                    windoow.location.href='addcompany.php';
                </script>";
        }


    }

?>