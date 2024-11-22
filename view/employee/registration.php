<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
</head>
<body>

    <h2>Employee Registration</h2>
    <hr>

    <form action="register_employee.php" method="post">
        <!-- Personal Information Section -->
        <fieldset>
            <legend><b>Personal Information</b></legend>
            <table>
                <tr>
                    <td><label for="full_name">Full Name:</label></td>
                    <td><input type="text" id="full_name" name="full_name" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td><input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td><input type="date" id="dob" name="dob" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><textarea id="address" name="address" rows="3" required></textarea></td>
                </tr>
            </table>
        </fieldset>

        <!-- Employee Information Section -->
        <fieldset>
            <legend><b>Employee Information</b></legend>
            <table>
                <tr>
                    <td><label for="employee_id">Employee ID:</label></td>
                    <td><input type="text" id="employee_id" name="employee_id" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="department">Department:</label></td>
                    <td><input type="text" id="department" name="department" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="position">Position:</label></td>
                    <td><input type="text" id="position" name="position" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="joining_date">Joining Date:</label></td>
                    <td><input type="date" id="joining_date" name="joining_date" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="salary">Salary:</label></td>
                    <td><input type="number" id="salary" name="salary" min="0" required></td>
                </tr>
            </table>
        </fieldset>

        <!-- Emergency Contact Section -->
        <fieldset>
            <legend><b>Emergency Contact</b></legend>
            <table>
                <tr>
                    <td><label for="emergency_contact_name">Contact Name:</label></td>
                    <td><input type="text" id="emergency_contact_name" name="emergency_contact_name" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="emergency_contact_relationship">Relationship:</label></td>
                    <td><input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship" required></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td><label for="emergency_contact_phone">Contact Phone:</label></td>
                    <td><input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" required></td>
                </tr>
            </table>
        </fieldset>

        <br>
        <input type="submit" value="Register as Employee">
    </form>

</body>
</html>
