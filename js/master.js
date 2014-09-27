/**
 * Created by Mo' Murder on 9/27/2014.
 */
$(document).ready(function(){
    //Still mucking around with this but the calendar doesn't like to be hidden.. not really an issue for a sample
    $('.calendarTable').click(function(){
        $(this).html('Refresh Calendar');
        $('.hideCalendar').removeClass('hide');
        $('.tableCalendar').removeClass('hide');
        calvis.ready(main);
    });
    //Below button is actually disconnected
    $('.hideCalendar').click(function(){
        $(this).addClass('hide');
        $('.calendarBodyDiv').addClass('hide');
    });

// The below calls will generate a calendar based off of the URL given.. which is the calendar currently in use.
    function main() {
        var calId = 'nau.edu_qqegsuokfju24hteng42eimm0c@group.calendar.google.com';

        var calendar = new calvis.Calendar();

        // set the CSS IDs for various visual components for the calendar container
        calendar.setCalendarBody('calendarBodyDiv');
        calendar.setStatusControl('statusControlDiv');
        calendar.setNavControl('navControlDiv');
        calendar.setViewControl('viewControlDiv');
        calendar.setEventCallback('mouseover', displayEvent);

        // set the calenar to pull data from this Google Calendar account
        calendar.setPublicCalendar(calId);
        calendar.setLoginControl('loginControlDiv');

        calendar.setDefaultView('month');
        calendar.render();
    }
    function displayEvent(event) {
        var title = event.getTitle().getText();
        var date = event.getTimes()[0].getStartTime().getDate();
        var content = event.getContent().getText();

        var eventHtml = [];
        eventHtml.push(date.toString());
        eventHtml.push('<br><br>');
        eventHtml.push('<b>Event title:</b> ');
        eventHtml.push(title);
        eventHtml.push('<br>');
        eventHtml.push('<br>');
        eventHtml.push('<b>Description:</b>');
        eventHtml.push('<p style="font-size: 11px;">');
        eventHtml.push(content);
        eventHtml.push('</p>');
        eventHtml.push('<br>');
        document.getElementById('eventDisplayDiv').innerHTML = eventHtml.join('');
    }
});