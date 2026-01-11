<?php

namespace Core\Modules\Main;

use Core\Tables\UsersTable;

class User
{
    private int $id;
    private string $nickname;
    private string $email;
    private int $level;

    public function setDataByEmail(string $email) : void
    {
        $data = (new UsersTable())->getByEmail($email);

        if (empty($data))
        {
            $data = $this->createEmptyUser();
        }

        $this->set($data);
    }

    public function setDataById(int $id) : void
    {
        $data = (new UsersTable())->getById($id);

        if (empty($data))
        {
            $data = $this->createEmptyUser();
        }

        $this->set($data);
    }

    private function set(array $data) : void
    {
        $this->nickname = $data['nickname'];
        $this->email = $data['email'];
        $this->id = $data['id'];
        $this->level = $data['level'];
    }

    public function getNickname() : string
    {
        return $this->nickname;
    }

    public function createEmptyUser() : array
    {
        return [
            'id' => null,
            'name' => 'Гость',
            'email' => null,
            'level' => 0,
        ];
    }

    public function isAdmin() : bool
    {
        return $this->level >= 100;
    }

    public function isGuest() : bool
    {
        return $this->level == 0;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getId() : int
    {
        return $this->id;
    }
}