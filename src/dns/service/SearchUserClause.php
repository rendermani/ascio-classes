<?php

namespace ascio\dns;

class SearchUserClause
{

    /**
     * @var SearchOperatorType $Operator
     */
    protected $Operator = null;

    /**
     * @var SearchUserField $SearchUserField
     */
    protected $SearchUserField = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @param SearchOperatorType $Operator
     * @param SearchUserField $SearchUserField
     */
    public function __construct($Operator, $SearchUserField)
    {
      $this->Operator = $Operator;
      $this->SearchUserField = $SearchUserField;
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
     * @return \ascio\dns\SearchUserClause
     */
    public function setOperator($Operator)
    {
      $this->Operator = $Operator;
      return $this;
    }

    /**
     * @return SearchUserField
     */
    public function getSearchUserField()
    {
      return $this->SearchUserField;
    }

    /**
     * @param SearchUserField $SearchUserField
     * @return \ascio\dns\SearchUserClause
     */
    public function setSearchUserField($SearchUserField)
    {
      $this->SearchUserField = $SearchUserField;
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
     * @return \ascio\dns\SearchUserClause
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
