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
            
            $listaRetweets = array();
            
            while (true) {
                $result = \Twitter::getSearch([
                    'q' => $hashtag,
                    'count' => 100,
                    'max_id' => $next_results,
                    //'since' => $dataInicial
                ]);
                
                foreach ($result->statuses as $tweet) {
                    if ($tweet->retweet_count > 0) {
                        $listaRetweets[$tweet->retweet_count] = array($tweet->text, '@'.$tweet->user->screen_name);
                    }
                }
                
                $ids+=count($result->statuses);
                
                if (isset($result->search_metadata->next_results)) {
                    $search_metadata = explode("=", $result->search_metadata->next_results)[1];
                    $next_results = explode("&", $search_metadata)[0];
                } else {
                    break;
                }
            }
            
            krsort($listaRetweets);
            
            $hashtag = explode("#", $hashtag)[1];
            
            $buscaTweet = new Tweets();
            $buscaTweet->hashtag = $hashtag;
            $buscaTweet->total = $ids;
            
            try {
                $buscaTweet->save();
            } catch (\Exception $e) {
                return $e;
            }
            
            return view('welcome')->with('total', $ids)->with('listaRetweets', array_slice($listaRetweets, 0, 3));
        } else {
            return view('welcome');
        }
        
        
    }
    
}