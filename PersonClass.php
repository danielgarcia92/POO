<?php

class Person
{
    protected $firstName;
    protected $lastName;
    protected $nickname;

    public function __construct($firstName, $lastName, $nickname)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     * @throws Exception
     */
    public function setNickname($nickname)
    {
        if (empty($nickname))
            throw new Exception("El apodo no puede ir vacío");

        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return "$this->firstName $this->lastName mejor conocido como $this->nickname";
    }

}

$persona1 = new Person('Daniel', 'García', 'Master Boy');
$persona1->setNickname('Danielito Hot');
echo $persona1->getFullName();


