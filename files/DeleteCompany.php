<?php

require('../config/constant.php');

    $ID = $_GET['ID'];

    $del = "DELETE FROM `companyname` WHERE `ID`='$ID'";

    $run = mysqli_query($conn,$del);

    if($run==TRUE)
    {

        $delP = "DELETE FROM `product` WHERE `CompanyNameID`='$ID'";
        $run1 = mysqli_query($conn,$delP);

        if($run1==TRUE)
        {
            echo "<script>
                alert('Company deteled')
                window.location.href='../CompanyNameView.php';
            </script>";
        }    
        else
        {
            echo "<script>
                alert('Company not detele server issue and also Product Tbale')
                window.location.href='../CompanyNameView.php';
            </script>";    
        }    
    }
    else
    {
        echo "<script>
                alert('Company not detele server issue')
                window.location.href='../CompanyNameView.php';
            </script>";
    }


?>