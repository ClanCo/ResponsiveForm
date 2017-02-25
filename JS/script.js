$(function(){
    
    $('#contact-form').submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postData = $('#contact-form').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'PHP/contact.php',
            data: postData,
            dataType: 'json',
            success: function(result){
                if(result.isSuccess)
                {
                    $("#contact-form").append("<p class='thank-you'>Votre message a bien été envoyé! :)</p> ");
                    $("#contact-form")[0].reset();
                }
                else
                {
                    $("#firstname + .comments").html(result.firstname_error);
                    $("#name + .comments").html(result.name_error);
                    $("#email + .comments").html(result.email_error);
                    $("#phone + .comments").html(result.phone_error);
                    $("#message + .comments").html(result.message_error);
                    
                    
                }
            }
        });
    });
})
