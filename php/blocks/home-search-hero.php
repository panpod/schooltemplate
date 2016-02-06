		<!-- BEGIN HOME SEARCH SECTION -->
		<section id="home-search-section" data-stellar-background-ratio="0.5">
			<div class="container">
				<form name="user_srch" id="user_srch" action="search_result.php" method="get">
				<div class="row">
					<div class="col-sm-12" data-animation-direction="from-top" data-animation-delay="50">
						
						<h2 class="slider-title" style="font-size:49px">Search the perfect service for your kid!!</h2>
						<div class="slider-subtitle">We have all what you need</div>
					</div>
					
					<div id="home-search-buttons" class="col-sm-6 col-sm-offset-3" data-animation-direction="from-bottom" data-animation-delay="250">
						<?php
						$list_category_type = list_category_type();
						if(!empty($list_category_type)){
						foreach ($list_category_type as $key => $value) {
							echo '<button class="btn btn-default">'.$value['name'].'</button>';
						} }else{
							echo '<button class="btn btn-default">Sorry! We dont have search option </button>';
						} ?>
												
						<div class="input-group">
							<input type="text" placeholder="Eg: Maths Tutor, School , Coaching" name="home_search" id="home_search" class="form-control" />
							<span class="input-group-btn">
								<button class="btn btn-default srch_header" type="button"><i class="fa fa-search"></i>Search</button>
							</span>
						</div>
						
						<!-- <a href="#" class="advanced-search">Advanced Search</a>-->
					</div>
				</div>
				</form>
			</div>
		</section>
		<!-- END HOME SEARCH SECTION -->
		
		<!-- BEGIN ACTION BOX -->
		<div class="action-box">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 center">
						<h2>Our vision is to let our customers and providers meet to create great experiences. <br/>List your business with us!!</h2>
						<div><a href="customer_registration.php" class="btn btn-default btn-lg">Register Now!</a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END ACTION BOX -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
    /*
  $(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#home_search" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "search_home_data.php",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
        log( ui.item ?
          "Selected: " + ui.item.label :
          "Nothing selected, input was " + this.value);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });
*/
  $(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#home_search" ).autocomplete({
      source: "search_home_data.php",
      minLength: 2,
      select: function( event, ui ) {
        log( ui.item ?
          "Selected: " + ui.item.value + " aka " + ui.item.id :
          "Nothing selected, input was " + this.value );
      }
    });
  });

$('.srch_header').on('click',function(){
	var home_search = $('#home_search').val();
	if(home_search!='')
	{
		window.location.href= 'search_result.php?keyword='+home_search;
	}
});
  </script>