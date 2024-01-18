<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Calendar - Май 2024</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #fde6f2, #c9c9ff);
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #e6e6e6;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        th {
            background: linear-gradient(to right, #ff99cc, #ff66b2);
            color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .weekend {
            color: #ff0055;
        }

        .holiday {
            background: linear-gradient(to right, #ffc2cc, #ffb3b3);
            color: #fff;
        }

        .highlight-may {
            background: linear-gradient(to right, #b3ffcc, #00cc66);
            color: #fff;
        }

        .highlight-victory-day,
        .highlight-labor-day {
            background: linear-gradient(to right, #ff6666, #ff0000);
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        function getCalendar($month, $year) {
            if (!$month) $month = date('n');
            if (!$year) $year = date('Y');

            $date = new DateTime("$year-$month-01");
            
            echo '<table>';
            echo '<tr>';
            $daysOfWeek = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
            
            foreach ($daysOfWeek as $day) {
                echo '<th>' . $day . '</th>';
            }
            echo '</tr>';

            while ($date->format('n') == $month) {
                echo '<tr>';
                
                foreach ($daysOfWeek as $dayOfWeek) {
                    echo '<td';

                    if ($dayOfWeek == 'Сб' || $dayOfWeek == 'Вс') {
                        echo ' class="weekend"';
                    }

                    if ($date->format('n') == 5 && ($date->format('j') == 1 || $date->format('j') == 9)) {
                        echo ' class="holiday highlight-may highlight-victory-day"';
                    }

                    if ($date->format('n') == 5 && $date->format('j') == 1) {
                        echo ' class="holiday highlight-may highlight-labor-day"';
                    }

                    echo '>' . $date->format('j') . '</td>';

                    $date->add(new DateInterval('P1D'));
                }

                echo '</tr>';
            }

            echo '</table>';
        }

        echo '<script>';
        echo 'document.write("Май 2024");';
        echo '</script>';

        getCalendar(5, 2024);
    ?>
</body>
</html>
