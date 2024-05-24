<?php
class ValidatorDecorator {
    protected $nextValidator;

    public function setNext($validator) {
        $this->nextValidator = $validator;
    }

    public function validate($data) {
        if ($this->nextValidator) {
            return $this->nextValidator->validate($data);
        }
        return true;
    }
}

class UsernameValidator extends ValidatorDecorator {
    public function validate($data) {
        if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $data['username'])) {
            return false;
        }
        return parent::validate($data);
    }
}

class PasswordValidator extends ValidatorDecorator {
    public function validate($data) {
        if (strlen($data['password']) < 6) {
            return false;
        }
        return parent::validate($data);
    }
}
?>
