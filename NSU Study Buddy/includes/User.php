<?php
class User {
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters and setters for user properties

    // Other user-related methods (e.g., validation, CRUD operations)
}
?>
