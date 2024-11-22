<?php
$success_message = "";

$full_name_error = $father_name_error = $mother_name_error = $username_error = $role_error = $dob_error = $gender_error = $email_error = $phone_error = $national_id_error = $passport_number_error = $drivers_license_error = $bank_name_error = $bank_account_number_error = $tax_identification_number_error = $password_error = $confirm_password_error = "";

$present_district_error = $present_house_number_error = $present_road_error = $present_locality_error = $present_thana_error = $present_post_code_error = "";
$permanent_district_error = $permanent_house_number_error = $permanent_road_error = $permanent_locality_error = $permanent_thana_error = $permanent_post_code_error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $father_name = $_POST['father_name'] ?? '';
    $mother_name = $_POST['mother_name'] ?? '';
    $username = $_POST['username'] ?? '';
    $role = $_POST['role'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone'] ?? '';
    $national_id = $_POST['national_id'] ?? '';
    $passport_number = $_POST['passport_number'] ?? '';
    $drivers_license = $_POST['drivers_license'] ?? '';
    $bank_name = $_POST['bank_name'] ?? '';
    $bank_account_number = $_POST['bank_account_number'] ?? '';
    $tax_identification_number = $_POST['tax_identification_number'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // initialization for address variable
    $present_district = $_POST['present_district'] ?? '';
    $present_house_number = $_POST['present_house_number'] ?? '';
    $present_road = $_POST['present_road'] ?? '';
    $present_locality = $_POST['present_locality'] ?? '';
    $present_thana = $_POST['present_thana'] ?? '';
    $present_post_code = $_POST['present_post_code'] ?? '';

    $permanent_district = $_POST['permanent_district'] ?? '';
    $permanent_house_number = $_POST['permanent_house_number'] ?? '';
    $permanent_road = $_POST['permanent_road'] ?? '';
    $permanent_locality = $_POST['permanent_locality'] ?? '';
    $permanent_thana = $_POST['permanent_thana'] ?? '';
    $permanent_post_code = $_POST['permanent_post_code'] ?? '';


    // Validation for each field
    if (empty($full_name) || !preg_match("/^[a-zA-Z\s]+$/", $full_name) || strlen($full_name) <= 6) {
        $full_name_error = "Full name is required, must contain only letters and spaces, and be longer than 6 characters.";
    }

    if (empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/", $father_name) || strlen($father_name) <= 6) {
        $father_name_error = "Father's name is required, must contain only letters and spaces, and be longer than 6 characters.";
    }

    if (empty($mother_name) || !preg_match("/^[a-zA-Z\s]+$/", $mother_name) || strlen($mother_name) <= 6) {
        $mother_name_error = "Mother's name is required, must contain only letters and spaces, and be longer than 6 characters.";
    }

    if (empty($username) || strlen($username) < 5 || strlen($username) > 15 || !preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $username_error = "Username is required, must be between 5 and 15 characters, and can only contain letters, numbers, and underscores.";
    }

    $valid_roles = ['super_admin', 'product_admin', 'sales_admin', 'employee_admin', 'customer_support_admin'];
    if (empty($role) || !in_array($role, $valid_roles)) {
        $role_error = "Role is required and must be a valid role.";
    }

    $d = DateTime::createFromFormat('Y-m-d', $dob);
    if (empty($dob) || !$d || $d->format('Y-m-d') !== $dob) {
        $dob_error = "A valid Date of Birth is required.";
    }

    if (empty($gender) || !in_array($gender, ['male', 'female'])) {
        $gender_error = "Gender is required and must be either male or female.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "A valid email address is required.";
    }

    if (empty($phone_number) || !preg_match("/^\+?[0-9]{10,15}$/", $phone_number)){
        $phone_error = "A valid phone number is required.";
    }

    if(empty($present_district) || !preg_match("/^[A-Za-z\s]+$/", $present_district)) {
        $present_district_error = "Present district should only contain letters and spaces.";
    }

    if (empty($present_house_number) || !preg_match("/^[0-9,\/:]+$/", $present_house_number)) {
        $present_house_number_error = "Present house number should only contain numbers, colon, comma, and forward slash.";
    }    

    if (empty($present_road) || !preg_match("/^[A-Za-z0-9\s,\/:]+$/", $present_road)) {
        $present_road_error = "Present road should only contain letters, numbers, and spaces.";
    }

    if (empty($present_locality) || !preg_match("/^[A-Za-z0-9\s,\/:]+$/", $present_locality)) {
        $present_locality_error = "Present locality should only contain letters and spaces.";
    }

    if (empty($present_thana) || !preg_match("/^[A-Za-z\s]+$/", $present_thana)) {
        $present_thana_error = "Present thana should only contain letters and spaces.";
    }

    if (empty($present_post_code) || !preg_match("/^\d{4}$/", $present_post_code)) {
        $present_post_code_error = "Present post code must be exactly 4 digits.";
    }

    if (empty($permanent_district) || !preg_match("/^[A-Za-z\s]+$/", $permanent_district)) {
        $permanent_district_error = "Permanent district should only contain letters and spaces.";
    }

    if (empty($permanent_house_number) || !preg_match("/^[0-9,\/:]+$/", $permanent_house_number)) {
        $permanent_house_number_error = "Permanent house number should only contain numbers, colon, comma, and forward slash.";
    }

    if (empty($permanent_road) || !preg_match("/^[A-Za-z0-9\s,\/:]+$/", $permanent_road)) {
        $permanent_road_error = "Permanent road should only contain letters, numbers, and spaces.";
    }

    if (empty($permanent_locality) || !preg_match("/^[A-Za-z0-9\s,\/:]+$/", $permanent_locality)) {
        $permanent_locality_error = "Permanent locality should only contain letters and spaces.";
    }

    if (empty($permanent_thana) || !preg_match("/^[A-Za-z\s]+$/", $permanent_thana)) {
        $permanent_thana_error = "Permanent thana should only contain letters and spaces.";
    }

    if (empty($permanent_post_code) || !preg_match("/^\d{4}$/", $permanent_post_code)) {
        $permanent_post_code_error = "Permanent post code must be exactly 4 digits.";
    }

    if (empty($national_id) || !preg_match("/^\d{10}$/", $national_id)) {
        $national_id_error = "National ID must be exactly 10 digits.";
    }

    if (empty($passport_number) || !preg_match("/^[A-Za-z0-9]{6,9}$/", $passport_number)) {
        $passport_number_error = "Passport number must be 6 to 9 alphanumeric characters.";
    }

    if (empty($drivers_license) || !preg_match("/^[A-Za-z0-9]{6,15}$/", $drivers_license)) {
        $drivers_license_error = "Driver's license must be 6 to 15 alphanumeric characters.";
    }

    if (empty($bank_name) || !preg_match("/^[A-Za-z\s]+$/", $bank_name)) {
        $bank_name_error = "Bank name should only contain letters and spaces.";
    }

    if (empty($bank_account_number) || !preg_match("/^\d{13}$/", $bank_account_number)) {
        $bank_account_number_error = "Bank account number must be exactly 13 digits.";
    }

    if (empty($tax_identification_number) || !preg_match("/^\d{9}$/", $tax_identification_number)) {
        $tax_identification_number_error = "Tax identification number must be exactly 9 digits.";
    }

    if (empty($password) || strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/[\W_]/", $password)) {
        $password_error = "Password must be at least 8 characters long, contain uppercase, lowercase, numbers, and special characters.";
    }

    if ($confirm_password !== $password) {
        $confirm_password_error = "Passwords do not match.";
    }

    // If no errors, process the registration
    if(!$full_name_error && !$father_name_error && !$mother_name_error && !$username_error && !$role_error && !$dob_error && !$gender_error && !$email_error && !$phone_error && !$present_district_error && !$present_house_number_error && !$present_road_error && !$present_locality_error && !$present_thana_error && !$present_post_code_error && !$permanent_district_error && !$permanent_house_number_error && !$permanent_road_error && !$permanent_locality_error && !$permanent_thana_error && !$permanent_post_code_error && !$national_id_error && !$passport_number_error && !$drivers_license_error && !$bank_name_error && !$bank_account_number_error && !$tax_identification_number_error && !$password_error && !$confirm_password_error) {
        $data = [
            'full_name' => $full_name,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'username' => $username,
            'role' => $role,
            'dob' => $dob,
            'gender' => $gender,
            'email' => $email,
            'phone_number' => $phone_number,
            'national_id' => $national_id,
            'present_district' => $present_district,
            'present_house_number' => $present_house_number,
            'present_road' => $present_road,
            'present_locality' => $present_locality,
            'present_thana' => $present_thana,
            'present_post_code' => $present_post_code,
            'permanent_district' => $permanent_district,
            'permanent_house_number' => $permanent_house_number,
            'permanent_road' => $permanent_road,
            'permanent_locality' => $permanent_locality,
            'permanent_thana' => $permanent_thana,
            'permanent_post_code' => $permanent_post_code,
            'passport_number' => $passport_number,
            'drivers_license' => $drivers_license,
            'bank_name' => $bank_name,
            'bank_account_number' => $bank_account_number,
            'tax_identification_number' => $tax_identification_number,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $file_path = '../../data/userdata.json';
        $user_data = [];

        if (file_exists($file_path)) {
            $file_contents = file_get_contents($file_path);
            $user_data = json_decode($file_contents, true);
            if (!is_array($user_data)) {
                $user_data = [];
            }
        }
        $user_data[] = $data;
        file_put_contents($file_path, json_encode($user_data, JSON_PRETTY_PRINT));

        $success_message = "Registration successful!";
    }
}

// Display success message
if (!empty($success_message)) {
    echo "<p class='success'>$success_message</p>";
}

?>
