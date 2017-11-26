<?php

class User {

    private $id;
    private $username;
    private $password;
    private $email;
    private $createdAt;

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            
            $method = 'set' . ucfirst($key);

            if (gettype($value) === 'object') {
                debug_value($value);
                $value->format("Y-m-d H:i:s");
                echo $method . ' ' . $key;
                $this->$method($value);
                echo $key . '=>' . $value . '<br>';
            }
            if(method_exists($this, $method) && gettype($value) === 'string')
            {
                $this->$method($value);
                 echo $key . '=>' . $value . '<br>';
            }
            
           
        }
    }

    public function __toString() {
          $str =  $this->getUsername() . ' ' . $this->getPassword() . ' ' . $this->getEmail();
    
        return $str;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

}
