<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
</head>
<body>
<h1>Edit Client</h1>
<form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="{{ $client->first_name }}" required>
    <br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $client->email }}">
    <br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" value="{{ $client->phone }}">
    <br>

    <!-- Cash Loan Form -->
    <h3>Cash Loan</h3>
    <label for="cash_loan_amount">Loan Amount:</label>
    <input type="number" id="cash_loan_amount" name="cash_loan_amount" value="{{ $client->cashLoan->loan_amount ?? '' }}">

    <!-- Home Loan Form -->
    <h3>Home Loan</h3>
    <label for="home_loan_property_value">Property Value:</label>
    <input type="number" id="home_loan_property_value" name="home_loan_property_value" value="{{ $client->homeLoan->property_value ?? '' }}">

    <label for="home_loan_down_payment">Down Payment:</label>
    <input type="number" id="home_loan_down_payment" name="home_loan_down_payment" value="{{ $client->homeLoan->down_payment_amount ?? '' }}">

    <button type="submit">Update Client</button>
</form>
</body>
</html>
