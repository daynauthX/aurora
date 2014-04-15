<?php
class DateHelper {
    public static function toString($date){
        return $date;
    }
    
    public static function fromString($string){
        $date = '';
        $len = strlen($string);
        if($len == 8){
            //start the conversion
            $date = substr($string, 0, 2) . '/' . substr($string, 2, 2) . '/' . substr($string, 4, 4); 
        }
        else if($len < 8 && $len >= 6){
            //add 0's to even out the string
        }
        else{
            //invalid string, do something else
            $date = null;
        }
        return $date;
    }
}

