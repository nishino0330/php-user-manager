<?php
  require_once __DIR__ . "/classes/Auther.class.php";
  require_once __DIR__ . "/classes/Users.class.php";

  $auther = new Auther();
  $users = new Users();
  $userList = $users->getList();
  $auther->login_chk();
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

    <title>ユーザーリスト | 管理画面</title>
</head>

<body>
    <h1>ユーザーリスト</h1>
    <table class="table table-striped">
        <thead>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>作成日時</th>
            <th>更新日時</th>
        </thead>
        <tbody>
            <?php foreach ($userList as $user) { ?>
            <tr>
                <td>
                    <?php echo $user[ 'user_id' ]; ?>
                </td>
                <td>
                    <a href="detail.php?user_id=<?php echo $user[ 'user_id' ]; ?>">
                        <?php echo $user[ 'user_name' ]; ?>
                    </a>
                </td>
                <td>
                    <?php echo date( "Y/m/d H時i分", $user['create_dt'] ); ?>
                </td>
                <td>
                    <?php echo date( "Y/m/d H時i分", $user[ 'update_dt' ]); ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</html>