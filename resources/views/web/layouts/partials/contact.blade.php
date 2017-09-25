<div id="contact" class="container-fluid contact-section">
	<div class="container wow animated fadeIn">
		<div class="row title">
			<h1>CONTACTANOS !</h1>
		</div>
		<div class="row">
			<div class="contact-head-data">
				<div>
					<div class="data-title"><i class="ion-email"></i> Mail</div> <br>
					<div class="data-info">info@studiovimana.com.ar</div>
				</div>
				<div>
					<div class="data-title"><i class="ion-ios-telephone"></i> Teléfono</div> <br>
					<div class="data-info">(011) 3529-4527</div>
				</div>
				<div>
					<div class="data-title"><i class="ion-iphone"></i> Celular</div> <br>
					<div class="data-info">(011) 15-5160-1565</div>
				</div>
			</div>
		</div>

		<div class="row inner">
			<div class="col-md-12 contact-form">
				{!! Form::open(['id'=>'ContactForm', 'method' => 'POST']) !!}
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresá tu nombre/empresa', 'required' => '']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'Ingresá tu teléfono', 'required' => '']) !!}
						</div>
						<div class="form-group">
							{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresá tu E-Mail', 'required' => '']) !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::textarea('message', null, ['size' => '30x5', 'class' => 'form-control', 'placeholder' => 'Dejanos tu pedido o consulta. Te responderemos cuanto antes']) !!}
						</div>
					
					</div>
					<button id="ContactBtn" class="btn contactBtn">ENVIAR</button>
				{!! Form::close() !!}
				
				<div id="FormResponse"></div>
				<div id="FormSuccess" class="form-responses animated fadeIn Hidden">
					<i class="success ion-checkmark-round"></i>
					<h2>Mensaje Enviado !</h2> 
					Gracias por contactarse con nosotros. <br>
					Nos estaremos comunicando a la brevedad.
					<hr class="softhr">
				</div>
				<div id="FormError" class="form-responses animated fadeIn Hidden">
					<i class="error ion-close-round"></i>
					<h2>Ha ocurrido un error !</h2> 
					Intente comunicarse directamente por mail o teléfono <br>
					Gracias.
				</div>
			</div>
		</div>

		<div class="horizontal-list social-icons">
			<div class="title">
				<span>Seguí nuestro proceso creativo en las redes</span>
			</div>
			<ul>
				<a href="https://www.facebook.com/studiograficovimana" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><img src=" {{asset('webimages/gral/social/red1.png')}} "></li>
				</a>
				<a href="https://twitter.com/StudioVimana" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"><img src=" {{asset('webimages/gral/social/red2.png')}} "></li>
				</a>
				<a href="https://www.instagram.com/studiovimana/" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s"><img src=" {{asset('webimages/gral/social/red3.png')}} "></li>
				</a>
				<a href="https://www.behance.net/studiovimana" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><img src=" {{asset('webimages/gral/social/red4.png')}} "></li>
				</a>
				<a href="https://plus.google.com/u/0/+StudioVimana" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><img src=" {{asset('webimages/gral/social/red5.png')}} "></li>
				</a>
				<a href="https://github.com/StudioVimana" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s"><img src=" {{asset('webimages/gral/social/red6.png')}} "></li>
				</a>
				{{-- <a href="https://www.youtube.com/channel/UCFT-sFx3Pv-r3ozgEqqnWfA" target="_blank">
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s"><img src=" {{asset('webimages/gral/social/red3.png')}} "></li>
				</a> --}}
			</ul>
		</div>

	</div>
</div>

<a href="https://api.whatsapp.com/send?phone=541151601565">
	<div class="whatsapp-call">
		<img src="{{ asset('webimages/gral/icons/whatsapplogo.png')}}" alt="">
	</div>
</a>