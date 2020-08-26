<?php
$columns = "";
$data = ""; 

 function flatten_columns($items,$parent, &$columns) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            //print $item . "\n\t||CHILDREN||\n" ;
            $columns .= $parent . flatten_columns($value, $key, $columns) ;
        }else{
            if($parent != ""){
                //not the parent
                $columns .= $parent. "-" . $key . ",";
            }else{
                //is the parent
                $columns .= $key . ",";
            }
        }
    }
}
function flatten_data($items,$parent, &$data) {
    foreach($items as $key => $value) {
        if(is_array($value)){
            //print $item . "\n\t||CHILDREN||\n" ;
            $data .= flatten_data($value, $key, $data) ;
        }else{
            $data .= $value . ",";
        }
    }
}
$json = '{
  "date": "08/07/2020",
  "Quality": {
    "affordable": 5,
    "does what it claims": 1,
    "easy to use": 1,
    "better then others": 1
  },
  "satisfaction": "5",
  "recommend friends": "5",
  "suggestions": "dasdasd",
  "price to competitors": "Less expensive",
  "price": "low",
  "pricelimit": {
    "mostamount": "asdasd",
    "leastamount": "asdasd"
  },
  "email": "asdasddas"
}';



$submission1 = '{
    "date": "08/07/2020",
    "Quality": {
      "affordable": 5,
      "does what it claims": 1,
      "easy to use": 1,
      "better then others": 1
    },
    "satisfaction": "5",
    "recommend friends": "5",
    "suggestions": "dasdasd",
    "price to competitors": "Less expensive",
    "price": "low",
    "pricelimit": {
      "mostamount": "asdasd",
      "leastamount": "asdasd"
    },
    "email": "asdasddas"
  }';
$submission2 = '{
    "date": "08/07/2020",
    "Quality": {
      "affordable": 5,
      "does what it claims": 1,
      "easy to use": 1,
      "better then others": 1
    },
    "satisfaction": "5",
    "recommend friends": "5",
    "suggestions": "dasdasd",
    "price to competitors": "Less expensive",
    "price": "low",
    "pricelimit": {
      "mostamount": "asdasd",
      "leastamount": "asdasd"
    },
    "email": "asdasddas"
  }';


//populate with columns and data
flatten_columns(json_decode($json,true),"", $columns);
flatten_data(json_decode($json,true),"", $data);
$data .= "\n" . $data;
flatten_data(json_decode($submission1,true),"", $data);
$data .= "\n" . $data;
flatten_data(json_decode($submission2,true),"", $data);

Print "Columns\n";
print substr($columns, 0, -1);
Print "\ndata\n";
print substr($data, 0, -1);


$myfile = fopen("submission.csv", "w") or die("Unable to open file!");
$txt = $columns ."\n". $data;
fwrite($myfile, $txt);
fclose($myfile);


?>
