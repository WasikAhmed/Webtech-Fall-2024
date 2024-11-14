<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration - Artisanal Tea Blending Marketplace</title>
</head>
<body>

    <h2>Customer Registration</h2>

    <form action="/register" method="POST">
        <fieldset>

            <!-- Personal Information Section -->
            <fieldset>
                <legend><b>Personal Information</b></legend>
                <table>
                    <tr>
                        <td><label for="fullname">Full Name:</label></td>
                        <td><input type="text" id="fullname" name="fullname" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone Number:</label></td>
                        <td>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                            
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address">Address:</label></td>
                        <td><textarea id="address" name="address" rows="3" required></textarea></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Account Security Section -->
            <fieldset>
                <legend><b>Account Security</b></legend>
                <table>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password" minlength="8" required></td>
                    </tr>
                    <tr>
                        <td><label for="confirm_password">Confirm Password:</label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password" minlength="8" required></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Preferences and Options Section -->
            <fieldset>
                <legend><b>Preferences and Options</b></legend>
                <table>
                    <tr>
                        <td><label for="country">Country:</label></td>
                        <td>
                            <select id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="bangladesh">Bangladesh</option>
                                <option value="usa">United States</option>
                                <option value="uk">United Kingdom</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="can_buy">Can Buy Product:</label></td>
                        <td>
                            <select id="can_buy" name="can_buy" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="payment_method">Preferred Payment Method:</label></td>
                        <td>
                            <select id="payment_method" name="payment_method" required>
                                <option value="">Select Payment Method</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <!-- Add more payment methods as needed -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="button" onclick="alert('Item added to cart')">Add to Cart</button>
                            <button type="button" onclick="alert('Proceeding to purchase')">Buy Now</button>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- Additional Information Section -->
            <fieldset>
                <legend><b>Additional Information</b></legend>
                <table>
                    <tr>
                        <td><label for="comment">Review or Comment:</label></td>
                        <td><textarea id="comment" name="comment" rows="3" placeholder="Leave a review or comment here..."></textarea></td>
                    </tr>
                </table>
            </fieldset>

            <!-- Agreement and Submit Section -->
            <fieldset>
                <legend><b>Agreement and Submit</b></legend>
                <table>
                    <tr>
                        <td colspan="2">
                            <label>
                                <input type="checkbox" name="terms" required>
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
