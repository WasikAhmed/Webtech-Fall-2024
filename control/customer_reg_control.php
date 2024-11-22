<?php
session_start(); // Start session for passing data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $country = $_POST['country'] ?? '';
    $buy = $_POST['buy'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    $terms = isset($_POST['terms']);

    $errors = []; // Initialize an error array

    // Full Name: Only letters and spaces, at least one uppercase letter
    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
        $errors[] = "Full Name must contain only letters and spaces.";
    } elseif (!preg_match("/[A-Z]/", $fullname)) {
        $errors[] = "Full Name must contain at least one uppercase letter.";
    }

    // Email: Must be in valid format and end with ".xyz"
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, ".com")) {
        $errors[] = "Email must be a valid email address and end with '.com'.";
    }

    // Phone: Must start with 0 and be exactly 11 digits
    if (empty($phone)) {
        $errors[] = "Phone Number is required.";
    } elseif (!preg_match("/^0\d{10}$/", $phone)) {
        $errors[] = "Phone Number must start with 0 and be exactly 11 digits.";
    }

    // Address: Required field
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // Password: At least one numeric character
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match("/\d/", $password)) {
        $errors[] = "Password must contain at least one numeric character.";
    }

    // Confirm password matches
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Country selection
    if (empty($country)) {
        $errors[] = "Please select a country.";
    }

    // Buy option selection
    if (empty($buy)) {
        $errors[] = "Please specify if you can buy products.";
    }

    // Payment method selection
    if (empty($payment_method)) {
        $errors[] = "Please select a payment method.";
    }

    // Terms and conditions
    if (!$terms) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    // Check if there are errors
    if (!empty($errors)) {
        // Store errors and input data in the session
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST;

        // Redirect back to the form
        header("Location: ../Customer/registration.php");
        exit();
    } else {
        // Prepare data for writing to JSON
        $userData = [
            "fullname" => $fullname,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,
            "password" => password_hash($password, PASSWORD_DEFAULT), // Hash the password for security
            "country" => $country,
            "buy" => $buy,
            "payment_method" => $payment_method,
        ];

        // JSON file path
        $filePath = __DIR__ . "/../data/userdata.json";

        // Check if file exists and read data
        if (file_exists($filePath)) {
            $existingData = json_decode(file_get_contents($filePath), true);
            if ($existingData === null) {
                $existingData = []; // Initialize as empty array if JSON is invalid
            }
        } else {
            $existingData = []; // Initialize as empty array if file doesn't exist
        }

        // Add new data to existing data
        $existingData[] = $userData;

        // Write to JSON file
        if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
            // Successful registration
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../Customer/registration.php");
            exit();
        } else {
            $errors[] = "Failed to write data to userdata.json. Check file permissions.";
            $_SESSION['errors'] = $errors;
            header("Location: ../Customer/registration.php");
            exit();
        }
    }
}
?>
