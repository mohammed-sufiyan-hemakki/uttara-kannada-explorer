<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Track Status - UK Explorer</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> 
        <a href="booking.php">Booking</a> 
        <a href="check_status.php">Status</a> 
        <a href="feedback.php">Feedback</a>
    </nav>
    <div class="container" style="max-width: 600px;">
        <div class="card" style="padding: 40px;">
            <h2 style="margin-top:0; color: var(--primary); text-align:center;">Track Booking Status</h2>
            <p style="text-align:center; color:#666; font-size:0.9rem; margin-bottom:25px;">Enter your registered phone number to verify your guide approval status.</p>
            
            <form method="POST">
                <input type="text" name="search_phone" placeholder="Ex: 9876543210" style="text-align:center; font-size:1.1rem; letter-spacing:1px;" required>
                <button type="submit" name="check" class="btn" style="width:100%;">Verify Booking Status</button>
            </form>

            <?php
            if(isset($_POST['check'])){
                $phone = mysqli_real_escape_string($conn, $_POST['search_phone']);
                $res = mysqli_query($conn, "SELECT status, plan, travel_date FROM bookings WHERE phone = '$phone' ORDER BY id DESC");
                
                if(mysqli_num_rows($res) > 0){
                    echo "<div style='margin-top:30px; border-top: 2px dashed #e1e9eb; padding-top:20px;'>";
                    while($row = mysqli_fetch_assoc($res)){
                        $statusClass = 'badge-pending';
                        if($row['status'] == 'Confirmed') $statusClass = 'badge-confirmed';
                        if($row['status'] == 'Rejected') $statusClass = 'badge-rejected';

                        echo "<div style='background:#f8fbfc; padding:15px; border-radius:12px; margin-bottom:15px; border:1px solid #edf4f5;'>";
                        echo "<div style='font-size:0.85rem; color:#7f8c8d;'>Date: " . $row['travel_date'] . "</div>";
                        echo "<h4 style='margin:5px 0; color:var(--primary);'>" . $row['plan'] . "</h4>";
                        echo "<div style='margin-top:8px;'>Status: <span class='badge " . $statusClass . "'>" . $row['status'] . "</span></div>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<div style='margin-top:25px; padding:15px; background:#fdf2f2; color:var(--danger); border-radius:10px; font-weight:500; text-align:center; border: 1px solid #fde2e2;'>
                            ❌ No active booking found recorded under this mobile number.
                          </div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>