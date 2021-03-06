<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de casos COVID-19</title>
</head>
<body>
    <?php
            $url =  "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";

            $data = json_decode(file_get_contents($url));
    ?>
    <header>
        <h1>
            Painel de casos COVID-19
        </h1>
    </header>
    <main>
        <div class='graphic'>
            <img src="/infectedByRegion.php">
        </div>

        <div class="table">
            <table border='1'>
        
                <tr>
                    <th>Infectados</th>
                    <td>
                        <?php
                            echo($data->infected)
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Recuperados</th>
                    <td>
                        <?php
                            echo($data->recovered)
                        ?>
                    </td>
                
                </tr>
                <tr>
                    <th>Mortos</th>
                    <td> 
                        <?php
                            echo($data->deceased)
                        ?>
                    </td>
                    
                </tr>
            </table>
        </div>
        
    
    </main>
    

    <footer>
        <span> Ultima atualização em:
            <?php echo($data->lastUpdatedAtApify); ?>
        </span>

        <span> Fonte: 
            <?php echo($data->sourceUrl); ?>
        </span>

        
    </footer>
</body>
</html>