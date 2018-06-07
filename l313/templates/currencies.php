<?php

$rates = [];
$selectedCurrencies = isset($_POST['currencies']) ? $_POST['currencies'] : [];
$baseCurrency = isset($_POST['base_currency']) ? $_POST['base_currency'] : null;
$currencies = [
    "AUD", "BGN", "BRL", "CAD", "CHF", "CNY", "CZK", "DKK", "GBP", "HKD", "HRK", "HUF", "IDR", "ILS", "INR", "JPY",
    "KRW", "MXN", "MYR", "NOK", "NZD", "PHP", "PLN", "RON", "RUB", "SEK", "SGD", "THB", "TRY", "ZAR", "EUR"
];

if (isset($_POST['get_rates'])) {
    $apiUri = 'http://api.fixer.io/';
    $request = sprintf('%slatest?base=%s&symbols=%s', $apiUri, $baseCurrency, implode(',', $selectedCurrencies));
    $rates = json_decode(file_get_contents($request));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contacts</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo PUBLIC_URL; ?>css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brain Academy PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="container" style="margin-top: 50px">
    <table width="100%">
        <tr valign="top">
            <td width="50%" style="padding-right: 10px">
                <h1>Get currencies</h1>
                <form method="post" action="">
                    <label for="base-currency">Base currency</label>
                    <select class="form-control" name="base_currency" id="base-currency">
                        <?php foreach ($currencies as $currency) : ?>
                            <?php $active = $currency == $baseCurrency ? 'selected="selected"' : ''; ?>
                            <option value="<?php echo $currency; ?>" <?php echo $active; ?>>
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <hr>

                    <label>Currencies list</label><br>
                    <?php foreach ($currencies as $currency) : ?>
                        <?php $active = in_array($currency, $selectedCurrencies) ? 'checked="checked"' : ''; ?>
                        <div class="checkbox" style="display: inline-block">
                            <label>
                                <input type="checkbox"
                                       name="currencies[]"
                                       value="<?php echo $currency; ?>" <?php echo $active; ?>>
                                <?php echo $currency; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <hr>

                    <button type="submit" class="btn btn-primary" name="get_rates">Get rates</button>
                </form>
            </td>
            <td width="50%" style="padding-left: 10px">
                <h1>Rates</h1>
                <?php if ($rates) : ?>
                    <?php foreach ($rates->rates as $currency => $rate) : ?>
                        <p>1 <?php echo $rates->base; ?> = <?php echo $rate ?> <?php echo $currency ?></p>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Select base currency and needed currencies</p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?php echo PUBLIC_URL; ?>js/bootstrap.min.js"></script>
</body>
</html>
