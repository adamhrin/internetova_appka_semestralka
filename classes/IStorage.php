<?php

interface IStorage
{
    public function storeUser(User $data);

    /**
     * @return User[]
     */
    public function getAllUsers();
}