<?php

namespace App\Http\Controllers;

use \Tweets;

class TweetsController extends Controller {
    
    public function index() {
        /* 
         * Carregar tela Inicial com campo para digitação e botão de ação Consultar
         */
        
    }
    
    public function consultarTweets ($hashtag) {
        /*
         * Com base na hashtag recebida, realizar a consulta
         * Obter quantidade ou tweets totais
         * Obter 3 tweets mais retweetados com a hashtag
         * Instanciar e popular objeto tweet
         * Persistir objeto populado com resultados da busca
         * Exibir em tela o total de tweets e os top 3 tweets
         */
        
        $tweet = new Tweets();
        
        try {
            $tweet->save();
        } catch (\Exception $e) {
            return $e;
        }
        
    }
    
}