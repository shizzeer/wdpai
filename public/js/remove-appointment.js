const closeCardIcon = document.getElementById('close_icon');

function func() {
    alert('Changed!');
}

closeCardIcon.addEventListener('click', () => {
    const appointmentCard = document.getElementById("appointment_card");
    const appointmentId = appointmentCard.getAttribute('appointment_id');

    fetch('http://localhost:8080/remove_appointment', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: appointmentId })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Status Code Error: ${response.status}');
            }
            return response.text();
        })
        .then(data => {
            appointmentCard.remove();
        })
        .catch(error => {
            alert(error);
        })
})