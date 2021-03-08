<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/styles/style.css">

    <title>Painel de casos COVID-19</title>
</head>
<body>
    <?php
        $url = "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";
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

        <div class="table-info">
            <table>
                <caption>Dados gerais</caption>
                <tbody>
                    <tr>
                        <th>Infectados</th>
                        <td>
                            <?php echo(number_format($data->infected, 0, ",", ".")); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Recuperados</th>
                        <td>
                            <?php echo(number_format($data->recovered, 0, ",", ".")); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Mortos</th>
                        <td> 
                            <?php echo(number_format($data->deceased, 0, ",", ".")); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <spam>Ultima atualização: <?php echo(date("d-m-Y H:i", strtotime($data->lastUpdatedAtApify))) . '<br>'; ?></spam>
        </div>
    </main>
    

    <footer>
        <span class='api-update'> Ultima atualização da API:
            <?php echo(date("d-m-Y H:i", strtotime($data->lastUpdatedAtApify))) . '<br>'; ?>
        </span>
        <span class='source'> Fonte: 
            <?php
                echo '<a href="' . ($data->sourceUrl) .  '">';
                echo($data->sourceUrl);
                echo '</a>';
            ?>
        </span>

        
    </footer>
</body>
</html>