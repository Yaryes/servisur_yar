var selectVehivulo = document.getElementById('selectVehivulo');

var patentes = [];

var buscarEquipos = function () {
    var value = selectVehivulo.value;
    switch (value) {
        case "Camion":
            controlador = [];
            controlador.push(value);
            
            $.ajax({
                type: 'POST',
                url: 'recursos/funciones/Vehiculo_fx.php',
                data: { controlador },
                datatype: { JSON },
                success: function (succesrespuesta)  {                     
                    console.log(succesrespuesta);   
                //  var array = JSON.parse(succesrespuesta);
                //  console.log(array);   
                //     patentes = arrays['patenteCamion'];
                //     console.log(arrays['patenteCamion'][1]);
                //     console.log(patentes[2]);
                //     console.log(patentes);         
                //    ActualizarListas(patentes);
                  
                }
            });
            console.log(value);
            break;
        case "Rampla":
            // controlador = [];
            // controlador.push(value);
            // $.ajax({
            //     type: 'POST',
            //     url: 'recursos/funciones/registroRampla_fx.php',
            //     data: { controlador },
            //     datatype: { JSON },
            //     success: function (succesrespuesta) {                                    
            //         var arrays = JSON.parse(succesrespuesta);
            //         patentes = arrays['patenteCamion'];
            //         console.log(arrays['patenteCamion'][1]);
            //         console.log(patentes[2]);
            //         console.log(patentes);         
            //        ActualizarListas(patentes);
            //     }
            // });
            console.log(value);
            break;
        case "Grua":
        console.log(value);
            break;
        default:
            console.log(""); 
            break;
    }

}



selectVehivulo.addEventListener('click', buscarEquipos);
