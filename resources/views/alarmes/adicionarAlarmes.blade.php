@extends('app')

@section('customStyles')
<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">


@endsection
@section('title', ' - Registo Manual')

@section('content')
<div class="container">
	<div class="row content">
		<div class="col-lg-10 col-xs-12 col-sm-11 col-md-9 col-lg-offset-2 col-sm-offset-2 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="modal-title">Registo Manual</h2>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" action="/admin/registos/manual/submit">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<fieldset> 
							
								<h3 class="modal-title border-bottom margin-bottom">Origem</h3>							
								<div class="col-xs-12 col-sm-9 col-md-8 ">
									<div>
										<div class="col-xs-12 col-sm-9 col-md-8 ">		
											<div class="btn-group">
												<label>Escolha uma Estufa</label>
												<div>
													<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true">
														@foreach($estufas as $key => $estufa)
														<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
														@endforeach	
													</select>
												</div>
											</div>
										</div>										
										<div class="col-lg-3  margin-bottom">											
											<div class="btn-group" id="divAssociacoes">
												<label>Escolha uma Associação</label>
												<select id="ass_id" name="ass_id" class="selectpicker form-control" title="Selecione uma Associação"  data-live-search="true" showTick="true" required>
												</select>
											</div>
										</div>
									</div>
								</div>
							</fieldset>	
							<div class="form-group">	
								<fieldset> 
									<h3 class="modal-title border-bottom margin-bottom">Hora</h3>	
									<div class="col-xs-12 col-md-12">
										<div class="form-group">
											<div>
												<div class="col-lg-6">	
													<label for="nome">Hora</label>
													<div class="input-group">									
														<div >
															<input type="text" class="form-control" id="hora" name="data" />
														</div>

													</div>
													<!--	<input type="text" class="form-control" id="hora" value="{{ old('hora') }}" name="hora"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>-->
												</div>
											</div>
										</div>
									</fieldset>	
								</div>							
								<div class="form-group">	
									<fieldset> 
										<h3 class="modal-title border-bottom margin-bottom">Valor</h3>
										<div class="col-xs-12 col-md-12">
											<div class="form-group">
												<div >
													<div class="col-lg-6">	
														<label for="nome">Valor</label>
														<div class="input-group">	
															<input type="number"  step="0.01" class="form-control" id="valor" value="{{ old('valor') }}" name="valor" placeholder="Insira um valor" min=0><span id="valor_span"class="input-group-addon" required></span>
														</div>
													</div>												
												</div>
											</div>
										</div>	
									</fieldset>				
								</div>
								@if (count($errors) > 0 )
								<div class="alert alert-danger col-lg-3">
									<h4>Por favor corrija os seguintes erros:</h4>
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error}}</li>
										@endforeach
									</ul>
								</div>
								@endif
								<div class="form-group">
									<div class="input-group-addon">
										<a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancelar</a>
										<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
									</div>
								</div>
							</form>						
						</div>
					</div>
			</div>
		</div>
	</div>
	@endsection
	@section('customScripts')	
	<script src="{{asset('js/registoManual/adicionarRegistoManual.js')}}"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="{{asset('js/registoManual/timePicker.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
	

	@endsection
