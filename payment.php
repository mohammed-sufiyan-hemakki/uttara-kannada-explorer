<?php 
session_start();
include('db.php'); 

// Safety check: Redirect back if they haven't filled out a booking form
if(!isset($_SESSION['temp_name'])) {
    header("Location: booking.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Secure Checkout - UK Explorer</title>
</head>
<body class="admin-login-body"> <div class="login-container" style="max-width: 500px;">
        <div class="card" style="padding: 40px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: none;">
            
            <div style="text-align: center; margin-bottom: 25px; border-bottom: 1px solid #edf4f5; padding-bottom: 15px;">
                <span style="font-size: 0.8rem; background: #e8f8f5; color: #2ecc71; padding: 4px 12px; border-radius: 20px; font-weight: 600;">🔒 SECURE SANDBOX CHECKOUT</span>
                <h2 style="color: var(--primary); margin: 10px 0 0 0;">Payment Gateway</h2>
            </div>

            <div style="background: #f8fbfc; padding: 15px; border-radius: 12px; margin-bottom: 25px; border: 1px solid #edf4f5; font-size: 0.9rem;">
                <div style="display:flex; justify-content:space-between; margin-bottom:5px;">
                    <span style="color:#7f8c8d;">Lead Explorer:</span>
                    <strong><?php echo $_SESSION['temp_name']; ?></strong>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:5px;">
                    <span style="color:#7f8c8d;">Package Selected:</span>
                    <strong><?php echo $_SESSION['temp_short_plan'] = current(explode(' (', $_SESSION['temp_plan'])); ?></strong>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:5px;">
                    <span style="color:#7f8c8d;">Total Travelers:</span>
                    <strong><?php echo $_SESSION['temp_persons']; ?> Ticket(s)</strong>
                </div>
                <div style="display:flex; justify-content:space-between; margin-top:10px; border-top:1px dashed #e1e9eb; padding-top:10px; font-size:1.1rem;">
                    <span style="color:var(--primary); font-weight:600;">Total Payable:</span>
                    <strong style="color:var(--secondary);">₹<?php echo number_format($_SESSION['total_amount']); ?></strong>
                </div>
            </div>

            <form method="POST" id="paymentForm">
                <label>Cardholder Name</label>
                <input type="text" placeholder="Name written on card" required>
                
                <label>Card Number</label>
                <input type="text" placeholder="🪪 4321 •••• •••• 9876" maxlength="16" style="letter-spacing: 2px;" required>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label>Expiry Date</label>
                        <input type="text" placeholder="MM/YY" maxlength="5" style="text-align:center;" required>
                    </div>
                    <div>
                        <label>CVV Security Code</label>
                        <input type="password" placeholder="•••" maxlength="3" style="text-align:center;" required>
                    </div>
                </div>
                
                <button type="submit" name="process_payment" id="payBtn" class="btn" style="width: 100%; margin-top: 15px;">
                    Authorize Payment & Book
                </button>
            </form>

            <?php
            if(isset($_POST['process_payment'])){
                // Pull data out of temporary session storage
                $n = $_SESSION['temp_name'];
                $p = $_SESSION['temp_phone'];
                $pl = $_SESSION['temp_plan'];
                $pr = $_SESSION['temp_persons'];
                $d = $_SESSION['temp_date'];
                
                // Save directly to database with status marked automatically as 'Paid'
                $q = "INSERT INTO bookings (name, phone, plan, persons, travel_date, status) VALUES ('$n', '$p', '$pl', '$pr', '$d', 'Paid')";
                
                if(mysqli_query($conn, $q)){
                    // Clean up temporary transaction variables out of memory
                    unset($_SESSION['temp_name']); unset($_SESSION['temp_phone']); unset($_SESSION['temp_plan']); unset($_SESSION['temp_persons']); unset($_SESSION['temp_date']); unset($_SESSION['total_amount']);
                    
                    echo "<div id='successMsg' style='margin-top:20px; padding:15px; background:#e8f8f5; color:#27ae60; border-radius:10px; font-weight:600; text-align:center; border: 1px solid #a3e4d7;'>
                            💳 Transaction Successful!<br><span style='font-size:0.85rem; font-weight:normal; color:#555;'>Redirecting to your dashboard status tracker...</span>
                          </div>";
                    
                    // Automatically send them to check status page after 3 seconds
                    echo "<script>setTimeout(function(){ window.location.href='check_status.php'; }, 3000);</script>";
                }
            }
            ?>
        </div>
    </div>

    <script>
    document.getElementById('paymentForm').addEventListener('submit', function() {
        var btn = document.getElementById('payBtn');
        btn.disabled = true;
        btn.innerText = "Connecting to Secure Bank Server...";
        btn.style.background = "#95a5a6";
    });
    </script>
</body>
</html>