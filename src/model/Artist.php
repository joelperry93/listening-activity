<?php
namespace App\Model;

class Artist 
{
    protected $name;
    protected $playCount; 
    protected $created;

    public function __construct($name, $playCount = 0, \DateTime $created = null) 
    {
        $this->name      = $name;
        $this->playCount = $playCount;
        $this->created   = $created;
    }

    public function name() 
    {
        return $this->name;
    }

    public function playCount()
    {
        return $this->playCount;
    }

}