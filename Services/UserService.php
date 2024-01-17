<?php

namespace Services;
use Models\User;
use Repositories\UserRepository;

final class UserService
{
    protected $UserRepository;

    public function __construct()
    {
        $this->UserRepository = new UserRepository();
    }

    final public function find(string $id): ?User
    {
        return $this->UserRepository->find($id);
    }
}
