<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">


    <script type="text/javascript">

            /* Solução em Javascript para impedir o reenvio de formulário */

            if (window.history.replaceState) {
		        window.history.replaceState( null, null, window.location.href );
		    }

    </script>


</head>
<body>

    <div class="container-fluid">

        <header class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Previsão do Tempo</h3>
                <p>Os dados obtidos nas pesquisas são fornecidos pelo INPE - Instituto Nacional de Pesquisas Espaciais</p>
            </div>
            <div class="col-md-2"></div>
        </header>

        <div class="row" id="campos_pesquisa">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="" method='POST'>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado">Tipo de Previsão:</label><br>
                                <select id="txtPrevisao" name="txtPrevisao" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="prev_04">Previsão Para 4 dias</option>
                                    <option value="prev_07">Previsão Para 7 dias</option>
                                    <option value="prev_estendida">Previsão Estendida</option>
                                </select><br>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado">Estado:</label><br>
                                <select id="txtEstado" name="txtEstado" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select><br>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cidade">Cidade:</label>
                            <input type="text" value='' name='txtCidade' class="form-control" placeholder="Cidade" required>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary mb-3" name='btnPesq' id="btnPesq" value="Pesquisar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>


        <div class="row" id="resultado_pesquisa">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <?php include 'pesquisa_api.php'; ?>

            </div>
            <div class="col-md-2"></div>
        </div>

    </div>

</body>
</html>