<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Recipe</title>
    <link rel="stylesheet" href="./style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <?php wp_head() ?>
  </head>
  <body>

    <header class="header">
      <div class="section">
        <div class="container">
          <div class="header__wrapper">
            <div class="header__logo">
              <a href="./home.html"><h3>TheRecipe</h3></a>
            </div>
            <ul class="header__nav">
              <?php wp_menu_li() ?>
            </ul>
          </div>
        </div>
      </div>
    </header>