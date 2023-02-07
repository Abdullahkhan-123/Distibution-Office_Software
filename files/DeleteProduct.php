<?php

require('../config/constant.php');

    $PID = $_GET['PID'];
    $ID = $_GET['ID'];

    $del = "DELETE FROM `product` WHERE `ID`='$ID'";

    $run = mysqli_query($conn,$del);

    if($run==TRUE)
    {
        echo "<script>
                alert('Product deteled')
                window.location.href='../CompanyProduct.php?PID=$PID';
            </script>";
    }
    else
    {
        echo "<script>
                alert('Product not detele server issue')
                window.location.href='../CompanyProduct.php';
            </script>";
    }


?>