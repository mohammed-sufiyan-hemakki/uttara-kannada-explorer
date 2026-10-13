<?php 
session_start();
include('db.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Admin Login - UK Explorer</title>
</head>
<body class="admin-login-body">

    <div class="login-container">
        <div class="card" style="padding: 45px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: none;">
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="color: var(--primary); margin: 0; font-size: 1.8rem; font-weight:700;">Admin Dashboard</h2>
                <p style="color: #7f8c8d; font-size: 0.88rem; margin-top:5px;">Secure Access Portal for Sahil Shaikh</p>
            </div>

            <form method="POST">
                <label>Username</label>
                <input type="text" name="user" placeholder="Enter admin username" required>
                
                <label>Password</label>
                <input type="password" name="pass" placeholder="Enter secure password" required>
                
                <button type="submit" name="login_btn" class="btn" style="width: 100%; margin-top: 15px; border-radius:10px;">
                    Secure Log In
                </button>
            </form>

            <?php
            if(isset($_POST['login_btn'])){
                $u = mysqli_real_escape_string($conn, $_POST['user']);
                $p = mysqli_real_escape_string($conn, $_POST['pass']);
                
                $res = mysqli_query($conn, "SELECT * FROM admin_users WHERE username='$u' AND password='$p'");
                if(mysqli_num_rows($res) > 0){
                    $_SESSION['admin_logged_in'] = true;
                    header("Location: admin.php");
                    exit;
                } else {
                    echo "<div style='margin-top:20px; color:var(--danger); text-align:center; font-size:0.9rem; font-weight:600; background:#fdf2f2; padding:10px; border-radius:8px; border:1px solid #fde2e2;'>
                            ❌ Invalid Authentication Credentials!
                          </div>";
                }
            }
            ?>
            
            <div style="text-align: center; margin-top: 30px; border-top: 1px solid #f0f4f5; padding-top:15px;">
                <a href="index.php" style="text-decoration: none; font-size: 0.85rem; color: #95a5a6; font-weight:500; transition:0.2s;">&larr; Return to Visitor Site</a>
            </div>
        </div>
    </div>

</body>
</html>