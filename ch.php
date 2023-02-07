<?php

    print "<form action=ch.php method=post>";

        for($i=0; $i<7; $i++)
        {
            print "<input type=text name=txt$i>";
        }
            print "<input type=submit value=submit>";

    print "</form>";

        $arr = array();

    if(isset($_POST['txt0']))
    {
        for($i=0; $i<7; $i++)
        {
            $arr[$i] = $_POST['txt'.$i];
        }

        print "<pre>";
        print_r ($arr);
        print "</pre>";

    }



?>