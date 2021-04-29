<?php

class Name
{

    private $firstName;
    private $lastName;
    private $gender;
    private $age;
    private $email;

    public function __construct($firstNames, $lastNames)
    {
        $this->gender = rand(0, 1) ? 'male' : 'female';
        $this->firstName = $this->createFirstName($firstNames);
        $this->lastName = $this->createLastName($lastNames);
        $this->age = rand(1, 100);
        $this->email = $this->createEmail();
    }

    private function createFirstName($firstNames)
    {

        return $firstNames[$this->gender][rand(0, 9)];
    }

    private function createLastName($lastNames)
    {
        return $lastNames[rand(0, 9)];
    }

    private function createEmail()
    {
        $firstName = mb_strtolower($this->firstName);
        $lastName = mb_strtolower($this->lastName);

        $search  = array('å', 'ä', 'ö', 'é', '-', ' ');
        $replace = array('a', 'a', 'o', 'e', '',  '');
        $firstName = str_replace($search, $replace, $firstName);
        $lastName = str_replace($search, $replace, $lastName);

        $firstName = mb_substr($firstName, 0, 2);
        $lastName = mb_substr($lastName, 0, 3);

        $email = "$firstName$lastName@example.com";

        return $email;
    }

    public function toArray()
    {
        $array = array(
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "gender" => $this->gender,
            "age" => $this->age,
            "email" => $this->email
        );
        return $array;
    }
}
