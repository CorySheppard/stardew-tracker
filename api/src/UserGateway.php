<?php

class UserGateway
{
    public function get(string $id): array | false
    {
        $query = new UserQuery();
        $user = $query->findPk($id);

        if (!empty($user)) {
            return $user->toArray();
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $users = UserQuery::create()->find()->toArray();
        return $users;
    }

    public function create(array $data)
    {
        $passwordHash = password_hash($data["password"], PASSWORD_DEFAULT);

        $user = new User();
        $user->setUsername($data["username"]);
        $user->setEmail($data["email"]);
        $user->setPasswordHash($passwordHash);
        $user->save();

        return $user->getId();
    }
}