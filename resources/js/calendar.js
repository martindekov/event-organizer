import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");

    var calendar = new Calendar(calendarEl, {
        height: 650,
        plugins: [dayGridPlugin,  'bootstrap'],
        defaultView: "dayGridMonth",
        themeSystem: "bootstrap",

        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
          },
    });

    calendar.render();
});
