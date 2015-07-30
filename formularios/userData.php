<?php
    $currentUser = new User();
    $update = new User();
    $sexo="";
    $photoPath = 'images\\' . $_SESSION['user']->name . '\\';
    $currentUser = User::DameUsuarioActual($_SESSION['user']->id);

    if(isset($_POST['guardar']))
    {
        $update = $currentUser;
        $update->name = $_POST['name'];
        $update->email = $_POST['email'];

        $update->intro = $_POST['intro'];

        if(!empty($_FILES['photo']['name']))
        {
            $update->photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : 'default.jpg';
            
            $filePath = $photoPath . $update->photo;
            
            if(is_dir($photoPath))
            {
                if(!file_exists ($filePath))
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], $filePath);
                    chmod($filePath,0644);
                }
            }
            else
            {
                mkdir($photoPath,0777);
                move_uploaded_file($_FILES['photo']['tmp_name'], $filePath);
                chmod($filePath,0644);
            }

        }

        $update->gender = isset($_POST['gender']) ? $_POST['gender'] : "I DONT KNOW!";
       // $currentUser->datebirth = $_POST['datebirth'];

        $update = $currentUser->modificarUsuario($update);
        
        $currentUser = $update;

        $_SESSION['user'] = $currentUser;
    }
?>

<form method="post" action="UserConfig.php" class="form-horizontal " enctype="multipart/form-data">
    <label>UserCode: <?php echo $currentUser->id ?></label>

    <div class="form-group row">
        <label for="intro" class="col-sm-2 control-label">Intro</label>
        <div class="col-sm-10">
            <input id="intro" class="form-control text-center"  name='intro' type="text" value = <?php echo isset($currentUser->intro) ? "'". $currentUser->intro . "'" : '"introduci tu introduccion"'; ?> required>
        </div>
    </div>

    <div class="form-group row" >
        <label for="email row" class="col-sm-2 control-label">Correo Electronico</label>
        <div class="col-sm-8">
            <input id="email" class="form-control text-center"  name='email' type="email" value = "<?php echo $currentUser->email ?>" placeholder="Correo Electronico" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="username" class="col-sm-2 control-label">Nombre de usuario</label>
        <div class="col-sm-8">
            <input id='username' class ='form-control text-center' name='name' type="text" value = "<?php echo $currentUser->name ?>" required/>
        </div>
    </div>

    <img src= '<?php echo $photoPath . $currentUser->photo; ?>' alt="Responsive image" class="imgPerfil img-responsive img-circle row" >
    <div class="row file form-group row">
        <label for="photo" class="col-sm-4 control-label">Subi tu Foto!</label>
        <div class="col-sm-8">
            <input id="photo" name="photo" class='btn btn-default' type="file" accept="image/*" >
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /> 
            <p class="help-block">Selecciona una foto .JPG o .PNG. 10M Max</p>
        </div>
    </div>
    
    <div  id="radios" class="row form-group btn-group" data-toggle="buttons">
        <label for="radios" class='text-center'>Gender</label>
        <label class="radio-input btn btn-gender btn-default active">
            <input type="radio" id="female" name="gender" value="female"> Girls
        </label>
        
        <label class="radio-input btn btn-gender btn-default">
            <input type="radio" id="male" name="gender" value="male"> Guys
        </label>

        <label class="radio-input btn btn-gender btn-default">
            <input type="radio" id="indefinido" name="gender" value="I DONT KNOW!"> I DONT KNOW!
        </label>
    </div>

    <div class="form-group row">
    <button class='submit btn btn-primary row ' name='guardar' type="submit" >Guardar</button>
    </div>
</form>
<br>
<a class=' btn btn-default ' href="home.php" type="button" >Volver</a>
</div>
