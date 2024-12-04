console.log("DOM fully loaded and parsed");
console.log("Fetching upcoming events...");

document.addEventListener("DOMContentLoaded", () => {
    const eventsContainer = document.getElementById("eventsContainer");

    // Fetch events from the backend
    fetch("/events/upcoming")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((events) => {
            // Clear any existing content
            eventsContainer.innerHTML = "";

            // Ecent Box
            events.forEach((event) => {
                const eventElement = document.createElement("div");
                eventElement.classList.add("event-item");
                eventElement.innerHTML = `
                    <h3>${event.title}</h3>
                    <p>${event.date} | ${event.start_time} - ${event.end_time}</p>
                    <p>${event.building_name}, Room ${event.room_number}</p>
                    <p>${event.description}</p>
                `;
                eventsContainer.appendChild(eventElement);
            });
        })
        .catch((error) => {
            console.error("Error fetching events:", error);
            eventsContainer.innerHTML = "<p>Failed to load events. Please try again later.</p>";
        });
});

