<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Book Trip - UK Explorer</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> 
        <a href="places.php">Places</a> 
        <a href="booking.php">Booking</a> 
        <a href="check_status.php">Status</a> 
        <a href="feedback.php">Feedback</a>
    </nav>

    <div class="container" style="max-width: 1000px;">
        
        <h2 style="text-align: center; color: var(--primary); margin-bottom: 35px; font-size: 2rem;">Choose Your Planned Adventure</h2>
        
        <div class="grid-2" style="margin-bottom: 40px;">
            <div class="card" style="border-top: 6px solid var(--secondary); background: #fffaf7;">
                <h3 style="color: var(--primary); margin-top: 0; display: flex; align-items: center; gap: 8px;">🌊 2 Days Coastal Highlights</h3>
                <p style="font-size: 0.9rem; color: #666; margin-top: -5px;"><strong>Pickup Point:</strong> Honnavar Station / Bus Stand (8:00 AM)</p>
                <ul style="font-size: 0.88rem; padding-left: 20px; line-height: 1.6; color: #444;">
                    <li><strong>Day 1:</strong> Sharavati Backwater Boating tour, Mangrove Boardwalk paths, Eco Beach walk & sunset at Apsarakonda water streams.</li>
                    <li><strong>Day 2:</strong> Majestic Murdeshwar Shiva Statue and historical Mirjan Fort exploration walk.</li>
                </ul>
                <div style="margin-top: 20px; font-weight: bold; color: var(--secondary); font-size: 1.1rem;">Price: ₹3,500 / Person</div>
            </div>

            <div class="card" style="border-top: 6px solid var(--primary); background: #f7fbfc;">
                <h3 style="color: var(--primary); margin-top: 0; display: flex; align-items: center; gap: 8px;">🏰 4 Days Ultimate Heritage</h3>
                <p style="font-size: 0.9rem; color: #666; margin-top: -5px;"><strong>Pickup Point:</strong> Gokarna Road Station (9:00 AM)</p>
                <ul style="font-size: 0.88rem; padding-left: 20px; line-height: 1.6; color: #444;">
                    <li><strong>Day 1:</strong> Scenic Gokarna Beach Mountain Trek (Om Beach to Half Moon view).</li>
                    <li><strong>Day 2:</strong> Ancient Yana Cave Rocks hike & refreshing dip at Vibhuti Waterfalls.</li>
                    <li><strong>Day 3:</strong> Honnavar Mangrove Boardwalk trails & lazy backwater river cruise.</li>
                    <li><strong>Day 4:</strong> Idagunji Ganesha Temple visit and Murdeshwar bazaar spice shopping.</li>
                </ul>
                <div style="margin-top: 20px; font-weight: bold; color: var(--primary); font-size: 1.1rem;">Price: ₹7,500 / Person</div>
            </div>
        </div>

        <div class="card" style="max-width: 650px; margin: 0 auto; padding: 40px;">
            <h2 style="text-align: center; margin-top: 0; color: var(--primary);">Reserve Your Explorer Spot</h2>
            <p style="text-align: center; font-size: 0.88rem; color: #ff6b1a; font-weight: 600; margin-bottom: 30px; background: #fff0e6; padding: 8px; border-radius: 8px;">
                💰 Zero Advance Pre-payment Required - Pay Directly On Arrival
            </p>
            
            <form method="POST">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter traveler full name" required>
                
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Enter your 10-digit mobile number" required>
                
                <label>Select Tour Plan Package</label>
                <select name="plan" required>
                    <option value="" disabled selected>-- Choose an adventure package plan --</option>
                    <option value="2-Day Coastal Highlights">2-Day Coastal Highlights (₹3,500/person)</option>
                    <option value="4-Day Ultimate Heritage">4-Day Ultimate Heritage (₹7,500/person)</option>
                </select>
                
                <div class="grid-2" style="gap: 0 20px; margin-bottom: 0;">
                    <div>
                        <label>No. of Explorers</label>
                        <input type="number" name="persons" min="1" value="1" required>
                    </div>
                    <div>
                        <label>Travel Date</label>
                        <input type="date" name="travel_date" required>
                    </div>
                </div>
                
                <button type="submit" name="book" class="btn" style="width: 100%; margin-top: 15px;">Confirm Travel Booking Request</button>
            </form>

            <?php
            if(isset($_POST['book'])){
                $n = mysqli_real_escape_string($conn, $_POST['name']); 
                $p = mysqli_real_escape_string($conn, $_POST['phone']); 
                $pl = mysqli_real_escape_string($conn, $_POST['plan']); 
                $pr = (int)$_POST['persons']; 
                $d = $_POST['travel_date'];
                
                $q = "INSERT INTO bookings (name, phone, plan, persons, travel_date, status) VALUES ('$n', '$p', '$pl', '$pr', '$d', 'Pending')";
                if(mysqli_query($conn, $q)){
                    echo "<div style='margin-top:25px; padding:15px; background:#e8f8f5; color:#27ae60; border-radius:10px; font-weight:600; text-align:center; border: 1px solid #a3e4d7;'>
                            🎉 Booking Registered successfully! Guide Sahil Shaikh will call you shortly to coordinate!
                          </div>";
                } else {
                    echo "<div style='margin-top:25px; padding:15px; background:#fadbd8; color:#c0392b; border-radius:10px; text-align:center;'>Error updating record: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>