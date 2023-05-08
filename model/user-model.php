<?php

//class name, file name should be same as the table name
class User
{

    //columns need to be as variables
    private $id;
    private $name;
    private $email;
    private $mobile;
    private $password;
    private $status;

    //group of all setters
    //fixed name - __construct [double underscore contstruct]
    public function __construct($id, $name, $email, $mobile, $password, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->password = $password;
        $this->status = $status;
    }

    //functions : setters and getters
    //getters : retrieve the values form the variables

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function getStatus()
    {
        return $this->status;
    }

    //setters : used to assign values to the variables

    public function setId($id)
    {
        //class id = function id
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
