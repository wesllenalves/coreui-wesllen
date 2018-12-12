<!DOCTYPE html>
<html lang="pt-br">
  <head>
		<title>Paletes Brasilia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css')}}">
		<link rel='stylesheet' id='camera-css'  href="{{ asset('css/camera.css')}}" type='text/css' media='all'>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/slicknav.css')}}">
		<link rel="stylesheet" href="{{ asset('css/prettyPhoto.css')}}" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style-home.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/customhome.css')}}">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Audiowide|Lato|Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">

		<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.mobile.customized.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js')}}"></script> 
		<script type="text/javascript" src="{{ asset('js/camera.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/myscript.js')}}"></script>
		<script src="{{ asset('js/sorting.js')}}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.isotope.js')}}" type="text/javascript"></script>
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->
		

		<script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
		
	</head>
	<body>
    <div id="home">
    @include('core.home.navbar-home')  
    </div>
    
    <!--about start-->       
    <div id="about">
	@include('core.home.aboutConteudo')
			
    </div>
    <!--project start-->    
    <div id="project">  
	@include('core.home.projectConteudo')
	</div>  

    <!--contact start-->
    
    <div id="orcamento" style="position: relative;
    z-index: 0; margin-button: 0;">
	@include('core.home.orcamentoConteudo')
	@include('core.home.footer')
    </div>		
		
	@include('core.home.scripts')
	
	</body>
	
</html>