<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Events</title>
    <link rel="stylesheet" href="events.css">
</head>
<body>
    <div class="dropdown">
        <button class="dropbtn">Current Events</button>
        <div class="dropdown-content">
            <form id="events-form">
                <label>
                    <input type="checkbox" name="event" value="market-spaces">
                    Market Spaces
                </label>
                <label>
                    <input type="checkbox" name="event" value="celebrations">
                    Celebrations
                </label>
                <label>
                    <input type="checkbox" name="event" value="views">
                    Views
                </label>
            </form>
        </div>
    </div>

    <div id="event-info"></div>

    <script src="event.js"></script>
</body>
</html>