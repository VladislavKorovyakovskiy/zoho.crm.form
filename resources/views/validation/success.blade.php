<style>
    .validation-head,
    #timer {
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}
</style>

<h1 class="validation-head">Данные были успешно отправленны</h1>

    <h2 class="validation-head">Ви будете возвращены на гланвую через <div id="timer"></div></h2>

<script>
    setTimeout(function() {
    window.location.href = "http://laravel.vue/";
}, 5000);
const countdownElement = document.getElementById("timer");

let totalSeconds = 05;

const countdownInterval = setInterval(function() {
    totalSeconds--;
    
    if (totalSeconds < 0) {
        clearInterval(countdownInterval);
        return;
    }
    
    const minutes = Math.floor(totalSeconds / 60);
    const seconds = totalSeconds % 60;
    
    const formattedTime = `${seconds.toString()}`;
    
    countdownElement.textContent = formattedTime;
}, 1000);
</script>