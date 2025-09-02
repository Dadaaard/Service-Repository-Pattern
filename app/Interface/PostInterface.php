<?php

namespace App\Interface;

interface PostInterface
{
    public function create(array $data);
    public function getBody(int $id): ?string;
}
