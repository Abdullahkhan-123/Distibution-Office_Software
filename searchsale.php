<?php

    $PID = $_GET['PID'];

    if(isset($_POST['SubmitDate']))
    {

        $FromDate = date('y-m-d', strtotime($_POST['FromDate']));
        $ToDate = date('y-m-d', strtotime($_POST['ToDate']));

        echo "<script>
            window.location.href='companysalereport.php?PID=$PID&FromDate=$FromDate&ToDate=$ToDate';
        </script>";

    }



?>