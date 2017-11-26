<?php

class UserMySQL implements UserHandler {

    protected $pdo = null;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate($username, $password){
        
        // verification du $username
        
        // vérification du $password
        return false;
        
    }

    public function add(User $user) {
        // création de la requête
        $sql = 'INSERT INTO user VALUES(null, :name, :pass, :email, :date)';
        echo $user->getEmail() . ' test <br>';
        echo $sql;
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array(
            'name' => $user->getUsername(),
            'pass' => $user->getPassword(),
            'email' => $user->getEmail(),
            'date' => $user->getCreatedAt(),
        ));
        
    }

    public function all() {
        
    }

    public function delete(User $user) {
        
    }

    public function findBy($id) {
        
    }

}
