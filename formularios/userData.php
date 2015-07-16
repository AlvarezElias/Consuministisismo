<?php
    $currentUser = new User();
    $update = new User();
    $sexo="";
    $currentUser = User::DameUsuarioActual($_SESSION['user']->id);


    if(isset($_POST['guardar']))
    {
        $sexo = isset($currentUser->sexo) ? $currentUser->sexo : "indefinido";
        $currentUser->intro = $_POST['intro'];
        $currentUser->photo = $_POST['photo'];
        $currentUser->sexo = $sexo;
       // $currentUser->datebirth = $_POST['datebirth'];

        $update = $currentUser->modificarUsuario($currentUser);

        if($update != $currentUser)
        {
            $currentUser = $update;
            $_SESSION['user'] = $currentUser;
        }

    }

    var_dump($update);
?>

<form method="post" action="UserConfig.php" class="form">
    <label>UserCode: <?php echo $currentUser->id ?></label>

    <div class="form-group">
        <label for="intro">Intro</label>
        <input id="intro" class="form-control text-center"  name='intro' type="text" value = "<?php echo isset($currentUser->intro) ? $currentUser->intro : 'introduci tu introduccion'; ?>" placeholder="Correo Electronico" required>
    </div>

    <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input id="email" class="form-control text-center"  name='email' type="email" value = "<?php echo $currentUser->email ?>" placeholder="Correo Electronico" required>
    </div>

    <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input id='username' class ='form-control text-center' name='name' type="text" value = "<?php echo $currentUser->name ?>" required/>
    </div>

    <div class="row file form-group">
        <label for="photo">File input</label>
        <input id="photo" name="photo" class='btn btn-default' type="file" >
        <p class="help-block">Selecciona una foto .JPG o .PNG.</p>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sexo" id="masculino" value="masculino" <?php if($sexo == 'masculino') echo 'checked'; ?> >
            masculino
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="sexo" id="femenino" value="femenino" <?php if($sexo == 'femenino') echo 'checked'; ?> >
            Femenino
        </label>
    </div>

    <button class='submit btn btn-default ' name='guardar' type="submit" >Guardar</button>
</form>
<br>
<a class=' btn btn-default ' href="home.php" type="button" >Volver</a>
</div>
