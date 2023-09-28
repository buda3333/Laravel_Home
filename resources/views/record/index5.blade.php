<!DOCTYPE html>
<html lang="en">
<body>
<form action="{{ route('register.record5') }}" method="post" class="container">
    @csrf
    <h1>Записаться</h1>
    <h3>Ваши Данные</h3>

    <div class="custom-datetime-input">
        <label for="date">Дата:</label>
        <select name="date" id="date">
        @foreach($calendars->unique('date') as $uniqueCalendar)
            <option value="{{ $uniqueCalendar->date }}">{{ $uniqueCalendar->date }}</option>
            @endforeach
            </select>
    </div>

    <div class="custom-datetime-input">
        <label for="time">Время:</label>
        <select name="time" id="time">
            @foreach($calendars as $calendar)
                <option value="{{ $calendar->time }}" data-date="{{ $calendar->date }}">{{ $calendar->time }}</option>
            @endforeach
        </select>
    </div>
    <div class="pr-dtl">
        <div class="input-div">
            <label for="name">Your Phone:</label><label style="color: #4b1010">@error('phone') {{ $message }} @enderror</label>
            <input type="text" id="phone" name="phone">
        </div>
    </div>

    <input type="submit" id="submit-btn" value="Продолжить">
</form>
<video class="bg-effect" muted autoplay>
    <source src="https://regestrationpage.glitch.me/smoke_video.mp4" type="video/mp4">
</video>
<script>
    const dateSelect = document.getElementById('date');
    const timeSelect = document.getElementById('time');

    function updateTimeOptions() {
        const selectedDate = dateSelect.value;
        const timeOptions = document.querySelectorAll('#time option');

        let firstVisibleOption = null;

        timeOptions.forEach(option => {
            if (option.dataset.date === selectedDate) {
                option.style.display = 'block';

                if (!firstVisibleOption) {
                    firstVisibleOption = option;
                }
            } else {
                option.style.display = 'none';
            }
        });

        if (firstVisibleOption) {
            timeSelect.value = firstVisibleOption.value;
        } else {
            timeSelect.value = '';
        }
    }

    dateSelect.addEventListener('change', updateTimeOptions);
    updateTimeOptions();
</script>
</body>
</html>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        outline: none;
        font-family: sans-serif;
        font-weight: 1000;
    }

    input:-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: black;
        color: white;
    }

    h1 {
        font-size: 50px;
    }

    .container {
        width: 1000px;
        display: flex;
        align-items: center;
        justify-content: center;
        grid-row-gap: 40px;
        flex-direction: column;
        padding: 50px;
    }

    .pr-dtl, .add-dtl, .ps-dtl {
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 30px;
        align-items: center;
        justify-content: center;
    }

    .input-div {
        display: flex;
        flex-direction: column;
        grid-gap: 10px;
    }

    label {
        font-size: 20px;
    }

    input {
        height: 50px;
        width: 300px;
        background: none;
        padding: 10px;
        border: 2px solid white;
        color: white;
    }

    #submit-btn {
        height: 50px;
        width: 200px;
        background: none;
        border: 2px solid white;
        transition: 0.5s all;
        color: white;
        cursor: pointer;
    }

    #submit-btn:hover {
        color: black;
        background: white;
    }

    .tc {
        width: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        grid-gap: 10px;
    }

    .tc input {
        height: 20px;
        width: 20px;
        cursor: pointer;
    }

    .tc a {
        text-decoration: none;
        color: white;
    }

    span {
        color: red;
        font-size: 15px;
    }

    h3 {
        display: flex;
    }

    h3:after {
        content: "";
        position: absolute;
        height: 3px;
        width: 20px;
        margin-top: 30px;
        background: white;
        animation: ani 4s linear infinite;
    }

    @keyframes ani {
        50% {
            margin-left: 100px;
        }
    }

    .bg-effect {
        position: absolute;
        width: 100%;
        z-index: -1;
        background-size: cover;
        margin-top: -100px;
        filter: blur(50px);
        transform: rotate(180deg);
    }

    .middel-fx {
        height: 300px;
        width: 300px;
        background: royalblue;
        filter: blur(100px);
        position: absolute;
        border-radius: 50%;
    }

    @media screen and (max-width: 1050px) {
        body {
            overflow-x: hidden;
        }

        .container {
            width: 100%;
        }

        .pr-dtl, .add-dtl, .ps-dtl {
            width: 150%;
            display: grid;
            grid-template-columns: 70%;
            grid-gap: 30px;
            align-items: center;
            justify-content: center;
        }

        input {
            width: 100%;
        }

        #submit-btn {
            width: 100%;
        }

        .bg-effect {
            width: 400%;
            height: 100%;
            margin-top: -200px;
            transform: rotate(90deg);
        }
    }

    /* Стили для элемента ввода даты и времени */
    .service-buttons {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="datetime-local"] {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 250px;
    }

    /* Стили для кнопки */
    .service-button {
        height: 50px;
        width: 200px;
        padding: 10px 20px;
        background: none;
        border: 2px solid white;
        color: white;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.5s, color 0.5s;
        margin-bottom: 10px;
    }

    .service-button:hover {
        color: black;
        background: white;
    }
    /* Стили для элемента ввода даты и времени */
    .custom-datetime-input {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .custom-datetime-input input[type="date"],
    .custom-datetime-input input[type="time"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 150px;
        height: 30px;
        font-size: 48px; /* Increased font size by 3 times */
    }

    .custom-datetime-input label {
        font-weight: bold;
        font-size: 50px; /* Increased font size by 3 times */
    }
    .custom-datetime-input select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 170px; /* Увеличена ширина поля */
        height: 50px; /* Увеличена высота поля */
        font-size: 24px; /* Увеличен размер шрифта */
    }
</style>
