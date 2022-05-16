<?php

//echo 'ok\n';
$path = getcwd();
$fr = fopen($path.'/t10k-images.idx3-ubyte','rb');

$images = [];

$header = fread($fr,16);
$fields = unpack('Nmagic/Nsize/Nrows/Ncols', $header);


for($i = 0; $i < $fields['size']; $i++){

    $imageBytes = fread($fr, $fields['rows']*$fields['cols']);
    $images[] = array_map(function ($b){
        return $b / 255;
    }, array_values(unpack('c*', $imageBytes)));
    //echo bin2hex(fread($fr,1));
}
// $data = fread($fr, 100);
//var_dump($images);

fclose($fr);

foreach($images AS $image){
    //var_dump($image);
    // for($i=0;$i=28;$i++){
    //     echo 
    // }
    $count = 1;
    $treshold = 28;
    foreach($image AS $pixel){

        $px = abs($pixel);
        if($px>0){
            $px=1;
        }

        if($count>=$treshold){
            echo PHP_EOL;
            $treshold = $treshold+28;
            //die;
        }else{
            echo $px;
        }
        $count++;
        
    }

    die;
}

die;

// $input = array();

// //read characters line by line and add to $input
// foreach($pixels AS $pixel){

//     $input[] = $pixel;

// }
   

// print count($input);