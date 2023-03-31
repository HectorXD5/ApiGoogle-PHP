
<?php

//Coordenada da região: -19.921299, -43.947451
//Chave api: AIzaSyDjPGH8AQxioOK2TGs1SqqhRah8PikHx40

// Função para gerar o código HTML da lista de lugares
function gerarListaDeLugares() {
    // Variáveis com as configurações da API do Google Places
    $api_key = "AIzaSyDjPGH8AQxioOK2TGs1SqqhRah8PikHx40";
    $latitude = -19.921299;
    $longitude = -43.947451;
    $raio = 500;
    $tipo = "establishment";

    // URL da API do Google Places
    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json";
    $url .= "?key={$api_key}&location={$latitude},{$longitude}&radius={$raio}&type={$tipo}";

    // Requisição à API do Google Places e obtém os resultados em formato JSON
    $resultado_json = file_get_contents($url);

    // Decodifica o JSON para um array associativo
    $resultado = json_decode($resultado_json, true);


    // Verificador de que a requisição foi bem sucedida
    if ($resultado["status"] == "OK") {
    
        // Itera sobre os resultados e adiciona cada lugar à lista HTML
        foreach ($resultado["results"] as $lugar) {
            $nome = $lugar["name"];
            $endereco = $lugar["vicinity"];
            $html .= "<li>{$nome} - {$endereco}</li>";

        }

    } else {
        // Caso a requisição não seja bem sucedida, exibe uma mensagem de erro
        $html = "<p>Não foi possível obter a lista de lugares próximos.</p>";
    }

    // Retorna o código HTML da lista de lugares
    return $html;

}




// Inclui o arquivo HTML que contém o código para exibir a lista de lugares

include('C:\Users\Silvia\Documents\GitHub');

?>
