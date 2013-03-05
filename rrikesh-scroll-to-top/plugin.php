<?php
class RRikeshScrollToTop extends KokenPlugin {

	function __construct()
  	{
    	$this->require_setup = true;
   		$this->register_hook('before_closing_body', 'render_js');
   		$this->register_hook('before_closing_head', 'render_css');
  	}
  	
  	function render_js(){
  		?>
  		<div id="scroll-top">
  			<a href="#"><?php echo $this->data->scroll_text; ?></a>
  		</div>
  		 <script>
			$(document).ready(function(){
				var $elem = $('#scroll-top');
				$elem.hide();
	
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$elem.fadeIn();
					} else {
						$elem.fadeOut();
					}
				});

				$elem.find('a').click(function (e) {
					e.preventDefault();
					$('body,html').animate({ scrollTop: 0 }, 1000);
				});

			});
		</script>
		<?php
  	}
  	
  	function render_css(){
  		?>
  		<style>
			#scroll-top{
			<?php if( $this->data->custom_css !== ""){ 
  				echo $this->data->custom_css;
  			} else { ?>
				background: none repeat scroll 0 0 #e4ffb9;
				border: 1px solid #c9e0a6;
				bottom: 10px;
				padding: 10px;
				position: fixed;
				right: 10px;
				z-index: 100;
				-webkit-border-radius: 35px;
				-moz-border-radius: 35px;
				border-radius: 35px;
			<?php } ?>  	
			}	
  		</style>
  		<?php
  	}
  	
}