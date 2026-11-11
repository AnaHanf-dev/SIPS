$(document).ready(function() {

    $("#btn-login").click(function() {
        if ($("#email").val() == "" || $("#senha").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete todos todos os campos.',
            });
            return;
        }

        var letras =$("#senha").val().length;
        console.log(letras);

        if(letras < 8){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'A senha deve ter pelo menos 8 caracteres.',
            });
            return;
        }

        $.ajax({
            url: '../api/login',
            type: 'POST',
            data: {
                email: $("#email").val(),
                senha: $("#senha").val(),
            },
            success: function(response) {
                console.log(response);
                if (response.erro == 'n') {
                 
                    $.cookie("user_token", response.token, { expires: 7 });
                    $.cookie("id_funcionario", response.funcionario_id, { expires: 7 });

                    

                    setTimeout(function() {
                        window.location.href = '../home';
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocorreu um erro ao processar a solicitação.',
                });              
            }
        });
    })
});