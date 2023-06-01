<!DOCTYPE html>
<html>
<head>
    <title>Total Income</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Total Income Results</h1>
                        <a href="/rental/history" class="btn btn-primary">Volver</a><br/><br/>
                        <p class="card-text">Customer ID: {{ $customer->customer_id }}</p>  
                        <p class="card-text">Name: {{ $customer->first_name }} {{ $customer->last_name }}</p> 
                        <b><p class="card-text">Total Income: ${{ $results[0]->total_income }}</p></b>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

