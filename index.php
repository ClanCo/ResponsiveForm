<?php
    $firstname = $name = $phone = $message = $email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $email = $_POST['email'];
    }
 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="device-width, initial-scale=1">
        
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Google Font -->
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="CSS/styles.css">
    </head>
    
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                        <div class="col-md-6">
                            <label for="firstname">Prénom<span class="blue"> *</span></label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname ;?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Nom<span class="blue"> *</span></label>
                            <input type="text" name="name" id= "name" class="form-control" placeholder="Votre nom" value="<?php echo $name;?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email<span class="blue"> *</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Votre email" value="<?php echo $email;?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone"  id="phone" class="form-control" placeholder="Votre téléphone" value="<?php echo $phone;?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message<span class="blue"> *</span></label>
                            <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4"><?php echo htmlspecialchars($message);?>
                            </textarea > 
                            <p class="comments">Message d'erreur</p>
                        </div>
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises</strong></p>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>
                        
                        <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :) </p>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>