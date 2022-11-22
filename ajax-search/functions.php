<?php 

$myDB = ['hassan','mina','meisam','amir'];

$search = $_GET['search'];

$match = "";

if(strlen($search) > 0) {

    for($i=0; $i<count($myDB); $i++) {

        if(strtolower($search) == strtolower(substr($myDB[$i],0,strlen($search)))) {

            if($match == "") {
                $match = $myDB[$i];
            } else {
                $match = $match .' / '.$myDB[$i];
            }

        }

    }
}

echo ($match == "") ? 'No Match' : $match;