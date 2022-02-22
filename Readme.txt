Primero creo la app en Mercadolibre Developers

Obtengo los siguientes datos

App ID = 3669431654860477
Key Secret = NsLhFsdYeMKooc8Q6CICyjdnWyVobxIM
Redirect URI = http://localhost:8888/PreSeleccion/

Con el ID y Redirect uri por post Obtengo el codigo de autorizacion

Code = TG-610590cdf45f080007205ef3-756335061

Con este codigo completaria los requisitos para solicitar el token de la siguiente manera por post mediante curl por consola

curl -X POST \
    -H 'accept: application/json' \
    -H 'content-type: application/x-www-form-urlencoded' \
    'https://api.mercadolibre.com/oauth/token' \
    -d 'grant_type=authorization_code' \
    -d 'client_id=3669431654860477' \
    -d 'client_secret=NsLhFsdYeMKooc8Q6CICyjdnWyVobxIM' \
    -d 'code=TG-610590cdf45f080007205ef3-756335061' \
    -d 'redirect_uri=http://localhost:8888/PreSeleccion/'

obtengo el siguiente json con el access token

{"access_token":"APP_USR-3669431654860477-073118-f24237c2c1583172bd8fb8c7a18e1d70-756335061","token_type":"bearer","expires_in":21600,"scope":"offline_access read write","user_id":756335061,"refresh_token":"TG-610592d17715540007c4126c-756335061"}

Con el access token puedo crear los usuarios test por consola de la siguiente manera usando post y curl, donde selecciono la plataforma donde deseo operar y la envio en un json

curl -X POST \
-H 'Authorization: Bearer APP_USR-3669431654860477-073118-f24237c2c1583172bd8fb8c7a18e1d70-756335061' \
-H 'Content-type: application/json' \
-d '{
   	"site_id":"MLU"
}' \
'https://api.mercadolibre.com/users/test_user' 

obteniendo los siguientes usuarios test

Usuario 1
> 'https://api.mercadolibre.com/users/test_user'
{
    "id":799998844,
    "nickname":"TETE8004352",
    "password":"qatest6639",
    "site_status":"active",
    "email":"test_user_53429132@testuser.com"
}


curl -X GET -H 'Authorization: Bearer APP_USR-4347256480026456-080817-c7466fc84aa1e088498e5f91ed26c08b-799998844'  https://api.mercadolibre.com/orders/search?seller=799998844

Usuario 2
> 'https://api.mercadolibre.com/users/test_user'
{
    "id":799998896,
    "nickname":"TETE2374436",
    "password":"qatest9146",
    "site_status":"active",
    "email":"test_user_95761260@testuser.com"
}

curl -X POST \
-H 'accept: application/json' \
-H 'content-type: application/x-www-form-urlencoded' \
'https://api.mercadolibre.com/oauth/token' \
-d 'grant_type=refresh_token' \
-d 'client_id=3669431654860477' \
-d 'client_secret=NsLhFsdYeMKooc8Q6CICyjdnWyVobxIM' \
-d 'refresh_token=TG-610592d17715540007c4126c-756335061'


// nuevo user

curl -X POST \
    -H 'accept: application/json' \
    -H 'content-type: application/x-www-form-urlencoded' \
    'https://api.mercadolibre.com/oauth/token' \
    -d 'grant_type=authorization_code' \
    -d 'client_id=4347256480026456' \
    -d 'client_secret=d3LmqrfYaW11FOlJ8q43pCzrzwdLcGeb' \
    -d 'code=TG-610fea86007be400070cfd66-799998844' \
    -d 'redirect_uri=http://localhost:8888/PreSeleccion/listado.php'

// New Refresh token

curl -X POST \
-H 'accept: application/json' \
-H 'content-type: application/x-www-form-urlencoded' \
'https://api.mercadolibre.com/oauth/token' \
-d 'grant_type=refresh_token' \
-d 'client_id=4347256480026456' \
-d 'client_secret=d3LmqrfYaW11FOlJ8q43pCzrzwdLcGeb' \
-d 'refresh_token=TG-610feaa446b17b000a493acb-799998844'

curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/sites/$SITE_ID/search?q=itemdetest

curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/products/MLU481046469