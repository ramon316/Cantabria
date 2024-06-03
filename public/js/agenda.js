document.addEventListener('DOMContentLoaded', function() {
    /**Como tenemos dos formularios especificamos el formulario 
     * que utilizamos form de la clase ejemplo
     */
    let formulario = document.querySelector("form.ejemplo");
    
    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        //español
        locale: "es",
        //cabecera
        selectable: true,
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth, tomeGridWeek,listWeek',
        },

        //vamos a mandar a la pagina de crear evento mejor.
        /*dateClick: function(info){
            $("#evento").modal("show");
        }*/
    

    });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click",function(){
        const datos = new FormData(formulario);
        console.log(datos);
        console.log(formulario.fiesta.value);
    });
});