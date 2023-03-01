<?php
use App\User;

spl_autoload_register(function ($class) {
    require_once("$class.php");
});


User::insert(['name' => 'boss', 'age' => 21]);

User::update(['name' => 'boss update', 'age' => 24], "id = :c_id", ['c_id' => 1]);

User::delete("id = :id", ['id' => 1]);

echo json_encode(User::select(['name', 'age']));