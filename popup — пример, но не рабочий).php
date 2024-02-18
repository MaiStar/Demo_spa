<!-- popup.php -->
<div id="popup">
    <p>Текст или изображение в вашем всплывающем окне.</p>
    <p id="countdown">Осталось: <?php include 'get_remaining_time.php'; ?></p>
    <button onclick="closePopup()">Закрыть</button>
</div>

<script>
    // Функция для обновления отображаемого времени
    function updateCountdown() {
        // Отправляем запрос на сервер для получения обновленного времени
        fetch('get_remaining_time.php')
            .then(response => response.text())
            .then(time => {
                document.getElementById("countdown").innerHTML = "Осталось: " + time;
            })
            .catch(error => console.error('Ошибка получения времени:', error));
    }

    // Обновляем время при загрузке окна
    updateCountdown();

    // Обновляем время каждые 1000 миллисекунд (1 секунда)
    setInterval(updateCountdown, 1000);
</script>
