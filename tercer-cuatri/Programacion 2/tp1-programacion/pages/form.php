<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css"/>
    <title><?= $rutaConfig['title'] ?></title>
</head>
<body>
    <div class="logo-placeholder">
        <img src="./images/logo.png" alt="logo organic products brand" class="logo-img"/>
    </div>
    <section id="form-section" class="form-section">
        <div class="short-form-description">
        <h3>¿Do you want to get a DELIVERY every month?</h3>
        <p>
          Send us your information and we’ll send you an email with our offers and
          guide to become premium. Down below are ours social media if you want to know more about our business, to keep in touch.
        </p>
        </div>
        <div>
          <form action="">
            <input type="text" placeholder="First name" name="first-name" />
            <input type="text" placeholder="Last name" name="last-name" />
            <input type="number" placeholder="Phone number" name="phone-number" />
            <input type="email" placeholder="Email" name="email" />
            <textarea name="extra-comment" rows="4" placeholder="Add a comment"></textarea
            >
            <input type="submit" value="Send" />
          </form>
        </div>
    </section>
</body>
</html>