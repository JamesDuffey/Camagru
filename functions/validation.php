<?PHP
    function validate_password($passwd) {
	    if (!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,50}$/', $passwd)) {
	    	echo "<script>window.alert('Password needs to contain 6 characters, including 1 number and 1 special character.')</script>";
	    	exit();
	    }
    }

    function validate_name($name) {
	    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
	    	echo "<script>window.alert('Name can only contain letters and spaces.')</script>";
	    	exit();
	    }
    }

    function validate_surname($surname) {
	    if (!preg_match("/^[a-zA-Z ]*$/", $surname)) {
	    	echo "<script>window.alert('Surname can only contain letters and spaces.')</script>";
	    	exit();
	    }
    }

    function validate_email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>window.alert('Invalid email.')</script>";
            exit();
        }
    }
?>