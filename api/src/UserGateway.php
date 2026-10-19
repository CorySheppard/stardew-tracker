<?php

use Map\UserTableMap;

class UserGateway
{
    public function get(string $id): array | false
    {
        $query = new UserQuery();
        $user = $query->findPk($id);

        if (!empty($user)) {
            return $user->toArray(UserTableMap::TYPE_FIELDNAME);
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

    public function update(array $current, array $new): int
    {
        if (! empty($new["password_hash"])) {
            $passwordHash = password_hash($new["password_hash"], PASSWORD_DEFAULT);
        }

        $user = UserQuery::create()->findPk($current["id"]);
        $user->setUsername($new["username"] ?? $current["username"]);
        $user->setEmail($new["email"] ?? $current["email"]);
        $user->setPasswordHash($passwordHash ?? $current["password_hash"]);
        $rows = $user->save();

        return $rows;
    }
}