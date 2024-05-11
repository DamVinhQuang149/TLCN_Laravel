function handleTimer() {
    const clockElements = document.querySelectorAll(".clock");
    clockElements.forEach((clockElement) => {
        const end_date = clockElement.getAttribute("data-endTime");
        console.log(end_date);
        function formatDate(date) {
            const day = new Date(date).getDate();
            const month = new Date(date).toLocaleString("en", {
                month: "long",
            });

            const year = new Date(date).getFullYear();
            return `${day} ${month} ${year}`;
        }
        const formatDateTime = formatDate(end_date);
        const targetDate = new Date(`${formatDateTime}`);
        const date = new Date();
        const timeDiff = targetDate.getTime() - date.getTime();
        const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
            (timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

        const dayElement = clockElement.querySelector(".date");
        const hourElement = clockElement.querySelector(".hour");
        const minuteElement = clockElement.querySelector(".minute");
        const secondElement = clockElement.querySelector(".second");

        dayElement.textContent = days;
        hourElement.textContent = hours;
        minuteElement.textContent = minutes;
        secondElement.textContent = seconds;
    });
}

setInterval(handleTimer, 1000);
