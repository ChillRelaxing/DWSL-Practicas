<?php

for($i = 1; $i <= 200; $i++){

    if($i >= 50 && $i <= 125){
        continue;
    }
    else{
        if($i % 2 == 0){
            echo "$i <br>";
        }
    }
}

?>


