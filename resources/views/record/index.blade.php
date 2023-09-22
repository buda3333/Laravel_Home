<!DOCTYPE html>
<html>
<head>
    <title>Записаться на прием</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h1>Записаться на прием</h1>
    <p>Пожалуйста, заполните форму ниже:</p>
    <form action="{{ route('register.record') }}" method="post">
        @csrf
        <label for="services">Services:</label>
        <select id="services" name="service_id" onchange="updateSpecialists()">
            @foreach ($services as $service)
                <option value={{ $service->id }}>{{ $service->name }}</option>
            @endforeach
        </select>
        <label for="name">Your Name:</label><label style="color: #4b1010">@error('name') {{ $message }} @enderror</label>
        <input type="text" id="name" name="name">
        <label for="specialist">Specialist:</label>
        <select id="specialist" name="specialist_id">
        </select>
        <label for="preferred_date_time">Preferred Date and Time:</label>
        <input type="datetime-local" id="preferred_date_time" name="datetime">
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function updateSpecialists() {
        let serviceId = document.getElementById("services").value;
        let specialistServices = {!! json_encode($specialistServices) !!};
        let specialists = {!! json_encode($specialists) !!};
        let specialistSelect = document.getElementById("specialist");
        specialistSelect.innerHTML = "";

        for (let i = 0; i < specialistServices.length; i++) {
            if (specialistServices[i].service_id == serviceId) {
                let specialistId = specialistServices[i].specialist_id;
                let specialist = specialists.find(specialist => specialist.id == specialistId);

                if (specialist) {
                    let option = document.createElement("option");
                    option.value = specialist.id;
                    option.text = specialist.name;

                    // Add the description to the option's title attribute
                    option.title = specialist.description;

                    specialistSelect.add(option);
                }
            }
        }
    }
</script>
</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/aeaeaeaeaeae.jpg');
        background-size: cover; /* This will cover the entire viewport */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-attachment: fixed; /* Keeps the image fixed while scrolling */
    }

    /* Rest of your existing CSS styles */
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0px 0px 10px #888888;
        background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the container */
    }


    h1 {
        font-size: 36px;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        font-size: 20px;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 18px;
        margin-bottom: 10px;
    }

    input, select, textarea {
        font-size: 18px;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        font-size: 20px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

</style>
