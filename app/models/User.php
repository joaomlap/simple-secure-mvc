<?php

class User extends Model{

	protected $table = "users";

	public function all(){
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
	}

	public function add($user){

		$sql = "INSERT INTO $this->table (email, name) VALUES (:email, :name)";
		$stmt = $this->db->prepare($sql);
		return $stmt->execute(array(':email'=>$user['email'], ':name'=>$user['name']));
	}

}