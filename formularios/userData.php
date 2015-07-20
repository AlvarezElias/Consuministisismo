<?php
    $currentUser = new User();
    $update = new User();
    $sexo="";
    $currentUser = User::DameUsuarioActual($_SESSION['user']->id);


    if(isset($_POST['guardar']))
    {
        $update = $currentUser;
        $update->name = $_POST['name'];
        $update->email = $_POST['email'];

        $update->intro = $_POST['intro'];
        $update->photo = isset($_POST['photo']) ? $_POST['photo'] : 'default.jpg';
        $update->gender = isset($_POST['gender']) ? $_POST['gender'] : "I DONT KNOW!";
       // $currentUser->datebirth = $_POST['datebirth'];

        $update = $currentUser->modificarUsuario($update);
        
        $currentUser = $update;
        $_SESSION['user'] = $currentUser;
    }
?>

<form method="post" action="UserConfig.php" class="form">
    <label>UserCode: <?php echo $currentUser->id ?></label>

    <div class="form-group">
        <label for="intro">Intro</label>
        <input id="intro" class="form-control text-center"  name='intro' type="text" value = "<?php echo isset($currentUser->intro) ? $currentUser->intro : 'introduci tu introduccion'; ?>" placeholder="introducite" required>
    </div>

    <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input id="email" class="form-control text-center"  name='email' type="email" value = "<?php echo $currentUser->email ?>" placeholder="Correo Electronico" required>
    </div>

    <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input id='username' class ='form-control text-center' name='name' type="text" value = "<?php echo $currentUser->name ?>" required/>
    </div>

    <img src= 'images\<?php echo isset($_SESSION["user"]->photo) ? $_SESSION["user"]->photo : "default.jpg"; ?>' alt="Responsive image" class="imgPerfil img-responsive img-circle"></li>
    <div class="row file form-group">
        <label for="photo">File input</label>
        <input id="photo" name="photo" class='btn btn-default' type="file" accept="image/*" >
        <p class="help-block">Selecciona una foto .JPG o .PNG.</p>
    </div>

    <div  class="form-group btn-group text-center" data-toggle="buttons">
        <label class="btn btn-gender btn-default active">
            <input type="radio" id="female" name="gender" value="female"> Girls
        </label>
        
        <label class="btn btn-gender btn-default">
            <input type="radio" id="male" name="gender" value="male"> Guys
        </label>

        <label class="btn btn-gender btn-default">
            <input type="radio" id="indefinido" name="gender" value="I DONT KNOW!"> I DONT KNOW!
        </label>
    </div>

    <button class='submit btn btn-default ' name='guardar' type="submit" >Guardar</button>
</form>
<br>
<a class=' btn btn-default ' href="home.php" type="button" >Volver</a>
</div>
