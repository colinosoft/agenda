// const { default: axios } = require("axios");

//const { method } = require("lodash");

document.addEventListener('DOMContentLoaded', function () {

  let formulario = document.querySelector("#formularioCita");

  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',

    locale: 'es',
    //displayEventTime: 'false',

    headerToolbar: {

      left: 'prev,next today',

      center: 'title',

      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },

    eventSources: {

      url: baseURL + "/cita/mostrar",
      method: "POST",
      backgroundColor: 'green',
      borderColor: 'green',
      extraParams: {
      _token: formulario._token.value,
      }
    },

    eventDrop: function(info) {
      alert(info.event.title + " was dropped on " + info.event.start.toISOString());

      if (!confirm("Are you sure about this change?")) {
        info.revert();
      }
    },
    dateClick: function (info) {
        // alert('Clicked on: ' + info.dateStr);
        // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        // console.log(info.jsEvent);
        formulario.reset();
        axios.post(baseURL + '/cita/monstrarTratamiento').
            then(
                (respuesta) => {
                    var sel = document.getElementById('servicio');
                    if(!sel.options.length){
                        for (var i = 0; i < respuesta.data.length; i++) {
                            console.log(respuesta.data[i]);
                            var opt = document.createElement('option');
                            opt.innerHTML = respuesta.data[i].nombreTratamiento;
                            opt.value = respuesta.data[i].nombreTratamiento;
                            sel.appendChild(opt);
                        }
                    }
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

      axios.post(baseURL + "/cita/editar/" + info.event.id).
        then(
          (respuesta) => {

            console.log(respuesta.data.start);

            formulario.id.value = respuesta.data.id;
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

    enviarDatos("/cita/agregar");

  });

  document.getElementById('btnEliminar').addEventListener('click', function () {

    enviarDatos("/cita/borrar/" + formulario.id.value);

  });

  document.getElementById('btnModificar').addEventListener('click', function () {

    enviarDatos("/cita/actualizar/" + formulario.id.value);

  });

  function enviarDatos(url) {

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

