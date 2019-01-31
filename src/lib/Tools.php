<?php
namespace ascio\lib;

class Tools {
    /**
     * Uses the Set and Get function, to merge parameters from 
     * 
     * @param Object $target copy from
     * @param Object $target copy to
     */
    public static function mergeProperties($source,$target) {
        foreach(get_class_methods($source) as $key => $setFunction) {
            if(strpos($setFunction,"set")===0) {
                $name = preg_replace('/^(set)/','',$setFunction);
                $getFunction = "get".$name; 
                $value = $source->$getFunction();
                if($value) {
                    $target->$setFunction($value);
                }
            }
        }
    }
    public static function debug($string) {
        $date = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
        echo "[".date("Y-m-d H:i:s")."] ".$string."\n";
    }
    public static function log() {

    }
} 