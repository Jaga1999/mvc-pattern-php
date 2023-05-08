<?php

include("../model/user-model.php");

class UserController
{
	//GETALL
	public function get()
	{
		include('../config/db-connection.php');
		//SELECT `id`, `name`, `status` FROM `category`
		$query = "SELECT * FROM `user`";
		$result = mysqli_query($db_connection, $query);
		$users = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$user = new User($row['id'], $row['name'], $row['email'], $row['mobile'], $row['password'], $row['status']);
			$users[] = $user;
		}
		//return all the categories from the database
		return $users;
	}

	//GETBYID
	public function getById($id){
		include('../config/db-connection.php');
		//SELECT `id`, `name`, `status` FROM `category` WHERE id = `id`
		$query = "SELECT * FROM `user`  WHERE id = " .$id;
		$result = mysqli_query($db_connection,$query);
		
		$user = null;
		if ($row = mysqli_fetch_assoc($result)) {
			$user = new User($row['id'], $row['name'], $row['email'], $row['mobile'], $row['password'], $row['status']);
		}
	
		return $user;
	}

    //GETBYEEMAIL
	public function getByEmail($email)
	{
		include('../config/db-connection.php');
		//SELECT `id`, `name`, `status` FROM `category`
		$query = "SELECT * FROM `user` WHERE email = '". $email . "'";
		$result = mysqli_query($db_connection,$query);
		
		$user = null;
		if ($row = mysqli_fetch_assoc($result)) {
			$user = new User($row['id'], $row['name'], $row['email'], $row['mobile'], $row['password'], $row['status']);
		}
	
		return $user;
	}

    //GETALLNAME IN ASCENDING ORDER
	public function getByNameAsc()
	{
		include('../config/db-connection.php');
		//SELECT `id`, `name`, `status` FROM `category`
		$query = "SELECT * FROM `user` ORDER BY name ASC";
		$result = mysqli_query($db_connection, $query);
		$users = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$user = new User($row['id'], $row['name'], $row['email'], $row['mobile'], $row['password'], $row['status']);
			$users[] = $user;
		}
		//return all the categories from the database
		return $users;
	}

    //GETALLBYSTATUS
	public function getByStatus($status)
	{
		include('../config/db-connection.php');
		//SELECT `id`, `name`, `status` FROM `category`
		$query = "SELECT * FROM user WHERE status ='". $status . "'";
		$result = mysqli_query($db_connection, $query);
		$users = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$user = new User($row['id'], $row['name'], $row['email'], $row['mobile'], $row['password'], $row['status']);
			$users[] = $user;
		}
		//return all the categories from the database
		return $users;
	}

	//CREATE
	public function add($user)
	{
		include('../config/db-connection.php');
		//INSERT INTO `scale`(`id`, `name`, `status`) VALUES ('[value-1]','[value-2]','[value-3]')
		$query = "INSERT INTO `user`(`name`,`email`,`mobile`,`password`, `status`) VALUES ('" . $user->getName() . "','" . $user->getEmail() . "','" . $user->getMobile() . "','" . $user->getPassword() . "','" . $user->getStatus() . "')";
		mysqli_query($db_connection, $query);
		//get the id of the last inserted row
		return mysqli_insert_id($db_connection);
	}

	//UPDATE
	public function update($user)
	{
		include('../config/db-connection.php');
		//UPDATE `category` SET `id`='[value-1]',`name`='[value-2]',`status`='[value-3]' WHERE id = `id`
		$query = "UPDATE `user` SET `name`='" . $user->getName() . "',`email`='" . $user->getEmail() . "',`mobile`='" . $user->getMobile() . "',`status`='" . $user->getStatus() . "' WHERE id = " . $user->getId();
		return mysqli_query($db_connection, $query);
	}

	//DELETE
	public function delete($user)
	{
		include('../config/db-connection.php');
		//DELETE FROM `category` WHERE id = `id`
		$query = "delete from `user` WHERE id = " . $user->getId();
		return mysqli_query($db_connection, $query);
	}
}
