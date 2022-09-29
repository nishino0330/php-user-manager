<?php
  require_once __DIR__ . "/classes/Auther.class.php";
  $auther = new Auther();

  $mail_address = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
  $pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

  //ユーザー登録のバリデーションを入れる
  $errors = [
    'mail_address' => [] ,
    'pass_word' => [] ,
  ];
  //メールアドレスのバリデーション
if( $mail_address === "" ) {
    $errors['mail_address'][] ="emailaddressが未入力です。";
}
if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $mail_address)) {
    $errors['mail_address'][] ="emailaddressのフォーマットが不正です。";
}
  //パスワードのバリデーション
if( $pass_word === "" ) {
    $errors['pass_word'][] ="pass_wordが未入力です。";
}


  if( empty($errors['mail_address']) && empty($errors['pass_word']) ) {
    //ログインチェック
    if($auther->login($mail_address, $pass_word)) {
        $_SESSION[Auther::LOGIN_CHK_KEY] = true;
    }
  }
  $auther->login_chk(true);
  
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

    <title>ログイン | 管理画面</title>
</head>

<body>
    <h1>ログイン画面</h1>
    <?php if( !empty($errors['mail_address']) ||
              !empty($errors['pass_word']) ) { ?>
              <div class="alert alert-danger" role="alert">
                <?php foreach($errors['mail_address'] as $error) { ?>
                    <?php echo $error; ?><br>
                <?php } ?>
                <?php foreach($errors['pass_word'] as $error) { ?>
                    <?php echo $error; ?><br>
                <?php } ?>
              </div>
              <?php } ?>
    <form class="container" method="post">
    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control <?php if( !empty($errors['mail_address']) )
                echo 'border-danger text-danger' ; ?>" id="exampleInputEmail1" name="mail_address"
                aria-describedby="emailHelp" value="<?php echo $mail_address; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPass_word1" class="form-label">Pass_word</label>
            <input type="pass_word" class="form-control <?php if( !empty($errors['pass_word']) )
                echo 'border-danger text-danger' ; ?>" id="exampleInputPass_word1" name="pass_word"
                value="<?php echo $pass_word; ?>">
        </div>
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
</body>

</html>