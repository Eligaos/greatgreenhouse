@extends('app')

@section('customStyles')
@endsection
@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title">Adicionar Novo Tipo de Leitura</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/tipos-leituras/adicionar/submit" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
				<div class="form-group ">
					<h4 class="border-bottom sm-margin-left">Dados do Novo Tipo</h4>
					<div class="col-xs-12 col-md-12 margin-bottom">
						<label for="parâmetro">Nome do Parâmetro</label>
						<div class="input-group margin-bottom">
							<input type="text" class="form-control" id="parametro"  name="parametro" placeholder="Insira o nome parâmetro" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>		
						</div>
						<label for="unidade">Unidade</label>
						<div class="input-group ">
							<input type="text" class="form-control" id="unidade"  name="unidade" placeholder="Insira o unidade do parâmetro" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
						</div>
					</div>
				</div>
				<div>
					@if (Session::get('message') )
					<div class="col-xs-12 col-md-12 col-lg-3 alert alert-danger">
						<h4>Por favor corrija os seguintes erros:</h4>
						<ul>
							<li>{{ Session::get('message')}}</li>
						</ul>
					</div>
					@endif
				</div>
			</div>
			<div class="panel-footer"> 
				<div class="col-sm-12 input-group">
					<a href="{{ url()->previous() }}" role="button" name="cancelar"class="btnL btn btn-default pull-right">Cancelar</a>
					<input type="submit" id="submit" value="Guardar" class="btn btn-success pull-right">
				</div>
			</div>
		</form>
		
	</div>
</div>


@endsection
@section('customScripts')
@endsection

