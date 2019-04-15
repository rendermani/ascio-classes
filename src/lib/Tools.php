<?php
namespace ascio\lib;
use ascio\lib\AscioApiInterface;
use ascio\lib\v2\Order;

class Tools {
    /**
     * Uses the Set and Get function, to merge parameters from 
     * 
     * @param Object $target copy from
     * @param Object $target copy to
     */
    public static function mergeProperties($source,$target) {
        //OPTIMIZE Replace this with Tools::merge
        foreach(Tools::getProperties($source) as $key => $value) {               
            if(!$value) continue;
            $value = convertDate($key,$value);
            if(Tools::hasSetters($target)) {
                $setFunction = "set".$key;                 
                if(method_exists($target,$setFunction)) {
                    $subSource = $value; 
                    $subTarget = $target->{"get".$key}();                     
                    if(is_object($subTarget) && $subTarget->db && is_object($value)) {
                        $value->db = $subTarget->db;                                              
                        if($value->properties) {
                            $subTarget->properties = $value->properties;  
                            $subTarget->properties->setObject($value);                      }
                    }
                    $target->$setFunction($value);
                }
                
            } else {
                if(is_array($target)) {
                    $target[$key] = $value;
                } else {
                    $target->$key = $value; 
                }
            }
            if(Tools::isWriteObject($value)) { 
                if($value->db == null) {
                    $value->__construct();
                }
            }
        }
        return $target;
    }
    public static function merge ($source,$target) {
        if(is_object($target) &&! $target->db) $target->__construct();
        foreach(self::getProperties($source) as $var => $property) {           
            if($property == null) continue;
            if(is_array($target)) {
                $target[$var] = $property;
            } 
            elseif (is_object($property) && strpos(get_class($property),"ascio\\lib\\v") !== false) {
                $targetValue = $target->{"get".$var}();
                // if target has no object, or string (handleId)
                if(!$targetValue || is_string($targetValue)) {
                    $class = get_class($property);
                    $newObject = new $class();
                    $target->{"set".$var}($newObject);
                }             
                self::merge($property, $target->{"get".$var}());
            }  
            elseif (isset($property) && method_exists($target,"set".$var)) {
                $property = convertDate($var,$property);
                $target->{"set".$var}($property);
            }                   
        } 
        self::mergeAdditionalProperties($source,$target);
        return $target;      
    }
    public static function mergeAdditionalProperties($source,$target) {
        if(! (is_array($source) || is_object($source))) return;
        foreach($source as $key => $value)  {            
            if(!method_exists($target,"set".$key) &&! isset($target->$key)) {
                $target->$key = $value;
            }
        }
    }
    public static function mergeTemporaryHandles(ApiObjectInterface $source, ApiObjectInterface $target) {        
        if(!$target->db) $target->db = $source->db;
        if(!$target->getHandle()) {
            $target->setHandle($source->db->getOldHandle());
        }
        foreach($source->properties->getObjects() as $key => $object) {            
            self::mergeTemporaryHandles($object,$target->{"get".$key}());
        }        
    }
    public static function getProperties($obj) {
        $out = [];
        if(Tools::hasSetters($obj) ){
            foreach(get_class_methods($obj) as $key => $setFunction) {
                if(strpos($setFunction,"set")===0 && $setFunction !== "set") {
                    $name = preg_replace('/^(set)/','',$setFunction);
                    $getFunction = "get".$name; 
                    $value = $obj->$getFunction();
                    convertDate($key,$value);
                    $out[$name] = $value;
                }                
            }
        } else {
           $out = $obj;
        } 
        return $out;
    }
    /**
     * When classes are created from the SOAP Client, the Constructor is not called. Workaround. 
     */
    public function reuseHandles($object)  {
        if(Tools::hasSetters($object)) {     
            foreach(Tools::getProperties($object) as $key => $property) {
                if($property->reuseHandles == true) {
                    $result = $property->db->same()->first();
                    if($result->exists()) {
                        $handle = $result->getAttributes()["Handle"];
                        $class = get_class($property);
                        $handleObject = new $class();
                        $handleObject->setHandle($handle);
                        $handleObject->db->fullData = false;
                        $object->{"set".$key}($handleObject);
                        continue;
                    }
                } 
                Tools::reuseHandles($property);     
                
            }
         }        
    }
     /**
     * After creating an order, all Domain Handles need to be updated
     * The temporary handle is not needed, no new domain is created
     */
    public function relinkHandles(Order $order)  {
        $oldHandle = $order->db->getOldHandle();
        $handle = $order->getHandle();
        if($oldHandle != $handle) {
            $order->db->where("OrderId",$oldHandle)->update(["OrderId"=>$handle]);
        }
        $oldDomainHandle = $order->getDomain()->db->getOldHandle();
        $domainHandle = $order->getDomain()->getHandle();
        if($oldDomainHandle != $domainHandle) {
             $order->db->where("Domain",$oldDomainHandle)->update(["Domain"=>$domainHandle]);
         }
    }
    public static function hasSetters($obj) {
        if(!is_object($obj)) return false;
        return 
            strpos(get_class($obj),"ascio\\lib\\v2\\")===0 ||
            strpos(get_class($obj),"ascio\\lib\\v3\\")===0 ||
            strpos(get_class($obj),"ascio\\v2\\")===0 ||
            strpos(get_class($obj),"ascio\\v3\\")===0;
    }
    public static function debug($string) {
        if(Ascio::getConfig()->debug===false) {
            return;
        }
        $br = php_sapi_name() == "cli" ? "\n" : "<br>";
        $date = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
        $out =  "[".date("Y-m-d H:i:s")."] ".$string.$br;
        echo $out;
        syslog(LOG_INFO,$out);
    }
    public static function log() {

    }
    public static function debugHandles($domain,$txt){
        return ;
        echo "\n\n".$txt."\n"; 
        echo "Handle: ". $domain->getHandle()."\n";
        echo "OldHandle: ". $domain->db->getOldHandle()."\n";

        echo "Registrant before merge\n"; 
        echo "Handle: ". $domain->getRegistrant()->getHandle()."\n";
        echo "OldHandle: ". $domain->getRegistrant()->db->getOldHandle()."\n";
    }
    public static function isWriteObject($value) {
        return is_object($value) && (strpos(get_class($value),"ascio\\lib\\v") !== false);
    }
} 
function convertDate($key,$value) {
     //WORKAROUND: Lavarell modell doesn't cast dates as it should
    $dates = ["CreDate","ExpDate"];
    if(is_string($value) && in_array($key,$dates)) {
        return new \DateTime($value, new \DateTimeZone('UTC'));
    }
    return $value;
}