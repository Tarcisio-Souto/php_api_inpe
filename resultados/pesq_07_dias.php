<?php

if (function_exists('resultado_previsao')){

    /* IMG - Nuvem com chuva */
    $grupo01 = array("Chuva", "Poss. de Pancadas de Chuva", "Nublado e Pancadas de Chuva", 
    "Pancadas de Chuva", "Chuvoso", "Possibilidade de Chuva");

    /* IMG - Chuva ou possibilidade dela pela manhã/tarde */
    $grupo02 = array("Chuva pela Manhã", "Pancadas de Chuva a Tarde", "Pancadas de Chuva pela Manhã", 
    "Possibilidade de Chuva pela Manhã", "Possibilidade de Chuva a Tarde", "Nublado com Pancadas a Tarde", 
    "Nublado com Poss. de Chuva a Tarde", "Nubl. c/ Poss. de Chuva pela Manhã", "Nublado com Pancadas pela Manhã", 
    "Nublado com Possibilidade de Chuva", "Chuva a Tarde", "Poss. de Panc. de Chuva a Tarde", "Poss. de Panc. de Chuva pela Manhã");

    /* IMG - Chuva ou possibilidade dela pela noite */
    $grupo03 = array("Pancadas de Chuva a Noite", "Possibilidade de Chuva a Noite", "Nublado com Pancadas a Noite", 
    "Nublado com Poss. de Chuva a Noite", "Nublado com Possibilidade de Chuva", "Poss. de Panc. de Chuva a Noite");


    if ($GLOBALS['tipo_previsao'] == "prev_07") {
        $result = resultado_previsao();

        $img_previsao01 = '';
        $img_previsao02 = '';
        $img_previsao03 = '';
        $img_previsao04 = '';
        $img_previsao05 = '';

        /* Imagem 01 */

        if ($result[0]['condicao'] == "Predomínio de Sol") {
            $img_previsao01 = './imagens/sol.PNG';
        }

        if ($result[0]['condicao'] == "Nublado") {
            $img_previsao01 = './imagens/nublado.PNG';
        }

        if ($result[0]['condicao'] == "Tempestade") {
            $img_previsao01 = './imagens/tempestade.PNG';
        }

        if ($result[0]['condicao'] == "Chuvas Isoladas") {
            $img_previsao01 = './imagens/chuva_isolada.PNG';
        }

        if ($result[0]['condicao'] == "Parcialmente Nublado") {
            $img_previsao01 = './imagens/parcialmente_nublado.PNG';
        }

        foreach ($grupo01 as $value) {
            if ($value == $result[0]['condicao']) {
                $img_previsao01 = './imagens/chuvoso.PNG';
            }
        }
        foreach ($grupo02 as $value) {
            if ($value == $result[0]['condicao']) {
                $img_previsao01 = './imagens/chuva_manha_tarde.PNG';
            }
        }
        foreach ($grupo03 as $value) {
            if ($value == $result[0]['condicao']) {
                $img_previsao01 = './imagens/chuva_noite.PNG';
            }
        }
       
        /* Imagem 02 */

        if ($result[1]['condicao'] == "Predomínio de Sol") {
            $img_previsao02 = './imagens/sol.PNG';
        }

        if ($result[1]['condicao'] == "Nublado") {
            $img_previsao02 = './imagens/nublado.PNG';
        }

        if ($result[1]['condicao'] == "Tempestade") {
            $img_previsao02 = './imagens/tempestade.PNG';
        }

        if ($result[1]['condicao'] == "Chuvas Isoladas") {
            $img_previsao02 = './imagens/chuva_isolada.PNG';
        }

        if ($result[1]['condicao'] == "Parcialmente Nublado") {
            $img_previsao02 = './imagens/parcialmente_nublado.PNG';
        }

        foreach ($grupo01 as $value) {
            if ($value == $result[1]['condicao']) {
                $img_previsao02 = './imagens/chuvoso.PNG';
            }
        }
        foreach ($grupo02 as $value) {
            if ($value == $result[1]['condicao']) {
                $img_previsao02 = './imagens/chuva_manha_tarde.PNG';
            }
        }
        foreach ($grupo03 as $value) {
            if ($value == $result[1]['condicao']) {
                $img_previsao02 = './imagens/chuva_noite.PNG';
            }
        }

        /* Imagem 03 */

        if ($result[2]['condicao'] == "Predomínio de Sol") {
            $img_previsao03 = './imagens/sol.PNG';
        }

        if ($result[2]['condicao'] == "Nublado") {
            $img_previsao03 = './imagens/nublado.PNG';
        }

        if ($result[2]['condicao'] == "Tempestade") {
            $img_previsao03 = './imagens/tempestade.PNG';
        }

        if ($result[2]['condicao'] == "Chuvas Isoladas") {
            $img_previsao03 = './imagens/chuva_isolada.PNG';
        }

        if ($result[2]['condicao'] == "Parcialmente Nublado") {
            $img_previsao03 = './imagens/parcialmente_nublado.PNG';
        }

        foreach ($grupo01 as $value) {
            if ($value == $result[2]['condicao']) {
                $img_previsao03 = './imagens/chuvoso.PNG';
            }
        }
        foreach ($grupo02 as $value) {
            if ($value == $result[2]['condicao']) {
                $img_previsao03 = './imagens/chuva_manha_tarde.PNG';
            }
        }
        foreach ($grupo03 as $value) {
            if ($value == $result[2]['condicao']) {
                $img_previsao03 = './imagens/chuva_noite.PNG';
            }
        }

        /* Imagem 04 */

        if ($result[3]['condicao'] == "Predomínio de Sol") {
            $img_previsao04 = './imagens/sol.PNG';
        }

        if ($result[3]['condicao'] == "Nublado") {
            $img_previsao04 = './imagens/nublado.PNG';
        }

        if ($result[3]['condicao'] == "Tempestade") {
            $img_previsao04 = './imagens/tempestade.PNG';
        }

        if ($result[3]['condicao'] == "Chuvas Isoladas") {
            $img_previsao04 = './imagens/chuva_isolada.PNG';
        }

        if ($result[3]['condicao'] == "Parcialmente Nublado") {
            $img_previsao04 = './imagens/parcialmente_nublado.PNG';
        }

        foreach ($grupo01 as $value) {
            if ($value == $result[3]['condicao']) {
                $img_previsao04 = './imagens/chuvoso.PNG';
            }
        }
        foreach ($grupo02 as $value) {
            if ($value == $result[3]['condicao']) {
                $img_previsao04 = './imagens/chuva_manha_tarde.PNG';
            }
        }
        foreach ($grupo03 as $value) {
            if ($value == $result[3]['condicao']) {
                $img_previsao04 = './imagens/chuva_noite.PNG';
            }
        }

        /* Imagem 05 */

        if ($result[4]['condicao'] == "Predomínio de Sol") {
            $img_previsao05 = './imagens/sol.PNG';
        }

        if ($result[4]['condicao'] == "Nublado") {
            $img_previsao05 = './imagens/nublado.PNG';
        }

        if ($result[4]['condicao'] == "Tempestade") {
            $img_previsao05 = './imagens/tempestade.PNG';
        }

        if ($result[4]['condicao'] == "Chuvas Isoladas") {
            $img_previsao05 = './imagens/chuva_isolada.PNG';
        }

        if ($result[4]['condicao'] == "Parcialmente Nublado") {
            $img_previsao05 = './imagens/parcialmente_nublado.PNG';
        }

        foreach ($grupo01 as $value) {
            if ($value == $result[4]['condicao']) {
                $img_previsao05 = './imagens/chuvoso.PNG';
            }
        }
        foreach ($grupo02 as $value) {
            if ($value == $result[4]['condicao']) {
                $img_previsao04 = './imagens/chuva_manha_tarde.PNG';
            }
        }
        foreach ($grupo03 as $value) {
            if ($value == $result[4]['condicao']) {
                $img_previsao04 = './imagens/chuva_noite.PNG';
            }
        }


        echo '<div class="row estado_cidade">'.
        '<div class="col-md-4">'.
        '</div>'.
        '<div class="col-md-4">'.
            '<p><span>Estado:</span> '.$result[0]['estado'].'</p>'.
            '<p><span>Cidade:</span> '.$result[0]['cidade'].'</p>'.
        '</div>'.
        '<div class="col-md-4">'.
        '</div>'.
        '</div>'.
        
        '<div class="row row_result">'.
            '<div class="col-md-3"></div>'.
            '<div class="col-md-6 result_previsoes">'.
                '<br>'.
                '<div class="row">'.
                '<div class="col-md-8">'.
                '<p><span>Previsão para:</span> '.$result[0]['data'].'</p>'.
                '<p><span>Condição:</span> '.$result[0]['condicao'].'</p>'.
                '<p><span>Mínima:</span> '.$result[0]['minima'].'°</p>'.
                '<p><span>Máxima:</span> '.$result[0]['maxima'].'°</p>'.
                '<p><span>IUV:</span> '.$result[0]['iuv'].'</p>'.
                '</div>'.
                '<div class="col-md-4">'.
                '<img src='.$img_previsao01.' class="img-fluid">'.
                '</div>'.
                '</div>'.
            '</div>'.
            '<div class="col-md-3"></div>'.
        '</div>'.
        '<div class="row row_result">'.
            '<div class="col-md-3"></div>'.
            '<div class="col-md-6 result_previsoes">'.
                '<br>'.
                '<div class="row">'.
                '<div class="col-md-8">'.
                '<p><span>Previsão para:</span> '.$result[1]['data'].'</p>'.
                '<p><span>Condição:</span> '.$result[1]['condicao'].'</p>'.
                '<p><span>Mínima:</span> '.$result[1]['minima'].'°</p>'.
                '<p><span>Máxima:</span> '.$result[1]['maxima'].'°</p>'.
                '<p><span>IUV:</span> '.$result[1]['iuv'].'</p>'.
                '</div>'.
                '<div class="col-md-4">'.
                '<img src='.$img_previsao02.' class="img-fluid">'.
                '</div>'.
                '</div>'.
            '</div>'.
            '<div class="col-md-3"></div>'.
        '</div>'.
        '<div class="row row_result">'.
            '<div class="col-md-3"></div>'.
            '<div class="col-md-6 result_previsoes">'.
                '<br>'.
                '<div class="row">'.
                '<div class="col-md-8">'.
                '<p><span>Previsão para:</span> '.$result[2]['data'].'</p>'.
                '<p><span>Condição:</span> '.$result[2]['condicao'].'</p>'.
                '<p><span>Mínima:</span> '.$result[2]['minima'].'°</p>'.
                '<p><span>Máxima:</span> '.$result[2]['maxima'].'°</p>'.
                '<p><span>IUV:</span> '.$result[2]['iuv'].'</p>'.
                '</div>'.
                '<div class="col-md-4">'.
                '<img src='.$img_previsao03.' class="img-fluid">'.
                '</div>'.
                '</div>'.
            '</div>'.
            '<div class="col-md-3"></div>'.
        '</div>'.
        '<div class="row row_result">'.
            '<div class="col-md-3"></div>'.
            '<div class="col-md-6 result_previsoes">'.
                '<br>'.
                '<div class="row">'.
                '<div class="col-md-8">'.
                '<p><span>Previsão para:</span> '.$result[3]['data'].'</p>'.
                '<p><span>Condição:</span> '.$result[3]['condicao'].'</p>'.
                '<p><span>Mínima:</span> '.$result[3]['minima'].'°</p>'.
                '<p><span>Máxima:</span> '.$result[3]['maxima'].'°</p>'.
                '<p><span>IUV:</span> '.$result[3]['iuv'].'</p>'.
                '</div>'.
                '<div class="col-md-4">'.
                '<img src='.$img_previsao04.' class="img-fluid">'.
                '</div>'.
                '</div>'.
            '</div>'.
            '<div class="col-md-3"></div>'.
        '</div>'.
        '<div class="row row_result">'.
            '<div class="col-md-3"></div>'.
            '<div class="col-md-6 result_previsoes">'.
                '<br>'.
                '<div class="row">'.
                '<div class="col-md-8">'.
                '<p><span>Previsão para:</span> '.$result[4]['data'].'</p>'.
                '<p><span>Condição:</span> '.$result[4]['condicao'].'</p>'.
                '<p><span>Mínima:</span> '.$result[4]['minima'].'°</p>'.
                '<p><span>Máxima:</span> '.$result[4]['maxima'].'°</p>'.
                '<p><span>IUV:</span> '.$result[4]['iuv'].'</p>'.
                '</div>'.
                '<div class="col-md-4">'.
                '<img src='.$img_previsao05.' class="img-fluid">'.
                '</div>'.
                '</div>'.
            '</div>'.
            '</div>'.
            '<div class="col-md-3"></div>'.
        '</div>';

    } 
            
}
        
?>