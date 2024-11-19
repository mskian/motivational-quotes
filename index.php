<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#c7ecee">

  <title>Motivational Quotes</title>
  <meta name="description" content="Here are some short and single-line motivational quotes perfect for smartwatch notifications."/>
  <?php $current_page = htmlspecialchars("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ENT_QUOTES, 'UTF-8');
        echo '<link rel="canonical" href="' . $current_page . '" />';
  ?>

  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
  <link rel="icon" type="image/png" sizes="196x196" href="/favicon-196.png" />
  <link rel="apple-touch-icon" href="/apple-icon-180.png" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="application-name" content="Motivational Quotes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Motivational Quotes" />

  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

  <div class="columns is-centered">
    <div class="column">

      <div id="error-state" class="error-state hidden">
        <p>Oops! Something went wrong while loading the quotes. Please try again later.</p>
      </div>

      <button id="copy-button" class="button is-danger is-small copy-btn">
        <i class="fas fa-copy"></i>&nbsp;Copy
      </button>

      <div id="quotes-container" class="quotes-container">
        <div class="quote-box">
          <div id="loading-state" class="loading-state hidden">
            <p>🥤🚀</p>
          </div>
          <div id="quote-text" class="quote-text hidden"></div>
          <br />
          <div class="quote-footer">
            <div id="quote-number" class="quote-number hidden">1/200</div>
          </div>
        </div>
      </div>
      <br />
      <div id="pagination-buttons" class="pagination-container hidden">
        <button id="prev-button" class="pagination-button">Prev</button>
        <button id="next-button" class="pagination-button">Next</button>
      </div>

      <button id="retry-button" class="button is-danger hidden">Retry</button>

    </div>
  </div>

<script src="app.js"></script>

</body>
</html>