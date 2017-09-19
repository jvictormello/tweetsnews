<?php

namespace App\Http\Controllers;

use App\Tweets;
use Carbon\Carbon;

class TweetsController extends Controller {
    
    public function index() {
        /* 
         * Carregar tela Inicial com campo para digitação e botão de ação Consultar
         */
        
    }
    
    public function consultarTweets () {
        /*
         * Com base na hashtag recebida, realizar a consulta
         * Obter quantidade ou tweets totais
         * Obter 3 tweets mais retweetados com a hashtag
         * Instanciar e popular objeto tweet
         * Persistir objeto populado com resultados da busca
         * Exibir em tela o total de tweets e os top 3 tweets
         */
        
        if ((\Request::get('filter')['hashtag'] != null) || (\Request::get('filter')['hashtag'] != "")) {
            $hashtag = \Request::get('filter')['hashtag'];
            
            if (strpos($hashtag, '#') === false) {
                $hashtag = '#'.$hashtag;
            }
            
            $ids = 0;
            $next_results = "";
            $dataInicial = Carbon::now(-3)->subHours(12)->toDateString();
            
            while (true) {
                $result = \Twitter::getSearch([
                    'q' => $hashtag,
                    'count' => 100,
                    'max_id' => $next_results,
                    'since' => $dataInicial
                ]);
                
                $ids+=count($result->statuses);
                
                if (isset($result->search_metadata->next_results)) {
                    $search_metadata = explode("=", $result->search_metadata->next_results)[1];
                    $next_results = explode("&", $search_metadata)[0];
                } else {
                    break;
                }
            }
            
            $hashtag = explode("#", $hashtag)[1];
            
            $tweet = new Tweets();
            $tweet->hashtag = $hashtag;
            $tweet->total = $ids;
            
            try {
                $tweet->save();
            } catch (\Exception $e) {
                return $e;
            }
            
            return view('welcome')->with('total', $ids);
        } else {
            return view('welcome');
        }
        
        
    }
    
}