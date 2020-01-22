import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

document.addEventListener("DOMContentLoaded", function() {
    var host = window.location.host;
    const xhr = new XMLHttpRequest();
    var approvedEvents = [];
    xhr.onreadystatechange = function(e) {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            for(var i = 0; i < response.length; i++) {
                var obj = response[i];
                var singleEvent = {
                    'title' : obj.name,
                    'start' : obj.start_date,
                    'end' : obj.end_date,
                    'url' : "http://" + host + "/events/show/" + obj.id
                };
                approvedEvents.push(singleEvent);
            }
            var calendarEl = document.getElementById("calendar");
            var calendar = new Calendar(calendarEl, {
                height: 650,
                plugins: [dayGridPlugin,  'bootstrap'],
                defaultView: "dayGridMonth",
                themeSystem: "bootstrap",
                        
                events: approvedEvents,
            
                header: {
                        left: 'prev',
                        center: 'title',
                        right: 'next'
                },
            });
            console.log(calendar);
            calendar.render();
            }
        }
    }
    xhr.open('get', "http://" + host + "/events/list", true);
    xhr.send();
});
