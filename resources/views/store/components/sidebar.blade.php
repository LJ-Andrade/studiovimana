            <!-- Sidebar          -->
			<div class="col-xl-3 col-lg-4 pull-xl-9 pull-lg-8">
				<aside class="sidebar">
					<section class="widget widget">
						<div class="shop-sorting">
							<select class="form-control" id="sorting">
							<option>Menor Precio</option>
							<option>Mayor Precio</option>
							<option>A - Z</option>
							<option>Z - A</option>
							</select>
							{{--  
							If Search
							<span class="text-muted">Mostrando:&nbsp;</span><span>1 - 12 items</span>  --}}
						</div>
					</section>

					<div class="padding-top-2x hidden-lg-up"></div>
					<!-- Widget Categories-->
					<section class="widget widget-categories">
						<h3 class="widget-title">Categorias</h3>
						<ul>
							@foreach($categories as $category)
							<li class=""><a href="#">{{ $category->name }} ({{ $category->articles->count() }})</a><span></span></li>
							@endforeach
						</ul>
					</section>

					<!-- Widget Size Filter-->
					<section class="widget">
						<h3 class="widget-title">Talles</h3>
						<div class="inline">
							<ul>
							@foreach($atributes1 as $atribute1)
								<li>
								<label class="custom-control custom-checkbox d-block">
									<input class="custom-control-input" type="checkbox"><span class="custom-control-indicator"></span><span>{{ $atribute1 }}</span>
								</label>
								</li>
							@endforeach
							</ul>
						</div>
					</section>
				</aside>
			</div>