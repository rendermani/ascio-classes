<?php
namespace ascio\lib\v2;

use ascio\lib\v2\Message;
use ascio\lib\Ascio;
use ascio\v2\PollMessage;
use ascio\v2\MessageType;
use ascio\v2\QueueItem;
use ascio\v2\GetMessageQueue;
use ascio\lib\v2\Order;
use ascio\v2\GetMessages;
use ascio\v2\OrderStatusType;
use ascio\model\v2\Order as AscioOrder;
use ascio\workflows\Workflow;
use ascio\workflows\Workflows;
use ascio\workflows\WorkflowStep;
use ascio\lib\AscioEnvironment;
use ascio\lib\Tools;
use ascio\v2\AckMessage;

class Callback {
    /**
     * @var QueueItem $queueItem
     */
    private $queueItem;
    /**
     * @var Message $message
     */
    private $message;
        /**
     * @var iterable $messages
     */
    private $messages;
    /**
     * @var Order $order
     */
    private $order;
    
    function __construct()
    {
        
    }
    function poll() : ?QueueItem {
        $result = Ascio::getClientV2()->PollMessage(new PollMessage(0,MessageType::Message_to_Partner));
        $queueItem = $result->getItem();        
        if($queueItem) {
            $orderId = $queueItem->getOrderId();
            $queueItem->setOrderId((Ascio::getEnvironment()==AscioEnvironment::Testing ? "TEST" : "").$orderId);
            $this->queueItem = $queueItem;
            $this->process($queueItem, $queueItem->getOrderStatus());
            Ascio::getClientV2()->AckMessage(new AckMessage(0,$queueItem->getMsgId()));
            return $queueItem;            
        }  
        return null;     
    }
    function pollCron() {
        $item = true; 
        while ($item) {
            $item = $this->poll();    
        }               
    }
    function processHttpCallback(string $orderId, string $msgId, OrderStatusType $status) {
        $result = $this->getQueueItemApi($msgId);
        $this->process($result->getItem(),$status);
    }
    private function process(QueueItem $queueItem, $status) {
        $orderId = $queueItem->getOrderId();
        Tools::debug("Poll ".$queueItem->getDomainName().": ".$orderId. ", ".$status);
        $msg = $queueItem->getMsg();
        switch ($status) {
            case OrderStatusType::Completed :    
                $this->updateOrderStatus($orderId,$status,$msg,200);
                $this->getOrderApi($orderId);
                $this->order->getDomain()->getApi();
                $this->nextWorkflow();
                break; 
            case OrderStatusType::Invalid :
            case OrderStatusType::Failed :
            case OrderStatusType::Pending_Documentation :
            case OrderStatusType::Pending_End_User_Action :
                $this->updateOrderStatus($orderId,$status,$msg,400);
                $this->getOrderApi($orderId);
                $this->getMessagesApi();
                $this->nextWorkflow();
                break;         
        }
        
    }
    private function nextWorkflow() {      
        $this->setWorkflowStatus();
        $step = Workflows::next($this);
        $domainName = $this->order->getDomain()->getDomainName();
        if($step) {            
            $nextDomainName = $step->getWorkflow()->getDomain()->getDomainName();
            $method = new ReflectionMethod(get_class($step->getWorkflow()), $step->getName());
            if(count($method->getParameters()) == 1) {
                
            }
            if( $nextDomainName !== $domainName) {
                $this->order->createQueued($domainName);
            }
        } else {
            $this->order->createQueued($domainName);
        }
    }
    private function setWorkflowStatus() : WorkflowStep {
        $workflow = new Workflow($this->getOrder()->getDomain());
        $step = new WorkflowStep($workflow);
        $step->current();
        $step->setStatus($this->order->getStatus());
        $step->setMessage($this->message);            
        if(in_array($step->getStatus(),[ OrderStatusType::Invalid,  OrderStatusType::Failed])) {
            $step->setCode(400);            
        }
        return $step;
    }
    /**
     * Get $queueItem
     *
     * @return  QueueItem
     */ 
    private function getQueueItemApi($msgId)
    {
        $result = Ascio::getClientV2()->GetMessageQueue(new GetMessageQueue(0,$msgId));
        $this->queueItem = $result->getItem();
        return $this->queueItem;
    }
    private function updateOrderStatus(string $orderId, $status, string $message, int $code) {
        $model = new AscioOrder(
            [               
                "Status" => $status,
                "Message" => $message,
                "Code" => $code
            ]        
        );
        $model->key = $orderId;
        $model->updateStatus();        
    }
    
    /**
     * Get $order
     *
     * @return  Order
     */ 
    private function getOrderApi($orderId)
    {
        $this->order = new Order();
        $this->order->getApi($orderId);
        return $this->order;
    }
    private function getMessagesApi() : iterable {
        $result = Ascio::getClientV2()->GetMessages(new GetMessages(0,$this->order->getOrderId()));
        foreach ($result->getMessages()->getMessage() as $key => $message) {
            /**
             * @var Message $message
             */
            $message->__construct();
            $message->setOrderId($this->order->getOrderId());
            $message->save();
            $this->message = $message;
        }
        $this->messages = $result->getMessages()->getMessage();
        return $result->getMessages()->getMessage();
    }

    /**
     * Get $queueItem
     *
     * @return  QueueItem
     */ 
    public function getQueueItem()
    {
        return $this->queueItem;
    }

    /**
     * Get $message
     *
     * @return  Message
     */ 
    public function getMessage() : Message
    {
        return $this->message;
    }
       /**
     * Get $messages
     *
     * @return  iterable
     */ 
    public function getMessages() : iterable
    {
        return $this->messages;
    }

    /**
     * Get $order
     *
     * @return  Order
     */ 
    public function getOrder()
    {
        return $this->order;
    }
}
function get_user_prop($className, $property) {
    if(!class_exists($className)) return null;
    if(!property_exists($className, $property)) return null;
  
    $vars = get_class_vars($className);
    return $vars[$property];
  }