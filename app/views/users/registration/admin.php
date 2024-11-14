<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <fieldset style="width: 20%; margin: 0 auto; margin-top: 50px;">
        <legend align="center"><b><h3>Register Here</h3></b></legend>
        <form action="../controller/admin_controller.php" method="post">
            <!-- Basic Information -->
            <fieldset>
                <legend><b>Basic Information</b></legend>
                <table>
                    <tr>
                        <td><label for="full_name">Full Name:</label></td>
                        <td><input type="text" id="full_name" name="full_name" placeholder="Full name" required></td>
                    </tr>
                    <tr>
                        <td><label for="father_name">Father Name:</label></td>
                        <td><input type="text" id="father_name" name="father_name" placeholder="Father name" required></td>
                    </tr>
                    <tr>
                        <td><label for="mother_name">Mother Name:</label></td>
                        <td><input type="text" id="mother_name" name="mother_name" placeholder="Mother name" required></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" id="username" name="username" placeholder="Username" required></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Company and Role Information -->
            <fieldset>
                <legend><b>Admin Role Information</b></legend>
                <table>
                    <tr>
                        <td><label for="role">Role:</label></td>
                        <td>
                            <select id="role" name="role" required >
                                <option value="">Select a role...</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="product_admin">Product Admin</option>
                                <option value="sales_admin">Sales Admin</option>
                                <option value="employee_admin">Human Resource</option>
                                <option value="customer_support_admin">Customer Support Admin</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Gender and Date of Birth -->
            <fieldset>
                <legend><b>Gender and Date of Birth</b></legend>
                <table>
                    <tr>
                        <td><label for="dob">Date of Birth:</label></td>
                        <td><input type="date" id="dob" name="dob" required ></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender:</label></td>
                        <td>
                            <input type="radio" id="male" name="gender" value="male" required >Male
                            <input type="radio" id="female" name="gender" value="female" required >Female
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Contact Information -->
            <fieldset>
                <legend><b>Contact Information</b></legend>
                <table>
                    <tr>
                        <td><label for="email">Email Address:</label></td>
                        <td><input type="email" id="email" name="email" placeholder="Email address" ></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone Number:</label></td>
                        <td><input type="tel" id="phone" name="phone" placeholder="Phone number"></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Address -->
            <fieldset>
                <legend><b>Present Address</b></legend>
                <table>
                    <tr>
                        <td><label for="present_district">District:</label></td>
                        <td>
                            <select id="present_district" name="present_district" required >
                                <option value="">Select District...</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chattogram">Chattogram</option>
                                <option value="khulna">Khulna</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="barisal">Barisal</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="rangpur">Rangpur</option>
                                <option value="mymensingh">Mymensingh</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="present_house_number">House Number:</label></td>
                        <td><input type="text" id="present_house_number" name="present_house_number" required  placeholder="Enter house number"></td>
                    </tr>
                    <tr>
                        <td><label for="present_road">Road Number/Name:</label></td>
                        <td><input type="text" id="present_road" name="present_road" required  placeholder="Enter road number or name"></td>
                    </tr>
                    <tr>
                        <td><label for="present_locality">Village/Locality:</label></td>
                        <td><input type="text" id="present_locality" name="present_locality" required  placeholder="Enter village or locality"></td>
                    </tr>
                    <tr>
                        <td><label for="present_thana">Thana/Upazila:</label></td>
                        <td><input type="text" id="present_thana" name="present_thana" required  placeholder="Enter thana or upazila"></td>
                    </tr>
                    <tr>
                        <td><label for="present_post_code">Post Code:</label></td>
                        <td><input type="text" id="present_post_code" name="present_post_code" required  placeholder="Enter post code"></td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend><b>Permanent Address</b></legend>
                <table>
                    <tr>
                        <td><label for="permanent_district">District:</label></td>
                        <td>
                            <select id="permanent_district" name="permanent_district" required >
                                <option value="">Select District...</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chattogram">Chattogram</option>
                                <option value="khulna">Khulna</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="barisal">Barisal</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="rangpur">Rangpur</option>
                                <option value="mymensingh">Mymensingh</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="permanent_house_number">House Number:</label></td>
                        <td><input type="text" id="permanent_house_number" name="permanent_house_number" required  placeholder="Enter house number"></td>
                    </tr>
                    <tr>
                        <td><label for="permanent_road">Road Number/Name:</label></td>
                        <td><input type="text" id="permanent_road" name="permanent_road" required  placeholder="Enter road number or name"></td>
                    </tr>
                    <tr>
                        <td><label for="permanent_locality">Village/Locality:</label></td>
                        <td><input type="text" id="permanent_locality" name="permanent_locality" required  placeholder="Enter village or locality"></td>
                    </tr>
                    <tr>
                        <td><label for="permanent_thana">Thana/Upazila:</label></td>
                        <td><input type="text" id="permanent_thana" name="permanent_thana" required  placeholder="Enter thana or upazila"></td>
                    </tr>
                    <tr>
                        <td><label for="permanent_post_code">Post Code:</label></td>
                        <td><input type="text" id="permanent_post_code" name="permanent_post_code" required placeholder="Enter post code"></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Personal Information -->
            <fieldset>
                <legend><b>Personal Information</b></legend>
                <table>
                    <tr>
                        <td><label for="national_id">National ID Number:</label></td>
                        <td><input type="text" id="national_id" name="national_id" required ></td>
                    </tr>
                    <tr>
                        <td><label for="passport_number">Passport Number:</label></td>
                        <td><input type="text" id="passport_number" name="passport_number" required ></td>
                    </tr>
                    <tr>
                        <td><label for="drivers_license">Driving License Number:</label></td>
                        <td><input type="text" id="drivers_license" name="drivers_license" required ></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Bank and Tax Information -->
            <fieldset>
                <legend><b>Bank and Tax Information</b></legend>
                <table>
                    <tr>
                        <td><label for="bank_name">Bank Name</label></td>
                        <td><input type="text" id="bank_name" name="bank_name" required ></td>
                    </tr>
                    <tr>
                        <td><label for="bank_account_number">Bank Account Number:</label></td>
                        <td><input type="text" id="bank_account_number" name="bank_account_number" required ></td>
                    </tr>
                    <tr>
                        <td><label for="tax_identification_number">Tax Identification Number:</label></td>
                        <td><input type="text" id="tax_identification_number" name="tax_identification_number" required ></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Set Password -->
            <fieldset>
                <legend><b>Set Password</b></legend>
                <table>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" id="password" name="password" required ></td>
                    </tr>

                    <tr>
                        <td><label for="confirm_password">Confirm Password</label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password" required ></td>
                    </tr>
                </table>
            </fieldset>
            <input type="submit" value="Register">
        </form>
    </fieldset>
</body>
</html>
