<?php declare(strict_types=1);
final class Users
{
    public static $users = [];

    public static function find($id)
    {
        foreach (Users::$users as $user) {
            if ((int)$user->getId() == (int)$id) {
                return $user;
            }
        }

        return null;
    }

    public static function create($data)
    {
        Users::$users = [];

        foreach ($data as $user) {
            Users::$users[] = User::create($user['id'], $user['is_taxed']);
        }
    }
}

