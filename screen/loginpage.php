<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginpage.css">
    <title>LoginPage</title>
</head>
<body>
   <div class="background">
        <div class="contain_block">
            <div class="content">
                <div class="row_1">
                    <p>LOGIN HERE </p>
                </div>
                <div class="row_2">
                    <form>
                        <div class="form_group">
                            <input type="text" class="username" placeholder="Username"></input>
                        </div>
                        <div class="form_group">
                            <input type="password" class="password" placeholder="Password"></input>
                        </div>
                        <div class="form_group">
                            <button type="submit" class="button_login">Sign In</button>
                        </div>
                        <div class="form_group_last">
                            <div class="remember_me">
                                <input type="checkbox" class="checkbox" style=" zoom:1.5;margin-left:10px;margin-top:8px;" >
                                <label style="color:#fbceb5;font-size :22px;cursor:pointer;margin-top:8px;">Remember Me</label>
                            </div>
                            <div class="forgot_password">
                                <a style="position:absolute;margin-left:20%;font-size:22px;" href="#" >Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row_3">
                    <p style="position:absolute;margin-left:35%;">- Or Sign In With -</p>
                </div>
                <div class="row_4">
                    <div class="facebook">
                        <button class="button_facebook" >Facebook</button>
                    </div>
                    <div class="twitter">
                        <button class="button_twitter" >Twitter</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
</body>
</html>