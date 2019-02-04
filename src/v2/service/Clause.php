<?php

namespace ascio\v2;

class Clause
{

    /**
     * @var string $Attribute
     */
    protected $Attribute = null;

    /**
     * @var SearchOperatorType $Operator
     */
    protected $Operator = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
      return $this->Attribute;
    }

    /**
     * @param string $Attribute
     * @return \ascio\v2\Clause
     */
    public function setAttribute($Attribute)
    {
      $this->Attribute = $Attribute;
      return $this;
    }

    /**
     * @return SearchOperatorType
     */
    public function getOperator()
    {
      return $this->Operator;
    }

    /**
     * @param SearchOperatorType $Operator
     * @return \ascio\v2\Clause
     */
    public function setOperator($Operator)
    {
      $this->Operator = $Operator;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param string $Value
     * @return \ascio\v2\Clause
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
