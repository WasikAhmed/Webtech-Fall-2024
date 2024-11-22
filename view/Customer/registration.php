<?php
include '../../control/customer_reg_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration - Artisanal Tea Blending Marketplace</title>
</head>
<body>

    <h2>Customer Registration</h2>

    <?php
    if (isset($_SESSION['errors'])) {
        echo "<ul style='color:red;'>";
        foreach ($_SESSION['errors'] as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        unset($_SESSION['errors']);
    }

    if (isset($_SESSION['success_message'])) {
        echo "<p style='color:green;'>".$_SESSION['success_message']."</p>";
        unset($_SESSION['success_message']);
    }
    ?>

    <form action="" method="POST">
        <fieldset>

            <fieldset>
                <legend><b>Personal Information</b></legend>
                <table>
                    <tr>
                        <td><label for="fullname">Full Name:</label></td>
                        <td><input type="text" id="fullname" name="fullname" value="<?php echo $_SESSION['old_input']['fullname'] ?? ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" value="<?php echo $_SESSION['old_input']['email'] ?? ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone:</label></td>
                        <td><input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['old_input']['phone'] ?? ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="address">Address:</label></td>
                        <td><textarea id="address" name="address" rows="3"><?php echo $_SESSION['old_input']['address'] ?? ''; ?></textarea></td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend><b>Account Security</b></legend>
                <table>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password" value="<?php echo $_SESSION['old_input']['password'] ?? ''; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="confirm_password">Confirm Password:</label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password" value="<?php echo $_SESSION['old_input']['confirm_password'] ?? ''; ?>"></td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend><b>Preferences and Options</b></legend>
                <table>
                    <tr>
                        <td><label for="country">Country:</label></td>
                        <td>
                            <select id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="bangladesh" <?php if ($_SESSION['old_input']['country'] == 'bangladesh') echo 'selected'; ?>>Bangladesh</option>
                                <option value="usa" <?php if ($_SESSION['old_input']['country'] == 'usa') echo 'selected'; ?>>United States</option>
                                <option value="uk" <?php if ($_SESSION['old_input']['country'] == 'uk') echo 'selected'; ?>>United Kingdom</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="buy">Buy:</label></td>
                        <td>
                            <select id="buy" name="buy">
                                <option value="yes" <?php if ($_SESSION['old_input']['buy'] == 'yes') echo 'selected'; ?>>Yes</option>
                                <option value="no" <?php if ($_SESSION['old_input']['buy'] == 'no') echo 'selected'; ?>>No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="payment_method">Payment Method:</label></td>
                        <td>
                            <select id="payment_method" name="payment_method">
                                <option value="credit_card" <?php if ($_SESSION['old_input']['payment_method'] == 'credit_card') echo 'selected'; ?>>Credit Card</option>
                                <option value="paypal" <?php if ($_SESSION['old_input']['payment_method'] == 'paypal') echo 'selected'; ?>>PayPal</option>
                                <option value="bank_transfer" <?php if ($_SESSION['old_input']['payment_method'] == 'bank_transfer') echo 'selected'; ?>>Bank Transfer</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend><b>Agreement and Submit</b></legend>
                <table>
                    <tr>
                        <td colspan="2">
                            <label>
                                <input type="checkbox" name="terms" <?php if (isset($_SESSION['old_input']['terms'])) echo 'checked'; ?>>
                                I agree to the <a href="/terms">terms and conditions</a>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit">Register</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
            
        </fieldset>
    </form>

</body>
</html>
