<?php
session_start();
$errors = [];

// Function to display errors from the session
function display_errors($errors) {
    foreach ($errors as $field => $error) {
        echo "<p>Error in $field: $error</p>";
    }
}

// Display errors if any exist in the session
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    display_errors($_SESSION['errors']);
    unset($_SESSION['errors']);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form data
    $data = [
        'full_name' => $_POST['full_name'] ?? '',
        'father_name' => $_POST['father_name'] ?? '',
        'mother_name' => $_POST['mother_name'] ?? '',
        'username' => $_POST['username'] ?? '',
        'role' => $_POST['role'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone_number' => $_POST['phone'] ?? '',
        'preferred_contact' => $_POST['preferred_contact'] ?? [],
        'national_id' => $_POST['national_id'] ?? '',
        'passport_number' => $_POST['passport_number'] ?? '',
        'drivers_license' => $_POST['drivers_license'] ?? '',
        'bank_name' => $_POST['bank_name'] ?? '',
        'bank_account_number' => $_POST['bank_account_number'] ?? '',
        'tax_identification_number' => $_POST['tax_identification_number'] ?? '',
        'password' => $_POST['password'] ?? '',
        'confirm_password' => $_POST['confirm_password'] ?? ''
    ];

    // Perform validations
    validate_inputs($data, $errors);

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        display_errors($errors);
        header("Location: admin_controller.php");
        exit;
    } else {
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        // echo "Registration successful!";
    }
}

function validate_inputs($data, &$errors) {
    // Validate Full Name
    validate_name($data['full_name'], 'full_name', $errors);
    validate_name($data['father_name'], 'father_name', $errors);
    validate_name($data['mother_name'], 'mother_name', $errors);

    // Validate Username
    if (empty($data['username'])) {
        $errors['username'] = "Username is required.";
    } elseif (strlen($data['username']) < 5 || strlen($data['username']) > 15) {
        $errors['username'] = "Username must be between 5 and 15 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $data['username'])) {
        $errors['username'] = "Username can only contain letters, numbers, and underscores.";
    }

    // Validate Role
    validate_role($data['role'], $errors);

    // Validate Date of Birth
    if (empty($data['dob']) || !validate_date($data['dob'])) {
        $errors['dob'] = "Valid Date of Birth is required.";
    }

    // Validate Gender
    if (empty($data['gender']) || !in_array($data['gender'], ['male', 'female'])) {
        $errors['gender'] = "Gender is required and must be either male or female.";
    }

    // Validate Email
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required.";
    }

    // Validate Phone Number
    if (empty($data['phone_number']) || !preg_match("/^\+?[0-9]{10,15}$/", $data['phone_number'])) {
        $errors['phone_number'] = "Valid phone number is required.";
    }

    // Validate National ID
    if (empty($data['national_id']) || !preg_match("/^\d{10}$/", $data['national_id'])) {
        $errors['national_id'] = "National ID must be exactly 12 digits.";
    }

    // Validate Passport Number
    if (empty($data['passport_number']) || !preg_match("/^[A-Za-z0-9]{6,9}$/", $data['passport_number'])) {
        $errors['passport_number'] = "Passport Number must be 6 to 9 alphanumeric characters.";
    }

    // Validate Driver's License Number
    if (empty($data['drivers_license']) || !preg_match("/^[A-Za-z0-9]{6,15}$/", $data['drivers_license'])) {
        $errors['drivers_license'] = "Driver's License Number must be 6 to 15 alphanumeric characters.";
    }

    // Validate Bank Name
    if (empty($data['bank_name']) || !preg_match("/^[A-Za-z\s]+$/", $data['bank_name'])) {
        $errors['bank_name'] = "Bank Name should only contain letters and spaces.";
    }

    // Validate Bank Account Number
    if (empty($data['bank_account_number']) || !preg_match("/^\d{13}$/", $data['bank_account_number'])) {
        $errors['bank_account_number'] = "Bank Account Number must be exactly 13 digits.";
    }

    // Validate Tax Identification Number
    if (empty($data['tax_identification_number']) || !preg_match("/^\d{9}$/", $data['tax_identification_number'])) {
        $errors['tax_identification_number'] = "Tax Identification Number must be exactly 9 digits.";
    }

    // Validate Password
    if (empty($data['password']) || !validate_password($data['password'])) {
        $errors['password'] = "Password must be at least 8 characters long, contain uppercase, lowercase, numbers, and special characters.";
    }

    // Validate Confirm Password
    if ($data['confirm_password'] !== $data['password']) {
        $errors['confirm_password'] = "Passwords do not match.";
    }
}

// Function to validate names (Full Name, Father Name, and Mother Name)
function validate_name($name, $field, &$errors) {
    if (empty($name)) {
        $errors[$field] = ucfirst($field) . " is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[$field] = ucfirst($field) . " should only contain letters and spaces.";
    } elseif (strlen($name) <= 6) { 
        $errors[$field] = ucfirst($field) . " should be longer than 6 characters.";
    }
}

// Function to validate Role
function validate_role($role, &$errors) {
    $valid_roles = ['super_admin', 'product_admin', 'sales_admin', 'employee_admin', 'customer_support_admin'];
    if (empty($role)) {
        $errors['role'] = "Role selection is required.";
    } elseif (!in_array($role, $valid_roles)) {
        $errors['role'] = "Invalid role selected.";
    }
}

// Password validation
function validate_password($password) {
    return strlen($password) >= 8 && 
           preg_match("/[A-Z]/", $password) && 
           preg_match("/[a-z]/", $password) && 
           preg_match("/\d/", $password) && 
           preg_match("/[\W_]/", $password);
}

function validate_date($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}
?>