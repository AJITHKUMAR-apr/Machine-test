
<div ><h3>Welcome</h3></div>
<?php
function string_transform($inputStr,$position,$place){
    $outputStr = "invalid request";
    $strArray = str_split($inputStr);
    if(($postion+$place) < count($strArray)){
        $outArray = [];
        foreach($strArray as $index => $charItem){
            $element = ($index==($position-1))? $charItem : "";
            if(!isset($element){
                $outArray[$index]=$charItem;
            }else{
                if($index==($position+$place-1)){
                    $outArray[$index-1]=$element;
                    unset($element);
                    $outArray[$index]=$charItem;
                }else{
                    $outArray[$index-1]=$charItem;
                }
            }
        }
        $outputStr=implode("",$outArray );
    }
    return $outputStr;
}

$out=string_transform("Elephant",3,2);
echo $out;
