<?php

class User
{
    private string $email;
    private string $password;
    private string $name;
    private string $surname;
    private string $nickname;
    private array $privateBooksList;
    public function __construct(string $email,string $password,string $nickname="",string $name = "",string $surname ="",$privateBooksList=[])
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->nickname = $nickname;
        $this->privateBooksList = $privateBooksList;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
    }


    public function getPrivateBooksList(): array
    {
        return $this->privateBooksList;
    }

    public function setPrivateBooksList(array $privateBooksList): void
    {
        $this->privateBooksList = $privateBooksList;
    }


}