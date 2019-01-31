<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Ascio;
use ascio\lib\Tools;
use Wsdl2PhpGenerator\Tests\Functional\NullableTest;

class Domain extends v2\Domain {
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->setCreDate(new \DateTime());
        $this->setExpDate(new \DateTime());
    }
    
    /**
     * Get the Domain-Data via API
     * @param string $handleOrDomainName Can use a handle or domain-name. Using a domain-name is slower. if null, $this->handle is used
     */
    public function get($handleOrDomainName=null) : Domain  {
        $handleOrDomainName = $handleOrDomainName ? $handleOrDomainName : $this->getDomainHandle(); 
        assert(isset($handleOrDomainName),new \Exception('Please provide a DomainName, Handle, or use $this->setDomainHandle()'));
        if(\strpos($handleOrDomainName,".")) {    
            // set filters        
            $clause = new v2\Clause(v2\SearchOperatorType::Is);
            $clause->setAttribute("DomainName");
            $clause->setValue($handleOrDomainName);                                
            $criteria = new v2\SearchCriteria(v2\SearchModeType::Any);            
            $criteria->setClauses([$clause]);
            $criteria->setWithoutstates(["Deleted"]);
            $searchDomain = new v2\SearchDomain(0,$criteria);
            // search the domain
            $result = Ascio::getClientV2()->SearchDomain();
            $domain = $result->getDomains()->getDomain();
        } else {
            $result = Ascio::getClientV2()->GetDomain(new v2\GetDomain(0,$handleOrDomainName));
            $domain = $result->getDomain();
        }
        Tools::mergeProperties($domain,$this);
        return $this;
    }
}

