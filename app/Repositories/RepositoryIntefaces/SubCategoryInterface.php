<?php
namespace App\Repositories\RepositoryIntefaces;
interface SubCategoryInterface {
public function  getAllSubCategory();
public function create(array $data);
public function editData($id);
}
