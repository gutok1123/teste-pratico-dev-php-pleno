<?php
namespace App\Interface;
use App\Entity\StudentEntity;

interface StudentInterface
{
    public function create(array $request): StudentEntity;
    public function findReturnModel(int $id): StudentEntity;
    public function update(array $request, int $id): mixed;
    public function findUser(int $id): mixed;
    public function delete(int $id): string;
    public function showAll():Array;
    
}