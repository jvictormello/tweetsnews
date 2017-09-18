<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
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
        </style>
    </head>
    <body>
    	<div class="container">
    		<form action="">
		    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 my-5">
		    		<div class="input-group has-error">
						<input type="text" class="form-control" placeholder="Digite a hashtag...">
							<span class="input-group-btn">
								<button class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
							</span>
		            </div><!-- /input-group -->
		    	</div>
		    	@if(1==1)
			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4 qtd-tweets">
			           	<h4 class="text-center"><i class="fa fa-twitter" aria-hidden="true"></i> Essa hashtag foi utilizada em <span>10</span> tweets.</h4>
		            </div>
			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4">
		            	<ul class="list-group mx-auto">
							<li class="list-group-item text-center">
								<h5 class="m-0">
									<i class="fa fa-twitter" aria-hidden="true"></i> Top 3 Retweets
								</h5>
							</li>
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Morbi leo risus</li>
		            	</ul>
		            </div>
	            @endif
    		</form>
    	</div>
    	
   
    </body>
</html>
