<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Full Name
    if (empty($_POST["full_name"]) || strlen($_POST["full_name"]) < 4) {
        $errors[] = "Full Name must be at least 4 characters long.";
    }

    // Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || !preg_match("/@aiub\.edu$/", $_POST["email"])) {
        $errors[] = "Email must be a valid aiub.edu address.";
    }

    // Password
    if (empty($_POST["password"]) || strlen($_POST["password"]) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Phone Number
    if (empty($_POST["phone"]) || !preg_match("/^[0-9]{10,15}$/", $_POST["phone"])) {
        $errors[] = "Phone Number must contain only numbers and be between 10 and 15 digits.";
    }

    // Business Type
    $valid_business_types = ["retail", "wholesale", "manufacturer", "service"];
    if (empty($_POST["business_type"]) || !in_array($_POST["business_type"], $valid_business_types)) {
        $errors[] = "Please select a valid Business Type.";
    }

    // Preferred Contact Method
    $valid_contact_methods = ["email", "phone", "sms"];
    if (empty($_POST["preferred_contact_method"]) || !in_array($_POST["preferred_contact_method"], $valid_contact_methods)) {
        $errors[] = "Please select a valid Preferred Contact Method.";
    }

    // Terms Agreement
    if (empty($_POST["terms"])) {
        $errors[] = "You must agree to the Terms & Conditions.";
    }

    // Display message
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        echo "<p>Form submitted successfully!</p>";
    }
}
?>
