@extends('app')

@section('customStyles')

<link href="{{asset('css/registoManual/timePicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">

@endsection
@section('title', ' - Lista de Leituras')

@section('content')

<div class="col-sm-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">		
		<div class="panel-heading margin-bottom">
			<h3 class="modal-title" >Lista de Leituras</h3>
		</div>
		<div class="form-group margin-bottom">
			<form method="POST" action="/admin/leituras">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">				
				<div class="col-sm-3">
					<label>Escolha o Tipo</label>
					<select id="tipo_id" name="tipo_id" class="selectpicker form-control" title="Selecione um Tipo"  data-live-search="true" showTick="true">
						@foreach($tiposLeituras as $key => $tipo)
						<option value="{{$tipo->id}}">{{$tipo->parametro}}</option>
						@endforeach	
					</select>
				</div>
				<div class="btn-group col-sm-3 margin-bottom">	
					<label>Escolha uma Estufa</label>
					<div>
						<select id="ddEstufa" name="ddEstufa" class="selectpicker form-control" title="Selecione uma Estufa"  data-live-search="true" showTick="true" >
							@foreach($estufas as $key => $estufa)
							<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
							@endforeach	
						</select>
					</div>
				</div>	

				<div class="btn-group col-sm-3 margin-bottom" id="divAssociacoesSetores">
					<label>Escolha um Setor</label>
					<select id="setor_id" name="setor_id" class="selectpicker form-control " title="Selecione um Setor"  data-live-search="true" showTick="true">
					</select>
				</div>
				<div class="btn-group col-sm-3 margin-bottom">							<label>Data Inicial</label>
					<input type="text" class="form-control" id="dataInicial" name="data_inicial">
				</div>

				<div class="btn-group col-sm-3 margin-bottom">							<label>Data Final</label>
					<input type="text" class="form-control" id="dataFinal" name="data_final">
				</div>

				<div class="row pull-right md-margin-top margin-bottom md-margin-right ">
					<button  id="pesquisar" class="btn btn-success" toggle="tooltip" data-placement="top" title="Pesquisar"><i class="glyphicon glyphicon-search fa-lg"></i>Pesquisar							</button>

					<button  id="limpar" name="limpar" value="1" class="btn btn-success" toggle="tooltip" data-placement="top" title="Limpar Filtros"><i class="glyphicon glyphicon-erase"></i>Limpar							</button>

					<a  role="button" id="exportar" value="2" class="btn btn-success" toggle="tooltip" data-placement="top" title="Exportar"><i class="glyphicon glyphicon-export"></i>Exportar	</a>
					<button value="3" class="btn btn-success" toggle="tooltip" data-placement="top" title="Gerar Gráfico"><i class="glyphicon glyphicon-stats"></i>Gerar Gráfico							</button>
				</div>
				
			</div>

			@if(count($lista)!=0)	
			<table id="dataTable" class="table table-container table-filter table-striped table-bordered table-responsive">							 
				<thead>
					<tr class="success">
						<th>Data</th>
						<th>Valor</th>
						<th>Tipo</th>
						<th>Unidade</th>
						<th>Sensor</th>
						<th>Estufa</th>
						<th>Setor</th>
						<th>Leitura</th>
					</tr>	
				</thead>					
				<tbody>		
					@foreach($lista as $key => $leitura)
					<tr>										
						<td>

							{{$leitura->data}}

						</td>
						<td>		
							{{$leitura->valor}}

						</td>

						<td>		
							{{$leitura->parametro}}

						</td>
						<td>		
							{{$leitura->unidade}}

						</td>
						<td>		
							{{$leitura->sensor_nome}}

						</td>	
						<td>		
							{{$leitura->estufa_nome}}

						</td>
						<td>		
							@if($leitura->setor_nome == "Nenhum")
							Geral
							@else
							{{$leitura->setor_nome}}
							@endif
						</td>
						<td>
							@if($leitura->manual == 0)
							Automática
							@else
							Manual
							@endif
						</td>
					</tr>												
					@endforeach
				</tbody>
			</table>
			<div class="input-group-addon" >
				<a  href="/admin/registos/manual" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Registar Leitura Manual" >Registar Leitura Manual</a>
				<div class="pull-right"> {!! $lista->render() !!}</div>
			</div>
			@else
			<div class="btn-group">
				<div  class="text-center">
					<h4>Não foram encontrados quaisquer resultados para a pesquisa efetuada </h4>
				</div>
				<div class="input-group-addon" >
					<a  href="/admin/registos/manual" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Registar Leitura Manual" >Registar Leitura Manual</a>
				</div>
			</div>
			@endif


		</div>
		@endsection

		@section('customScripts')
		<!-- Latest compiled and minified JavaScript -->




		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.5/js/tableexport.min.js"></script>



		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{asset('js/registoManual/timePicker.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="{{asset('js/dataTable.js')}}"></script>

		<script src="{{asset('js/leituras/listagemLeituras.js')}}"></script>
		@endsection