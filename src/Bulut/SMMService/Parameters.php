<?php


namespace Bulut\SMMService;


class Parameters
{
    public $Name;
    public $Value;

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @param mixed $Value
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
    }


}