<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Mercadolibre</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">API Mercado Libre</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="usuarios.html">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Publicar productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="listado.php">Ver productos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container p-5">
    <img src="img/ML1.png" alt="" width="90%" height="150px">
</div>
    
<div class="container">

    <form action="" method="POST">
        <h2>Ver productos del vendedor</h2>
        <label for="id">Seller: TETE8004352 </label>
        
        <input type="submit" value="Ver Información" name="add">
    </form>

</div>

<div class="data">
<?php

if(isset($_POST["add"])){

    $url = 'https://api.mercadolibre.com/users/799998844/items/search';

    $token = 'APP_USR-4347256480026456-120121-bada059fbbd944b6f34bf7b3f662824f-799998844';  

    // Iniciar curl en servidor
    $ch = curl_init($url);
    
    // Enviar token al servidor
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ));  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Respuesta del servicio web
    $response = curl_exec($ch);
    
    //Cerrar sesion
    curl_close($ch);


    //$data = file_get_contents($response);

    $items = json_decode($response, true);
    $productos = json_encode($items);

    for($i=0; $i<count($items['results']) ; $i++){
        echo "<li>Codigo del Producto: ".$items['results'][$i]."</li>";

        $url = 'https://api.mercadolibre.com/items/'.$items['results'][$i];

    $token = 'APP_USR-4347256480026456-120121-bada059fbbd944b6f34bf7b3f662824f-799998844';  

    // Iniciar curl en servidor
    $ch = curl_init($url);
    
    // Enviar token al servidor
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ));  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Respuesta del servicio web
    $response = curl_exec($ch);

    $data = json_decode($response, true);
    $info = json_encode($data);
    
    //var_dump($data);
    echo '<h2>Nombre del Producto: '.$data['title'].'</h2>';
    echo '<p>Price: $ '.$data['price'].'</p>';
    echo '<img src='.$data['thumbnail'].'</img>';
    echo '<p>Status: '.$data['status'].'</p>';
    
    
    //Cerrar sesion
    curl_close($ch);
    }   
 
    
}   

?>
</div>


</body>
</html>