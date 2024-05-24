<?php
class UserFactory {
    public static function createUser($username, $email, $password) {
        // Create a new User object with the provided data
        return new User($username, $email, $password);
    }

    // Other user creation methods if needed
}
?>
