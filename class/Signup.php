<?php

class Signup {
	private $error = "";

	public function evaluate($data) {
		foreach ($data as $key => $value) {
			if (empty($value)) {
				$this->error = $this->error . $key . " is empty!<br>";
			}
		}

		if ($this->error == "") {
			// There's no error
			$this->create_user($data);
		} else {
			return $this->error;
		}
	}

	public function create_user($data) {
		$first_name = $data['first_name'];
		$last_name = $data['last_name'];
		$gender = $data['gender'];
		$email = $data['email'];
		$password = $data['password'];

		// create the information
		$url_address = strtolower($first_name) . "." . strtolower($last_name);
		$userid = $this->create_userid();

		$query = "INSERT INTO users (userid, first_name, last_name, gender, email, password, url_address) VALUES ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";

		//echo $query;
		$DB = new Database();
		$DB->save($query);
	}
	private function create_userid() {
		$length = rand(4, 19);
		$number = "";

		for($i=0; $i < $length; $i++) {
			$new_rand = rand(0, 9);
			$number = $number . $new_rand;
		}

		return $number;
	}

}
