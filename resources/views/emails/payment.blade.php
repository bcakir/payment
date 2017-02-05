<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Payment successful</title>
    </head>
    <body>
        
        A new payment is made.
        <br />
        Details are below:
        <br />
        Name: {{ $name }}
        <br />
        Amount: {{ $value }} {{ $currency }}
        <br />
        Time: {{ $currentDateTime }}
        
    </body>
</html>