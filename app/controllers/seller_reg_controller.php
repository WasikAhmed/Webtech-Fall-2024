<?php
$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Full Name
    if (empty($_POST["full_name"])) {
        $errors["name_err"] = "Full Name is required";
    } else {
        $data["full_name"] = htmlspecialchars($_POST["full_name"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors["email_required_err"] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email_validation_err"] = "Invalid email format";
    } else {
        $data["email"] = htmlspecialchars($_POST["email"]);
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $errors["pass_err"] = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $errors["pass_err"] = "Password must be at least 6 characters";
    } else {
        $data["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }

    // Validate Phone Number
    if (empty($_POST["phone"])) {
        $errors["phone_err"] = "Phone Number is required";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $_POST["phone"])) {
        $errors["phone_err"] = "Invalid phone number format";
    } else {
        $data["phone"] = htmlspecialchars($_POST["phone"]);
    }

    // Business Information
    $data["business_name"] = htmlspecialchars($_POST["business_name"]);
    $data["business_address"] = htmlspecialchars($_POST["business_address"]);
    $data["tax_id"] = htmlspecialchars($_POST["tax_id"]);
    $data["bank_account"] = htmlspecialchars($_POST["bank_account"]);
    $data["business_type"] = htmlspecialchars($_POST["business_type"]);
    $data["business_start_date"] = htmlspecialchars($_POST["business_start_date"]);

    // Additional Information
    $data["preferred_contact_method"] = htmlspecialchars($_POST["preferred_contact_method"]);
    $data["website"] = htmlspecialchars($_POST["website"]);
    $data["terms"] = isset($_POST["terms"]) ? true : false;

    // Check for errors
    if (empty($errors)) {
        $file_path = '../../../data/sellers.json';
        $dir_path = dirname($file_path);

        // Create directory if it doesn't exist
        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }

        if (file_exists($file_path)) {
            $existing_data = json_decode(file_get_contents($file_path), true);
        } else {
            $existing_data = [];
        }

        $existing_data[] = $data;

        // Save to file
        file_put_contents($file_path, json_encode($existing_data, JSON_PRETTY_PRINT));

        $submission_message = "Form submitted successfully!";
    } else {
        $submission_message = "Please correct the errors. Form submission failed!";
    }
}
?>