<?php
namespace App\Model;

class Artist 
{
    protected $name;
    protected $created; 
    protected $id;

    public function __construct($name, \DateTime $created = null, $id = null) 
    {
        $this->name      = $name;
        $this->created   = $created;
        $this->id        = $id;
    }

    public function name() 
    {
        return $this->name;
    }

    public function id() 
    {
        return $this->id;
    }

}