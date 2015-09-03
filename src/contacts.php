<?php

class Contacts
{
    private $name;
    private $phone_number;
    private $address;

    function __construct($name, $phone_number, $address) {

        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->address = $address;
    }

    function getName($name) {

        return $this->name;
    }

    function getPhoneNumber($phone_number) {

        return $this->phone_number;
    }

    function getAddress($address) {

        return $this->address;
    }

    function setName($new_name) {

        $this->name = $new_name;
    }

    function setPhoneNumber($new_phone_number) {

        $this->phone_number = (string) $new_phone_number;
    }

    function setAddress($new_address) {

        $this->address = (string) $new_address;
    }

    function save() {

        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll() {

        return $_SESSION['list_of_contacts'];

    }

    static function deleteAll() {

        return $_SESSION['list_of_contacts'] = array();

    }

}
?>
