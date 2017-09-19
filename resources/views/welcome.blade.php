<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JVictorMello/TweetsNews</title>
        
        <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/bootstrap-reboot.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        
        <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .qtd-tweets .fa-twitter, .qtd-tweets span{color: #1da1f2;}      
            .list-group li:first-child{
            	background-color: #eff9ff;
            	color: #1da1f2;
            }
            input[type="text"]{padding: 5px 10px 8px;}
            #loading-img {
                text-align: center;
                padding-top: 30%;
                z-index: 5000;
                font-size: 30px;
            }
            .overlay {
                position: fixed;
                z-index: 4999;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: #e9e9e9;
                opacity: 0.8;
                overflow: hidden;
            }
        </style>
    </head>
    <body>
    	<div id="loading-img" class="overlay" style="display: none;"> 
			<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
			 Carregando, por favor aguarde...
		</div>
    	<div class="container">
    		<form action="{{action('TweetsController@consultarTweets')}}" method="POST" enctype="multipart/form-data">
    			<input type="hidden" name="_token" value="{{csrf_token()}}">
		    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 my-5">
		    		<div class="input-group has-error">
						<input type="text" class="form-control" name="filter[hashtag]" placeholder="Digite a hashtag..." value="{{\Request::has('filter') ? \Request::get('filter')['hashtag'] : null }}">
							<span class="input-group-btn">
								<button class="btn btn-secondary" type="submit" onclick="showOverlay();"><i class="fa fa-search" aria-hidden="true"></i></button>
							</span>
		            </div><!-- /input-group -->
		    	</div>
		    	
		    	@if(isset($total))
			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4 qtd-tweets">
			           	<h4 class="text-center"><i class="fa fa-twitter" aria-hidden="true"></i> Essa hashtag foi utilizada em <span>{{$total}}</span> tweets.</h4>
		            </div>
		            @if(count($listaRetweets) > 0)
    			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4">
    		            	<ul class="list-group mx-auto">
    							<li class="list-group-item text-center">
    								<h5 class="m-0">
    									@if (count($listaRetweets) == 1)
    										<i class="fa fa-twitter" aria-hidden="true"></i> Tweet mais Retweetado
    									@else
    										<i class="fa fa-twitter" aria-hidden="true"></i> Top {{count($listaRetweets)}} Retweets
    									@endif
    								</h5>
    							</li>
    							@foreach ($listaRetweets as $retweet)
        							<li class="list-group-item">
        								<h6>{{$retweet[0]}} </h6><small class="text-muted">{{$retweet[1]}}</small></li>
    							@endforeach
    		            	</ul>
    		            </div>
    				@endif
		            
	            @else
	            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4 qtd-tweets">
			           	<h4 class="text-center"><i class="fa fa-twitter" aria-hidden="true"></i> Digite a <span>HashTag</span> para consultar os tweets.</h4>
		            </div>
	            @endif
    		</form>
    	</div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
        	hideOverlay();
    	});
        
        function showOverlay(){
        	$('body').css('overflow-y', 'hidden');
        	$("#loading-img").show();
        }
    
        function hideOverlay(){
        	$('body').css('overflow-y', 'auto');
        	$("#loading-img").hide();
        }
    </script>
</html>
