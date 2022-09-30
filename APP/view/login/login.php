<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>login</title>
    <style>
       body{
    margin-top:20px;
    color:#fff;
}

.login-page {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: auto;
    background: #3ca2e0;
    text-align: center;
    color: #fff;
    padding: 3em;
}

.user-avatar {
    width: 125px;
    height: 125px;
}

.login-page h1 {
    font-weight: 300;
}

.login-page .form-content {
    padding: 40px 0;
}

.login-page .form-content .input-underline {
    background: 0 0;
    border: none;
    box-shadow: none;
    border-bottom: 2px solid rgba(255,255,255,.4);
    color: #FFF;
    border-radius: 0;
}
.login-page .form-content .input-underline:focus {
    border-bottom: 2px solid #fff;
}    

.input-lg {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 0;
}

.btn-info{
    border-radius: 50px;
    box-shadow: 0 0 0 2px rgba(255,255,255,.8)inset;
    color: rgba(255,255,255,.8);
    background: 0 0;
    border-color: transparent;
    font-weight: 400;
}

input[type='text']::-webkit-input-placeholder, input[type='password']::-webkit-input-placeholder { 
    color:    #fff;
}

input[type='email']::-webkit-input-placeholder, input[type='password']::-webkit-input-placeholder { 
    color:    #fff;
}

input[type='text']:-moz-placeholder, input[type='password']:-moz-placeholder { 
    color:    #fff;
}
input[type='text']::-moz-placeholder, input[type='password']::-moz-placeholder { 
    color:    #fff;
}
input[type='text']:-ms-input-placeholder, input[type='password']:-ms-input-placeholder { 
    color:    #fff;
}
    </style>
</head>
<body>

<div class="container bootstrap snippets bootdey">
    <div class="row login-page"> 
        <center><div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4"> 
    		<img src="https://www.w3schools.com/w3images/avatar2.png" class="user-avatar img-thumbnail"> 
            <h1>Logar</h1> 
            <?php 
                if(isset($_SESSION['mensagem'])){
                     echo $_SESSION['mensagem'];
                     unset($_SESSION['mensagem']);
                }
            ?>
    		<form role="form" action="/login/valida" method="POST" class="ng-pristine ng-valid"> 
    			<div class="form-content"> 
    				<div class="form-group">
    					<input type="email" name="email" class="form-control input-underline input-lg" placeholder="Email"> 
    				</div> 
                    <br>
    				<div class="form-group"> 
    					<input type="password" name="senha" class="form-control input-underline input-lg" placeholder="Senha"> 
    				</div> 
    			</div> 
    			<button type="submit" name="Logar"  class="btn btn-info btn-lg">Logue</button>
    		</form> 
    	</div></center> 
    </div>
</div>

</body>
</html>