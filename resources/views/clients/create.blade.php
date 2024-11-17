<!-- resources/views/clients/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client</title>
</head>
<body>
<h1>Add New Client</h1>
<a href="{{ route('clients.index') }}">Go back to clients</a>
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required>
    <br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone">
    <br>

    <!-- Cash Loan Form -->
    <h3>Cash Loan</h3>
    <label for="cash_loan_amount">Loan Amount:</label>
    <input type="number" id="cash_loan_amount" name="cash_loan_amount">

    <!-- Home Loan Form -->
    <h3>Home Loan</h3>
    <label for="home_loan_property_value">Property Value:</label>
    <input type="number" id="home_loan_property_value" name="home_loan_property_value">

    <label for="home_loan_down_payment">Down Payment:</label>
    <input type="number" id="home_loan_down_payment" name="home_loan_down_payment">

    <button type="submit">Create Client</button>
</form>
</body>
</html>
