
<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="student management" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Bootstrap Core CSS -->
	<link href="{{asset('/')}}back_end/css/bootstrap.css" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="{{asset('/')}}back_end/css/style.css" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS -->
	<link href="{{asset('/')}}back_end/css/font-awesome.css" rel="stylesheet">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href='{{asset('/')}}back_end/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>

	<!-- //side nav css file -->

	<!-- js-->
	<script src="{{asset('/')}}back_end/js/jquery-1.11.1.min.js"></script>
	<script src="{{asset('/')}}back_end/js/modernizr.custom.js"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<!--//webfonts-->

	<!-- chart -->
	<script src="{{asset('/')}}back_end/js/Chart.js"></script>
	<!-- //chart -->

	<!-- Metis Menu -->
	<script src="{{asset('/')}}back_end/js/metisMenu.min.js"></script>
	<script src="{{asset('/')}}back_end/js/custom.js"></script>
	<link href="{{asset('/')}}back_end/css/custom.css" rel="stylesheet">
	<!--//Metis Menu -->
	<style>
		#chartdiv {
			width: 100%;
			height: 295px;
		}
	</style>
	<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
	<script src="{{asset('/')}}back_end/js/pie-chart.js" type="text/javascript"></script>
	<script type="text/javascript">

		$(document).ready(function () {
			$('#demo-pie-1').pieChart({
				barColor: '#2dde98',
				trackColor: '#eee',
				lineCap: 'round',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});

			$('#demo-pie-2').pieChart({
				barColor: '#8e43e7',
				trackColor: '#eee',
				lineCap: 'butt',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});

			$('#demo-pie-3').pieChart({
				barColor: '#ffc168',
				trackColor: '#eee',
				lineCap: 'square',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
			});


		});

	</script>
	<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
	<link href="{{asset('/')}}back_end/css/owl.carousel.css" rel="stylesheet">
	<script src="{{asset('/')}}back_end/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
				nav:true,
			});
		});
	</script>
	<!-- //requried-jsfiles-for owl -->

	<!--CK Editor-->
	<script src="{{asset('/')}}back_end/ckeditor/ckeditor.js"></script>
	<script src="{{asset('/')}}back_end/ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="{{asset('/')}}back_end/ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="{{asset('/')}}back_end/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

	<!--CK Editor Ends-->

	@yield('style')

</head>
<body class="cbp-spmenu-push">
<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		@include('backend.includes.student_sidebar')
	</div>
	<!--left-fixed -navigation-->

	<!-- header-starts -->
@include('backend.includes.student_header')
<!-- //header-ends -->

	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page">


			@yield('body')

		</div>
	</div>
	<!--main content ends-->

	<!--footer-->
	<div class="footer">
		@include('backend.includes.footer')
	</div>
	<!--footer-->

</div>
<!-- new added graphs chart js-->

<script src="{{asset('/')}}back_end/js/Chart.bundle.js"></script>
<script src="{{asset('/')}}back_end/js/utils.js"></script>


<!-- new added graphs chart js-->

<!-- Classie --><!-- for toggle left push menu script -->
<script src="{{asset('/')}}back_end/js/classie.js"></script>
<script>
	var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeftPush = document.getElementById( 'showLeftPush' ),
			body = document.body;

	showLeftPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'cbp-spmenu-push-toright' );
		classie.toggle( menuLeft, 'cbp-spmenu-open' );
		disableOther( 'showLeftPush' );
	};


	function disableOther( button ) {
		if( button !== 'showLeftPush' ) {
			classie.toggle( showLeftPush, 'disabled' );
		}
	}
</script>
<!-- //Classie --><!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="{{asset('/')}}back_end/js/jquery.nicescroll.js"></script>
<script src="{{asset('/')}}back_end/js/scripts.js"></script>
<!--//scrolling js-->

<!-- side nav js -->
<script src='{{asset('/')}}back_end/js/SidebarNav.min.js' type='text/javascript'></script>
<script>
	$('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- for index page weekly sales java script -->
<script src="{{asset('/')}}back_end/js/SimpleChart.js"></script>

<!-- //for index page weekly sales java script -->


<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/')}}back_end/js/bootstrap.js"> </script>
<!-- //Bootstrap Core JavaScript -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<!--CK Editor-->
<script>
	// initSample();
</script>
<!--CK Editor-->

<!-- ajax -->
@yield('scripts')
</body>
</html>