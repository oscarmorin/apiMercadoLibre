<?php

    if(isset($_POST["add"])){

        $title = $_POST['title'];
        $price = $_POST['price'];
        $quanty = $_POST['initial_quantity'];
    
        $data = array (

            "title" => $title,
            "category_id" => "MLU3530",
            "price" => $price,
            "currency_id" => "UYU",
            "available_quantity" => $quanty,
            "buying_mode" => "buy_it_now",
            "condition" => "new",
            "listing_type_id" => "gold_special",
           
            "pictures" => [

               [
                  "source" => "https://www.elcarrocolombiano.com/wp-content/uploads/2019/01/20190122-MPM-ERELIS-AUTO-DEPORTIVO-MAS-BARATO-01.jpg"
               ]
               
            ]
        );
    
        $payload = json_encode($data);

        $url = "https://api.mercadolibre.com/items";

        $token = "APP_USR-4347256480026456-120121-bada059fbbd944b6f34bf7b3f662824f-799998844";

        // Iniciar curl en servidor
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        
        // Enviar token al servidor

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $token
            ));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
        // Respuesta del servicio web
        $response = curl_exec($ch);
    
        
    }

    curl_close($ch);
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Mercadolibre</title>
    <link rel="stylesheet" href="css/style.css">
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
          <a class="nav-link active" aria-current="page" href="index.php">Publicar productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="listado.php">Ver productos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container p-5">
    <img src="img/ML1.png" alt="" width="90%" height="150px">
</div>
    
<div class="container">

    <form action="" method="post">
        <h2>Add Product</h2>
        <label for="id">Seller: TETE8004352 </label>
        <label for="name">Title Product </label>
        <input type="text" name="title" required>
        <label for="price">Price (UYU)</label>
        <input type="text" name="price" required>
        <label for="initial_quantity">Initial Quantity</label>
        <input type="number" name="initial_quantity" required>
        <input type="submit" value="enviar" name="add" class="btn btn-danger mt-3">
    </form>

</div>


</body>
</html>