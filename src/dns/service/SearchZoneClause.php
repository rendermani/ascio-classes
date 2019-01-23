<?php

namespace ascio\dns;

class SearchZoneClause
{

    /**
     * @var SearchOperatorType $Operator
     */
    protected $Operator = null;

    /**
     * @var SearchZoneField $SearchZoneField
     */
    protected $SearchZoneField = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @param SearchOperatorType $Operator
     * @param SearchZoneField $SearchZoneField
     */
    public function __construct($Operator, $SearchZoneField)
    {
      $this->Operator = $Operator;
      $this->SearchZoneField = $SearchZoneField;
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
     * @return \ascio\dns\SearchZoneClause
     */
    public function setOperator($Operator)
    {
      $this->Operator = $Operator;
      return $this;
    }

    /**
     * @return SearchZoneField
     */
    public function getSearchZoneField()
    {
      return $this->SearchZoneField;
    }

    /**
     * @param SearchZoneField $SearchZoneField
     * @return \ascio\dns\SearchZoneClause
     */
    public function setSearchZoneField($SearchZoneField)
    {
      $this->SearchZoneField = $SearchZoneField;
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
     * @return \ascio\dns\SearchZoneClause
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
