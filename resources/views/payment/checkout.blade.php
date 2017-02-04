<!DOCTYPE html>
<html>
    <head>
        <title>Payment Gateway</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        
        <style>
            .container .content form div {
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            
                <form method="POST">
                    <div>
                        <label for="name">Name & Surname:</label>
                        <input type="text" name="name" />
                    </div>
                    
                    <div>
                        <label for="paymentGateway">Payment Gateway:</label>
                        <select name="paymentGateway">
                            @foreach ($gateways as $gateway)
                                <option value="{{ $gateway['short'] }}">{{ $gateway['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="number">Value:</label>
                        <input type="number" name="price" min="1" />
                        <select name="currency">
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                            <option value="TRY">TRY</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="Pay" />
                    </div>
                    {{ csrf_field() }}
                </form>
                
            </div>
        </div>
    </body>
</html>
