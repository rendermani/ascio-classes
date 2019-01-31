<?php
namespace ascio\lib;

class Actions {
    public static function Completed (v2\Order $order) {
        Actions::Default($order);

    }
    public static function Failed (v2\Order $order) {
        Actions::Default($order);

    }
    public static function Invalid (v2\Order $order) {
        Actions::Default($order);

    }
    public static function Pending_End_User_Action (v2\Order $order) {
        Actions::Default($order);

    }
    public static function Pending_Documentation (v2\Order $order) {
        Actions::Default($order);

    }
    public static function Validated (v2\Order $order) {
        Actions::Default($order);

    } 
    public static function Documentation_Received (v2\Order $order) {
        Actions::Default($order);

    } 
    public static function Documentation_Approved (v2\Order $order) {
        Actions::Default($order);

    }    
    public static function Documentation_Not_Approved (v2\Order $order) {
        Actions::Default($order);
    }    
    public static function Pending_NIC_Processing (v2\Order $order) {
        Actions::Default($order);
    }        
    public static function Pending_Internal_Processing  (v2\Order $order) {
        Actions::Default($order);
    }  
    public static function Pending_Post_Processing  (v2\Order $order) {
        Actions::Default($order);
    }     
    public static function Default (v2\Order $order)  {
        Tools::debug($order->getType()." - ".$order->getOrderId().", ".$order->getDomain()->getDomainName().": ". $order->getStatus());
    }
}