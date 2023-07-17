<?php
require_once '../conf/config.php';

$data = get_all_slx_user();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Detail - Swiss Learning Exchange</title>
    <link rel="icon" href="../assets/images/slx-logo-16x16-1.png" sizes="32x32">
    <link rel="icon" href="../assets/images/slx-logo-16x16-1.png" sizes="192x192">
    <link rel="apple-touch-icon" href="../assets/images/slx-logo-16x16-1.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body class="gradient-custom">
    <div class="container text-center ">
        <div class="align-items-center mt-sm-4 mb-4 pb-4 pb-md-0 mb-md-4">
            <a href="/"><img width="289" height="80" src="../assets/images/logo.png"></a>
        </div>
        <div class="align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data)) :
                        foreach ($data as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['f_name']; ?></td>
                                <td><?php echo $value['l_name']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['gender']; ?></td>
                                <td><a href="/pages/edit.php?list=<?php echo $value['id']; ?>">Edit</a></td>
                            </tr>
                            <?php
                        }
                    else: ?>
                        <tr>
                            <td class="text-center" colspan="6">NULL</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>