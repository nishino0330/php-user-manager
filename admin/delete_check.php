<?php
  require_once __DIR__ . "/classes/Auther.class.php";
  require_once __DIR__ . "/classes/Users.class.php";

  $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";

  $auther = new Auther();
  $users = new Users();
  $user = $users->getDetail($user_id);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ユーザー登録</title>
</head>

<body>
    <h1>ユーザー登録</h1>
    
    <form method="POST" action="./comp.php">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">User Name</label>
            <input type="name" class="form-control" readonly id="exampleInputName" name="user_name"
                aria-describedby="emailHelp" value="<?php echo $user['user_name']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" readonly id="exampleInputEmail1" name="mail_address"
                aria-describedby="emailHelp" value="<?php echo $user['mail_address']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPass_word1" class="form-label">Pass_word</label>
            <input type="pass_word" class="form-control" readonly id="exampleInputPass_word1" name="pass_word"
                value="<?php echo str_repeat("*", 6); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a herf=",/detail.php?user_id=><?php echo $user_id; ?>"class="btn btn-primary">Delete</a>
    <form method="POST" action="./input.php">
        <input type="hidden" class="form-control" readonly id="exampleInputName" name="user_name"
            aria-describedby="emailHelp" value="<?php echo $user['user_name']; ?>">
        <input type="hidden" class="form-control" readonly id="exampleInputEmail1" name="mail_address"
            aria-describedby="emailHelp" value="<?php echo $user['mail_address']; ?>">
        <input type="hidden" class="form-control" readonly id="exampleInputPass_word1" name="pass_word"
            value="<?php echo str_repeat("*", 6); ?>">
        <button type="submit" class="btn btn-primary">Back</button>
    </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>