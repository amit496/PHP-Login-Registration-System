$(document).ready(function(){
    setTimeout(() => {
        $('.alert').hide();
        ;
    }, 4000);
    setInterval(autologout, 2000);

})

function autologout()
{
    $.ajax({
        url: '../../1config/common_function.php',
        type: 'post',
        data: { autologout: 'logout' }, // Sending a parameter to indicate logout
        success: function(response, textStatus, jqXHR) {
            console.log(response); // You can handle the response here if needed
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown); // Log the error if AJAX fails
        }
    });
}

