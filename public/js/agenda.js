// const { default: axios } = require("axios");

//const { method } = require("lodash");

document.addEventListener('DOMContentLoaded', function () {

    var formulario = document.querySelector("#formularioCita");

    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale: 'es',


        displayEventTime: false,

        headerToolbar: {

            left: 'prev,next today',

            center: 'title',

            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        eventSources: {

            url: baseURL + "/agenda/mostrar",
            method: "POST",
            backgroundColor: 'green',
            borderColor: 'green',
            extraParams: {
                _token: formulario._token.value,
            }
        },

        eventDrop: function (info) {
            alert(info.event.title + " was dropped on " + info.event.start.toISOString());

            if (!confirm("Are you sure about this change?")) {
                info.revert();
            }
        },

        dateClick: function (info) {

            formulario.reset();

            axios.post(baseURL + '/agenda/monstrarTratamiento').
                then(
                    (respuesta) => {

                        var sel = document.getElementById('servicio');
                        if (!sel.options.length) {
                            for (var i = 0; i < respuesta.data.length; i++) {

                                var opt = document.createElement('option');
                                opt.innerHTML = respuesta.data[i].nombreTratamiento;
                                opt.value = respuesta.data[i].id;
                                sel.appendChild(opt);
                            }
                        }
                        var select = document.getElementById('servicio');
                        formulario.title.value = select.options[select.selectedIndex].value;
                        formulario.id_user.value = 1;
                        formulario.start.value = info.dateStr + '\T12:00:00';
                        formulario.end.value = info.dateStr + '\T12:00:00';
                        $("#evento").modal("show");

                    }
                )
                .catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                )



        },

        eventClick: function (info) {
            var cita = info.event;

            axios.post(baseURL + "/agenda/editar/" + info.event.id).
                then(
                    (respuesta) => {



                        formulario.id.value = respuesta.data.id;
                        formulario.title.value = respuesta.data.title;
                        formulario.servicio.value = respuesta.data.servicio;
                        formulario.start.value = respuesta.data.start;
                        formulario.end.value = respuesta.data.end;

                        $("#evento").modal('show');
                    }
                )
                .catch(
                    error => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    }
                )
        }

    });

    calendar.render();


    document.getElementById("btnGuardar").addEventListener("click", function () {

        enviarDatos("/agenda/agregar");

    });

    document.getElementById('btnEliminar').addEventListener('click', function () {

        enviarDatos("/agenda/borrar/" + formulario.id.value);

    });

    document.getElementById('btnModificar').addEventListener('click', function () {

        enviarDatos("/agenda/actualizar/" + formulario.id.value);

    });

    function enviarDatos(url) {
        var sel = document.getElementById("servicio");
        formulario.title.value = sel.options[sel.selectedIndex].text
        formulario.id_tratamiento.value = formulario.servicio.value;
        const datos = new FormData(formulario);

        const nuevaURL = baseURL + url;

        axios.post(nuevaURL, datos).
            then(
                (respuesta) => {
                    calendar.refetchEvents();
                    $("#evento").modal('hide');
                }
            )
            .catch(
                error => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                }
            )
    }

});

