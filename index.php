<?php
    $firstname = $name = $phone = $message = $email = "";
    $firstname_error = $name_error = $phone_error = $message_error = $email_error = "";
    $isSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //security check on post $var
        $firstname = verifyInput($_POST['firstname']);
        $name = verifyInput($_POST['name']);
        $phone = verifyInput($_POST['phone']);
        $message = verifyInput($_POST['message']);
        $email = verifyInput($_POST['email']);
        $isSuccess = true;
        
        if(empty($firstname))
        {
            $firstname_error = "Le prénom est requis.";
            $isSuccess = false;
        }
        if(empty($name))
        {
            $name_error = "Le nom est requis.";
            $isSuccess = false;
        }
        if(empty($message))
        {
            $message_error = "Pas de message pas de chocolat!";
            $isSuccess = false;
        }
        if(!isEmail($email))
        {
            $email_error = "Ca ressemble bof bof à un email ça!";
            $isSuccess = false;
        }
        if(!isPhone($phone))
        {
            $phone_error = "Entrez un numéro avec seulement chiffres et espaces.";
            $isSuccess = false;
        }
        if($isSuccess)
        {
            //sendEmail with all the datas
        }

        
    }

    function verifyInput($var)
    {
        $var = trim($var); // remove all supp chars
        $var = stripslashes($var); // remove all /
        $var = htmlspecialchars($var); // create a string of script and join them to html request
        return $var;
    }
    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
        
    }

    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var);
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
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
                    <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                        <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prénom<span class="blue"> *</span></label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname ;?>" >
                            <p class="comments"><?php echo $firstname_error; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Nom<span class="blue"> *</span></label>
                            <input type="text" name="name" id= "name" class="form-control" placeholder="Votre nom" value="<?php echo $name;?>" >
                            <p class="comments"><?php echo $name_error; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email<span class="blue"> *</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>" >
                            <p class="comments"><?php echo $email_error; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Téléphone</label>
                            <input type="tel" name="phone"  id="phone" class="form-control" placeholder="Votre téléphone" value="<?php echo $phone;?>">
                            <p class="comments"><?php echo $phone_error; ?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message<span class="blue"> *</span></label>
                            <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4" ><?php echo $message; ?>
                            </textarea> 
                            <p class="comments"><?php echo $message_error; ?></p>
                        </div>
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises</strong></p>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>
                    </div>
                        <p class="thank-you" style="display:<?php  if($isSuccess) echo 'block' ; else echo 'none'; ?>">Votre message a bien été envoyé. Merci de m'avoir contacté :) </p>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>