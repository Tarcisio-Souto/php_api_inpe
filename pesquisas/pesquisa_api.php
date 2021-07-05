<?php

if (isset($_POST['btnPesq'])) {

    $tipo_previsao = $_POST['txtPrevisao'];
    $uf = $_POST['txtEstado'];
    $cidade = str_replace(" ", "%20", $_POST['txtCidade']);
    $servico = true;    
    $req_code = '';

    $array_previsao = [];

    function sanitizeString($str)
    {

        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        
        return $str;

    }

    function pesquisa_cidade()
    {

        $cidade = strtolower(sanitizeString($GLOBALS['cidade']));

        $url = "http://servicos.cptec.inpe.br/XML/listaCidades?city=" . $cidade;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = simplexml_load_string(curl_exec($ch));

        $GLOBALS['req_code'] = curl_getinfo($ch);

        curl_close($ch);

        if ($GLOBALS['req_code']['http_code'] >= 500) {
            $GLOBALS['servico'] = false;
            echo 'Ops! Serviço indisponível no momento =/';

        } else {

            $cidade_result = str_replace(" ", "%20", strtolower(sanitizeString($result->cidade->nome)));

            if ($GLOBALS['uf'] == $result->cidade->uf && $cidade == $cidade_result) {
                $id_cidade = $result->cidade->id;
                return $id_cidade;
            } else {
                echo 'Cidade não encontrada =/';
                exit();
            }
        }
    }

   
    function previsao($id_cidade)
    {

        $array = [

            "ec" => "Encoberto com Chuvas Isoladas", "ci" => "Chuvas Isoladas", "c" => "Chuva", "c " => "Chuva", "in" => "Instável",
            "pp" => "Poss. de Pancadas de Chuva", "cm" => "Chuva pela Manhã", "cn" => "Chuva a Noite", "pt" => "Pancadas de Chuva a Tarde",
            "pm" => "Pancadas de Chuva pela Manhã", "np" => "Nublado e Pancadas de Chuva", "pc" => "Pancadas de Chuva", "pn" => "Parcialmente Nublado",
            "cv" => "Chuvisco", "ch" => "Chuvoso", "t" => "Tempestade", "ps" => "Predomínio de Sol",
            "e" => "Encoberto", "n" => "Nublado", "n " => "Nublado", "cl" => "Céu Claro", "nv" => "Nevoeiro",
            "g" => "Geada", "ne" => "Neve", "nd" => "Não Definido", "pnt" => "Pancadas de Chuva a Noite",
            "psc" => "Possibilidade de Chuva", "pcm" => "Possibilidade de Chuva pela Manhã", "pct" => "Possibilidade de Chuva a Tarde", "pcn" => "Possibilidade de Chuva a Noite",
            "npt" => "Nublado com Pancadas a Tarde", "npn" => "Nublado com Pancadas a Noite", "ncn" => "Nublado com Poss. de Chuva a Noite", "nct" => "Nublado com Poss. de Chuva a Tarde",
            "ncm" => "Nubl. c/ Poss. de Chuva pela Manhã", "npm" => "Nublado com Pancadas pela Manhã", "npp" => "Nublado com Possibilidade de Chuva", "vn" => "Variação de Nebulosidade",
            "ct" => "Chuva a Tarde", "ppn" => "Poss. de Panc. de Chuva a Noite", "ppt" => "Poss. de Panc. de Chuva a Tarde", "ppm" => "Poss. de Panc. de Chuva pela Manhã",

        ];

        if ($GLOBALS['tipo_previsao'] == "prev_04") {

            $url_previsao = "http://servicos.cptec.inpe.br/XML/cidade/" . $id_cidade . "/previsao.xml";
            $req = simplexml_load_string(file_get_contents($url_previsao));            

            if ($GLOBALS['servico'] == true) {

                for ($i = 0; $i < 4; $i++) {

                    $data = explode('-', $req->previsao[$i]->dia);
                    $dia = $data[2];
                    $mes = $data[1];
                    $ano = $data[0];
                    $data_unif = $dia.'/'.$mes.'/'.$ano;

                    
                    $array_previsao[$i] = [ "estado" => $req->uf, "cidade" => $req->nome,
                        "data" => $data_unif, "condicao" => $array['' . $req->previsao[$i]->tempo],
                        "maxima" => $req->previsao[$i]->maxima, "minima" => $req->previsao[$i]->minima,
                        "iuv" => $req->previsao[$i]->iuv
                    ]; 
                }

                return $array_previsao;                

            } else {
                echo 'Ops! Serviço indisponível no momento =/';
            }

        } else if ($GLOBALS['tipo_previsao'] == "prev_07") {

            $url_previsao = "http://servicos.cptec.inpe.br/XML/cidade/7dias/" . $id_cidade . "/previsao.xml";
            $req = simplexml_load_string(file_get_contents($url_previsao));

            if ($GLOBALS['servico'] == true) {

                for ($i = 0; $i < 5; $i++) {
                    $data = explode('-', $req->previsao[$i]->dia);

                    $dia = $data[2];
                    $mes = $data[1];
                    $ano = $data[0];
                    $data_unif = $dia.'/'.$mes.'/'.$ano;

                    
                    $array_previsao[$i] = [ "estado" => $req->uf, "cidade" => $req->nome,
                        "data" => $data_unif, "condicao" => $array['' . $req->previsao[$i]->tempo],
                        "maxima" => $req->previsao[$i]->maxima, "minima" => $req->previsao[$i]->minima,
                        "iuv" => $req->previsao[$i]->iuv
                    ]; 
                }

                return $array_previsao;                

            } else {
                echo 'Ops! Serviço indisponível no momento =/';
            }

        } else if ($GLOBALS['tipo_previsao'] == "prev_estendida") {

            $url_previsao = "http://servicos.cptec.inpe.br/XML/cidade/" . $id_cidade . "/estendida.xml";
            $req = simplexml_load_string(file_get_contents($url_previsao));

            if ($GLOBALS['servico'] == true) {

                for ($i = 0; $i < 7; $i++) {
                    $data = explode('-', $req->previsao[$i]->dia);
                    $dia = $data[2];
                    $mes = $data[1];
                    $ano = $data[0];
                    $data_unif = $dia.'/'.$mes.'/'.$ano;

                    
                    $array_previsao[$i] = [ "estado" => $req->uf, "cidade" => $req->nome,
                        "data" => $data_unif, "condicao" => $array['' . $req->previsao[$i]->tempo],
                        "maxima" => $req->previsao[$i]->maxima, "minima" => $req->previsao[$i]->minima,
                        "iuv" => $req->previsao[$i]->iuv
                    ];
                }

                return $array_previsao;                

            } else {
                echo 'Ops! Serviço indisponível no momento =/';
            }
        }
    }

    function resultado_previsao() {
        
        if ($GLOBALS['req_code'] >= 500) {
            echo 'Ops! Serviço indisponível no momento =/';            
        } else {
            $id = pesquisa_cidade();
            $dados_previsao = previsao($id);     

            return $dados_previsao;

        }
    }     
}