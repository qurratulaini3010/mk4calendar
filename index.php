<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Calendar</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
            margin: 10px;
        }

        #container {
            text-align: center;
        }

        .form-container {
            display: flex;
            align-items: center;
            justify-content: right;
            flex-wrap: wrap;
        }
        #title {
            top: 0px;
            display: flex;
        }
        .form-group {
            margin: 10px;

        }

        table {
            border-collapse: collapse;
            bottom: 2000px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 20px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }

        .current-month {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<div id="container">

    <div class="form-container">
        <div class="form-group">
            <form method="post" action= "index.php" >
            <label for="month">Bulan:</label><br>
            <select name="month" id="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Tahun:</label><br>
            <input type="number" name="year" id="year" value="2023" min="1900" max="2099">
        </div>

        <div class="form-group">
            <input type="submit" value="papar">
            </form>
        </div>
    </div>



    <?php
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the selected month and year from the form
        $selectedMonth = intval($_POST['month']);
        $selectedYear = intval($_POST['year']);

        // Create a DateTime object for the selected month and year
        $date = new DateTime();
        $date->setDate($selectedYear, $selectedMonth, 1);

        // Get the number of days in the selected month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);

        // Display the calendar table
        echo '<h2 id="title">' . $date->format('F Y') . '</h2>';
        echo '<table id = "calendar">';
        echo '<tr>';
        echo '<th>Sun</th>';
        echo '<th>Mon</th>';
        echo '<th>Tue</th>';
        echo '<th>Wed</th>';
        echo '<th>Thu</th>';
        echo '<th>Fri</th>';
        echo '<th>Sat</th>';
        echo '</tr>';

        // Determine the day of the week for the first day of the month
        $startDayOfWeek = $date->format('w');

        // Create the first row of the calendar
        echo '<tr>';
        for ($i = 0; $i < $startDayOfWeek; $i++) {
            echo '<td></td>';
        }
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if ($startDayOfWeek == 7) {
                echo '</tr><tr>';
                $startDayOfWeek = 0;
            }
            echo '<td>' . $day . '</td>';
            $startDayOfWeek++;
        }
        // Fill in the remaining cells in the last row
        while ($startDayOfWeek < 7) {
            echo '<td></td>';
            $startDayOfWeek++;
        }

        echo '</tr>';
        echo '</table>';
    } else {
        // Get the selected month and year from the form
        $selectedMonth = intval(9);
        $selectedYear = intval(2023);

        // Create a DateTime object for the selected month and year
        $date = new DateTime();
        $date->setDate($selectedYear, $selectedMonth, 1);

        // Get the number of days in the selected month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);

        // Display the calendar table
        echo '<h2 id ="title">' . $date->format('F Y') . '</h2>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Sun</th>';
        echo '<th>Mon</th>';
        echo '<th>Tue</th>';
        echo '<th>Wed</th>';
        echo '<th>Thu</th>';
        echo '<th>Fri</th>';
        echo '<th>Sat</th>';
        echo '</tr>';

        // Determine the day of the week for the first day of the month
        $startDayOfWeek = $date->format('w');

        // Create the first row of the calendar
        echo '<tr>';
        for ($i = 0; $i < $startDayOfWeek; $i++) {
            echo '<td></td>';
        }
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if ($startDayOfWeek == 7) {
                echo '</tr><tr>';
                $startDayOfWeek = 0;
            }
            echo '<td>' . $day . '</td>';
            $startDayOfWeek++;
        }
        // Fill in the remaining cells in the last row
        while ($startDayOfWeek < 7) {
            echo '<td></td>';
            $startDayOfWeek++;
        }

        echo '</tr>';
        echo '</table>';
    }
    ?>
</div>

</body>
</html>
