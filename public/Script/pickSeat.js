const seatPosition = document.querySelectorAll('.seat');
const seatInput = document.getElementById('inputSeats');
const seatLabel = document.getElementById('labelSeats');

const formSeat = document.querySelector('.enterTicket');

for (let i = 0; i < seatPosition.length; i++) {
    seatPosition[i].addEventListener('click', (event) => {
        const value = event.target.getAttribute('data-seat');
        seatInput.value = value;
        seatLabel.textContent = "Seat no: " + value;
        formSeat.action = ""
    });
}
