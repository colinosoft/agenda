document.addEventListener('DOMContentLoaded', function () {
    axios.post(baseURL + '/agenda/monstrarTratamiento').
        then(
            (respuesta) => {

                var sel = document.getElementById('servicio');
                if (!sel.options.length) {
                    for (var i = 0; i < respuesta.data.length; i++) {
                        //console.log(respuesta.data[i]);
                        var opt = document.createElement('option');
                        opt.innerHTML = respuesta.data[i].nombreTratamiento;
                        opt.value = respuesta.data[i].nombreTratamiento;
                        sel.appendChild(opt);
                    }
                }
                // var select = document.getElementById('servicio');
                // formulario.title.value = select.options[select.selectedIndex].value;
                // formulario.start.value = info.dateStr + '\T12:00:00';
                // formulario.end.value = info.dateStr + '\T12:00:00';
                // $("#evento").modal("show");

            }
        )
        .catch(
            error => {
                if (error.response) {
                    console.log(error.response.data);
                }
            }
        );

        $("#confirmar").on('click',function(){

        })
});
