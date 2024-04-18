<?php
namespace App\Repositories\RepositoryClasses;
use App\Models\Bank;
use App\Repositories\RepositoryIntefaces\BankInterface;

class BankRepository implements BankInterface{
    public function getAllBank(){
        return Bank::all();
    }
    public function editBank($id){
        return Bank::findOrFail($id);
    }
}
