<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Feedback - UK Explorer</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> 
        <a href="places.php">Places</a> 
        <a href="booking.php">Booking</a> 
        <a href="check_status.php">Status</a> 
        <a href="feedback.php">Feedback</a>
    </nav>

    <div class="container" style="max-width: 600px;">
        <form method="POST" class="card" style="padding: 40px;">
            <h2 style="margin-top:0; color:var(--primary); text-align:center;">Share Your Travel Review</h2>
            <p style="text-align:center; color:#666; font-size:0.9rem; margin-bottom:25px;">Your reviews help Sahil optimize tour trails for upcoming vacation groups.</p>
            
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Your name" required>
            
            <label>Trip Experience Rating</label>
            <select name="rating" required>
                <option value="5">⭐⭐⭐⭐⭐ 5 - Mindblowing Experience</option>
                <option value="4">⭐⭐⭐⭐ 4 - Great Service</option>
                <option value="3">⭐⭐⭐ 3 - Satisfactory & Fun</option>
                <option value="2">⭐⭐ 2 - Average Trails</option>
                <option value="1">⭐ 1 - Poor Experience</option>
            </select>

            <label>Share Your Detailed Experience Comments</label>
            <textarea name="comment" rows="5" placeholder="Tell travelers about the hidden locations, vehicle cleanliness, and Sahil's guiding..." required></textarea>
            
            <button type="submit" name="submit_feedback" class="btn" style="width:100%;">Submit Review Feedback</button>
        </form>

        <?php
        if(isset($_POST['submit_feedback'])){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $rating = (int)$_POST['rating'];
            $comment = mysqli_real_escape_string($conn, $_POST['comment']);

            $sql = "INSERT INTO feedback (name, rating, comment) VALUES ('$name', '$rating', '$comment')";
            if(mysqli_query($conn, $sql)){
                echo "<div style='padding:15px; background:#e8f8f5; color:var(--success); border-radius:10px; font-weight:600; text-align:center; border: 1px solid #a3e4d7;'>
                        ❤️ Thank you so much! Your experience rating loop has been permanently recorded.
                      </div>";
            }
        }
        ?>
    </div>
</body>
</html>