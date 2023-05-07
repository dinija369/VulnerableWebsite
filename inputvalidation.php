<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="inputvalidation.css">
  </head>
  <body>
    <header class="header">
    <h3>Poor Input Validation</h3>
      <h1>Buy kittens</h1>
    </header>
    <form method="get" action="pay.php">
            <fieldset>
              <div class="gallery">
                <p>Tom: 24$</p>
                <input style="position:absolute; top: 230px;" id="search" name="tom" value="" />
                <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/1.jpg">
              </div>
              <div class="gallery">
                <p>Jerry: 3$</p>
                <input style="position:absolute; top: 440px;" id="search" name="jerry" value="" />
                <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/2.jpg">
              </div>
              <div class="gallery">
                <p>Percy and Blacky: 52$</p>
                <input style="position:absolute; top: 650px;" id="search" name="percy" value="" />
                <img src="https://cdn.freecodecamp.org/curriculum/css-photo-gallery/9.jpg">
              </div>
              <input id="pay" type="submit" value="Check out" />
            </fieldset>
    </form>

</body>
</html>