const form = document.getElementById('events-form');
const eventInfoDiv = document.getElementById('event-info');

form.addEventListener('change', (e) => {
    const checkedEvent = e.target.value;
    const eventInfo = getEventInfo(checkedEvent);
    eventInfoDiv.innerHTML = eventInfo;
});

function getEventInfo(event) {
    // Replace with actual data or API calls
    const eventsData = {
        'market-spaces': '<h2>Market Spaces</h2><p>Info about market spaces...</p>',
        'celebrations': '<h2>Celebrations</h2><p>Info about celebrations...</p>',
        'views': '<h2>Views</h2><p>Info about views...</p>'
    };
    return eventsData[event];
}