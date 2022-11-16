<?php


class PromoFormWidget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'PROMO FORM CRM';
	}
	
	public function get_title() {
		return 'PROMO FORM CRM';
	}
	
	public function get_icon() {
		return 'eicon-menu-toggle';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'promo form', 'promo', 'form', 'custom promo form' ];
	}
	
	protected function register_controls() {

		
		$this->start_controls_section(
			'content_section',
			[
				'label' => 'Campos de formulario',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'promo_name',
			[
				'label' => 'Nombre de la promoci�n',
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => [
					'url' => '',
				]
			]
		);

		$this->add_control(
			'select_shops',
			[
				'label' => 'Tiendas Posibles',
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'all' => 'Todas las tiendas',
					'3' => 'Barcelona',
					'11' => 'Madrid',
					'12' => 'Valencia',
				],
				'default' => 'all',
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
        $promo_name = $settings['promo_name'];
        $select_shops = $settings['select_shops'];
        echo '
        	<div class="wpb_column vc_column_container vc_col-sm-6">
        		<div class="vc_column-inner"><div class="wpb_wrapper">
        			<h2 style="font-size: 30px;text-align: center" class="vc_custom_heading">
        				INSCRIBIRSE A LA PROMOCI�N
        			</h2>
					<div class="wpb_raw_code wpb_content_element wpb_raw_html">
						<div class="wpb_wrapper">
							<div class="row" id="first-step">
			
								<div class="col s12 row mt-2">
									<div class="col s12 m12">
								  		<input type="hidden" id="name-label" value="Nombre">
								  		<input type="text" name="name" id="name" class="form-control custom-input" minlength="5" placeholder="Nombre *">
									</div>
									<div class="col s12 m12">
								  		<input type="hidden" id="email-label" value="Email">
								  		<input type="text" name="email" id="email" class="form-control custom-input" minlength="8" placeholder="Email *">
									</div>
							  	</div>
			  				<div class="col s12 row">
						<div class="col s12 m12">
				  			<input type="hidden" id="phone-label" value="Tel�fono">
				  			<input type="text" inputmode="numeric" pattern="[0-9]*" name="phone" id="phone" class="form-control custom-input" minlength="9" placeholder="Tel�fono *">
						</div>
			  		</div>';
			  	if ($select_shops == 'alll') {
			  		echo '

			  	<div class="col s12 row">
					<div class="col s12 m12">
						<input type="hidden" id="shop-label" value="En que tienda quieres inscribirte en esta promoci�n?">
						<input type="hidden" name="shop" id="shop" value="">
						<label>En que tienda quieres inscribirte en esta promoci�n?</label>
				  		<br>
				  		<p class="shop-selectors">
							<label>
						  		<input name="shop_options" type="radio" onclick="$(\'#shop\').val(3)">
						  		<span>BARCELONA</span>
							</label>
				  		</p>
				  		<p class="shop-selectors">
							<label>
						  		<input name="shop_options" type="radio" onclick="$(\'#shop\').val(11)">
						  		<span>MADRID</span>
							</label>
				  		</p>
				  		<p class="shop-selectors">
							<label>
					  			<input name="shop_options" type="radio" onclick="$(\'#shop\').val(12)">
					  			<span>VALENCIA</span>
							</label>
				  		</p>
					</div>
			  	</div>';
			  } else {
			  	echo '<input type="hidden" name="shop" id="shop" value="'.$select_shops.'">';
			  }
			  echo '
			  	<div class="col s12 row" style="margin-bottom: 20px; margin-left: 20px; margin-top: 50px;">
					<label>
				  		<input type="checkbox" name="terms" id="terms">
				  		<span>He le�do los t�rminos y condiciones</span>
					</label>
					<span style="margin-left: 20px;display: block;margin-left: 40px;">
				  		<a href="/terminos-de-uso" target="_blank">
							Ver t�rminos y condiciones
				  		</a>
					</span>
			  	</div>
			  	<input type="hidden" id="message" value="'.$promo_name.'">
			  	<div class="col s12 errors alert alert-danger card-panel red lighten-4 hide" role="alert"></div>
			  		<div class="col s12 mt-5" style="margin-bottom: 50px;">
						<button class="btn btn-success first-step-btn right mr-4" onclick="checkPromoForm(\'#shop\',\'message\')">
				  			Enviar 
				  			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
				  			</svg>
						</button>
			  		</div>
				</div>
			</div>';

	}
	
	
}