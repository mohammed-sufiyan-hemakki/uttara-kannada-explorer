<?php 
session_start();
include('db.php');

// Security Check: Redirect to login if admin session is not active
if(!isset($_SESSION['admin_logged_in'])) { 
    header("Location: login.php"); 
    exit; 
}

// Process Manual Action Requests from the Dashboard Links
if(isset($_GET['approve'])){ 
    $approve_id = (int)$_GET['approve'];
    mysqli_query($conn, "UPDATE bookings SET status='Confirmed' WHERE id=$approve_id"); 
    header("Location: admin.php"); 
    exit;
}
if(isset($_GET['reject'])){ 
    $reject_id = (int)$_GET['reject'];
    mysqli_query($conn, "UPDATE bookings SET status='Rejected' WHERE id=$reject_id"); 
    header("Location: admin.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard Control - UK Explorer</title>
</head>
<body>
    <nav style="background: #2c3e50; justify-content: space-between; padding: 15px 8%;">
        <div style="color: white; font-weight: 700; font-size: 1.2rem; letter-spacing:0.5px;">⚓ UK Explorer Management</div>
        <div>
            <a href="index.php" target="_blank" style="color: #fff; margin-right: 20px;">Live Website View</a> 
            <a href="logout.php" style="color: #ff4757; background: rgba(255,71,87,0.1); padding: 8px 18px; border-radius: 20px; font-weight:600;">Secure Log Out</a>
        </div>
    </nav>
    
    <div class="container">
        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 1.7rem; display:flex; align-items:center; gap:10px;">📋 Client Active Tour Bookings</h2>
        
        <div class="card" style="padding: 10px; overflow-x: auto; border:none;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Customer Identity</th>
                        <th>Selected Plan</th>
                        <th>Travel Date</th>
                        <th>Approval Status</th>
                        <th>Management Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
                    if(mysqli_num_rows($res) == 0){
                        echo "<tr><td colspan='5' style='text-align:center; color:#95a5a6; padding:30px;'>No tour bookings registered yet.</td></tr>";
                    }
                    while($row = mysqli_fetch_assoc($res)){
                        
                        // Check if the customer paid using our new payment gateway loop
                        if($row['status'] == 'Paid') {
                            $badgeClass = "";
                            $customBadge = "<span style='padding:6px 12px; border-radius:20px; font-size:0.8rem; font-weight:600; background:#e8f8f5; color:#2ecc71; border:1px solid #a3e4d7;'>💰 Paid (Online)</span>";
                            // If they already paid, we can change actions to show a complete order receipt settlement flag
                            $actions = "<span style='color:#7f8c8d; font-size:0.85rem; font-style:italic;'>No Action Required</span>";
                        } else {
                            // Standard action statuses for manual approval requests
                            if($row['status'] == 'Confirmed') {
                                $customBadge = "<span style='padding:6px 12px; border-radius:20px; font-size:0.8rem; font-weight:600; background:#ebf5fb; color:#2980b9;'>Confirmed</span>";
                            } elseif($row['status'] == 'Rejected') {
                                $customBadge = "<span style='padding:6px 12px; border-radius:20px; font-size:0.8rem; font-weight:600; background:#fceae8; color:#e74c3c;'>Rejected</span>";
                            } else {
                                $customBadge = "<span style='padding:6px 12px; border-radius:20px; font-size:0.8rem; font-weight:600; background:#fff9e6; color:#f39c12;'>Pending</span>";
                            }
                            
                            $actions = "<a href='admin.php?approve={$row['id']}' style='text-decoration:none; color:var(--success); font-weight:600; margin-right:12px; background:#e8f8f5; padding:6px 12px; border-radius:6px; font-size:0.8rem;'>Approve</a>
                                        <a href='admin.php?reject={$row['id']}' style='text-decoration:none; color:var(--danger); font-weight:600; background:#fceae8; padding:6px 12px; border-radius:6px; font-size:0.8rem;'>Reject</a>";
                        }

                        echo "<tr>
                            <td>
                                <strong style='color:#2c3e50; font-size:0.95rem;'>{$row['name']}</strong><br>
                                <span style='color:var(--primary); font-size:0.85rem; font-weight:500;'>📞 {$row['phone']}</span>
                            </td>
                            <td><span style='font-weight:500; color:#34495e;'>{$row['plan']}</span><br><small style='color:#7f8c8d;'>Explorers: <strong>{$row['persons']}</strong></small></td>
                            <td style='font-weight:600; color:#555;'>{$row['travel_date']}</td>
                            <td>{$customBadge}</td>
                            <td>{$actions}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h2 style="color: #2c3e50; margin: 50px 0 25px 0; font-size: 1.7rem;">💬 Customer Feedbacks Log</h2>
        <div class="card" style="padding: 10px; overflow-x: auto; border:none;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th width="25%">User Identity</th>
                        <th width="20%">Given Rating</th>
                        <th width="55%">Detailed Review Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fres = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
                    if(mysqli_num_rows($fres) == 0){
                        echo "<tr><td colspan='3' style='text-align:center; color:#95a5a6; padding:30px;'>No reviews submitted yet.</td></tr>";
                    }
                    while($frow = mysqli_fetch_assoc($fres)){
                        $stars = str_repeat("⭐", $frow['rating']);
                        echo "<tr>
                            <td style='font-weight:600; color:#2c3e50;'>{$frow['name']}</td>
                            <td><span style='color:#f1c40f;'>{$stars}</span> <small style='color:#7f8c8d; font-weight:600;'>({$frow['rating']}/5)</small></td>
                            <td style='color:#555; font-style:italic; line-height:1.5;'>\"{$frow['comment']}\"</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>