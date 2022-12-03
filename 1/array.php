<?php
    $arr = array(3, 10, 12, 15, 2, 22, 52, 16, 2234);
    $a = 111;

    $count = count($arr);
    $i = 0;

    echo "array before";
    var_dump($arr);

    while($i < $count){
      if(preg_match('/2/', $arr[$i])) {
        if($i == $count-1){
          $arr[] = $a;
        } else {
          $oldNumber = 0;
          $newNuber = $arr[$i+1];
          $arr[$i+1] = $a;
          for($j = $i + 2; $j < $count; $j++){
            $oldNumber = $arr[$j];
            $arr[$j] = $newNuber;
            $newNuber = $oldNumber;
          }
          $arr[] = $newNuber;
          $i++;
          $count++;
        }
      }
      $i++;
    }

    echo "array after";
    var_dump($arr);
 ?>
