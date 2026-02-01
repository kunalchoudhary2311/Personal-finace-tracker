<?php
include 'header.php'; 

$user = $db->get('users', '*', [
    'id' => $id
]);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name   = trim($_POST['name']);
    $email  = trim($_POST['email']);


    if ($name && $email) {

        $db->update('users', [
            'name'   => $name,
            'Email_id' => $email,
    
        ], [
            'id' => $id
        ]);

        // Update session data
        $_SESSION['user_login']['name']  = $name;
        $_SESSION['user_login']['email'] = $email;

        $success = "Profile updated successfully";
    } else {
        $error = "Name and Email are required";
    }

    // Refresh user data
    $user = $db->get('users', '*', ['id' => $id]);
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            My Profile
                        </div>

                        <div class="card-body">

                            <?php if (!empty($success)) { ?>
                                <div class="alert alert-success"><?php echo $success; ?></div>
                            <?php } ?>

                            <?php if (!empty($error)) { ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php } ?>

                            <form method="POST">

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="<?php echo htmlspecialchars($user['Name']); ?>"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="<?php echo htmlspecialchars($user['Email_id']); ?>"
                                           required>
                                </div>


                                <button type="submit" class="btn btn-success">
                                    Update Profile
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
