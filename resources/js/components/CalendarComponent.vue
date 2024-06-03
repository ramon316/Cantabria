<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar, { EventApi } from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import esLocale from '@fullcalendar/core/locales/es'
import route from '../../../vendor/tightenco/ziggy/src/js'

export default {
  
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  mounted(){
    
  },
  data() {
    return {
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        dateClick: this.handleDateClick,
        eventClick: this.handleClick,
        locale: esLocale,
        headerToolbar:{
          left: "prev next",
          center: "title",
          right: "today dayGridWeek dayGridMonth",
        },
        eventSources: [
          {
            url: '/eventos/list',
          }
        ],
        
      },
    }
  },
  methods: {
    handleDateClick: function(arg) {
      //alert('date click ' + arg.dateStr)
    },
    handleClick: function(info){
      //alert(info.event.url)
      //$('#evento').modal('show')
      //Aquí ya tengo la información con info.event.id
    }
  }
}
</script>
<template>
  <div class="container">
    <FullCalendar 
    :options="calendarOptions"
    ></FullCalendar>
  </div>
</template>