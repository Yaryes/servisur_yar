
$(document).ready(function (){
    let $equipos =document.querySelector('#equipos')
    let $patentes =document.querySelector('#patentes')

    function cargarEquipos(){
        $.ajax({
            type: 'GET',
            url: 'recursos/funciones/select.php',
            success: function (response) {                                    
              console.log(response)
            }
        });

    }

    cargarEquipos();
})