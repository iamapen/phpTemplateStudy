<?php
namespace Poppy\TemplateStudy\Entity;

class User {

    private $firstName;
    private $lastName;
    private $address;
    private $gender;

    public function __construct($firstName, $lastName, $address, $gender) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->gender = $gender;
    }


    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFullName() {
        return sprintf('%s%s', $this->getFirstName(), $this->getLastName());
    }

    public function getAddress() {
        return $this->address;
    }

    public function getGender() {
        return $this->gender;
    }
}
