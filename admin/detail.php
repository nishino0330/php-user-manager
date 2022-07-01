<?php
  require_once __DIR__ . "/classes/Auther.class.php";
  require_once __DIR__ . "/classes/Users.class.php";

  $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

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

    <title>ユーザー詳細情報 | 管理画面</title>
</head>

<body>
    <table class="table table-striped">
        <thead>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>メールアドレス</th>
            <th>パスワード</th>
            <th>作成日時</th>
            <th>更新日時</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
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
                    <?php echo $user[ 'mail_address' ]; ?>
                </td>
                <td>
                    <?php echo $user[ 'pass_word' ]; ?>
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
    <form method="POST" action="update.php">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
        <button type="submit" class="btn btn-info">編集画面へ</button>
    </form>
    <form method="POST" action="delete_check.php">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
</body>

</html>