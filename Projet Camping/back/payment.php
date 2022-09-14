<?php
    session_start();
    // var_dump($_GET['price_id']);
    // var_dump($_GET['product_id']);
    // var_dump($_GET['id']);
    // var_dump($_SESSION['email']);
    $depart = $_POST['depart'];
    $fin = $_POST['fin'];

    



    function dateDiffInDays($date1, $date2) 
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }

    $dateDiff = dateDiffInDays($depart, $fin);
    //var_dump(intval($dateDiff));

    $prix = (int)$dateDiff * (int)$_GET['prix'];

    require '../vendor/autoload.php';
    // This is your test secret API key.
    \Stripe\Stripe::setApiKey('sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR');
    
    header('Content-Type: application/json');
    
    $YOUR_DOMAIN = 'http://localhost/PA-CAMPING';

    $stripe = new \Stripe\StripeClient(
        'sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR'
      );
      $priceUnit =       $stripe->prices->retrieve(
        $_GET['price_id'],
        []
      );

    
    $checkout_session = \Stripe\Checkout\Session::create([
      'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price' => $_GET['price_id'],
        'quantity' => intval($dateDiff),
      ]],
      'mode' => 'payment',
      'success_url' => $YOUR_DOMAIN . '/back/success.php?id=' . $_GET['id'] . "&totalPrice=" . $prix . "&email=" . $_SESSION['email'] . "&depart=" . $_GET['depart'] . "&fin=" . $_GET['fin'],
      'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
    ]);


    
    var_dump($checkout_session -> amount_total/100);
    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
?>