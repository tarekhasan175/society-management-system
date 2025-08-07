<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bill Payment Alert</title>
</head>

<body>

    <div class="container mt-5">
        <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
            <strong>Warning!</strong> "{{ $month . '-' . $year }}" This bill has not been paid yet. Please make the
            payment first. Thank you.
        </div>
        <script>
            setTimeout(function() {
                window.location.href = '<?php echo url('society/payments/create'); ?>';
            }, 8000);
        </script>
    </div>

</body>

</html>
