<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NYC LOGIN PAGE</title>
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <script src="assets/lib/jquery.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center mt-5">
                <div class="alert hidden">
                    <strong id="result">Result</strong>
                </div>
            </div>
            <div class="col-md-4 offset-md-4 border p-4">
                <h2 class="mb-5 text-center">LOGIN</h2>
                <form id="login_form">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="uid" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="login_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

<script>
$(document).ready(function() {
    $('.hidden').hide();
    $('#login_form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'function.php',
            type: 'POST',
            data: $(this).serialize() + '&action=login',
            success: function(response) {
                if (response != "Login Successful") {
                    $('.hidden').show();
                    $('#result').html(response);
                    $('.hidden').addClass("alert-danger");
                } else {
                    swal({
                        title: "LOGIN SUCCESSFUL!",
                        text: "Redirecting!",
                        icon: "success",
                        button: false
                    });
                    // setTimeout(() => {
                    // ****** Location to go ******
                    // window.location = 'function.php';
                    // }, 900);
                }
            }
        });
        return true;
    });
});
</script>