	@extends('app')

	@section('customStyles')
	<link href="{{asset('css/estufas/editarEstufa.css')}}" rel="stylesheet">
	@endsection
	@section('title', ' - Editar Estufa')

	@section('content')
	<div class="container">
		<div >
			<div class="col-lg-10 col-xs-12 col-sm-10 col-md-11  col-lg-offset-2 col-sm-offset-3 col-md-offset-2">
				<div class="content">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="modal-title" >Editar Estufa</h2>
						</div>
						<div class="panel-body">
							<form id="registerForm" method="POST" action="/admin/estufas/editar/submit/{{$lista[0]->id}}">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
								<div class="form-group">
									<h3 class="modal-title border-bottom margin-bottom">Dados da Estufa</h3>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome da Estufa</label>
										@if( Session::get('message'))
										<div style="text-align: center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
										<div class="input-group">											
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome da Estufa" value="{{$lista[0]->nome}}" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
										</div>
										<br/>
										<label for="nome">Descrição</label>
										<div class="input-group margin-bottom">											
											<input type="text" class="form-control" id="descricao"  name="descricao" placeholder="Insira uma descrição para estufa" value="{{$lista[0]->descricao}}" ><span class="input-group-addon"></span>
										</div>
									</div>								
									<div class="form-group">
										<h3 class="modal-title border-bottom margin-bottom">Setores</h3> 
										<div >
											<div class="clearfix">
												<div class="col-md-12">
													<table class="table-responsive table table-bordered table-hover table-sortable tab_logic">
														<thead>
															<tr>

																<th class="text-center">
																</th>

																<th class="text-center">
																	Setor
																</th>
																<th class="text-center">
																	Descrição
																</th>
															</tr>
														</thead>
														<tbody>
															@if(count($lista[1])!=0)
															@foreach($lista[1] as $key => $setor)
															<tr id='addr0' data-id="0" class="hidden">
																<td  data-name="idSetor[]" id="0">
																	<input type="hidden" name="idSetor" value="{{$setor->id}}">
																</td>
																<td data-name="nomeSetor[]" id="0">
																	<input type="text" placeholder='Insira um nome' class="form-control"  value="{{$setor->nome}}"/>
																</td>
																<td data-name="descricaoSetor[]">
																	<input type="text" placeholder='Insira uma descricao' class="form-control" value="{{$setor->descricao}}"/>
																</td>
																<td data-name="del">
																	<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
																</td>
															</tr>
															@endforeach

															@else
															<tr id='addr0' data-id="0" class="hidden">
																<td  data-name="idSetor[]" id="0">
																	<input type="hidden" name="idSetor">
																</td>
																<td data-name="nomeSetor[]">
																	<input type="text" name='nomeS' placeholder='Nome' class="form-control"/>
																</td>
																<td data-name="descricaoSetor[]">
																	<input type="text" name='descricaoS' placeholder='Insira uma descricao' class="form-control"/>
																</td>
																<td data-name="del">
																	<button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
																</td>
															</tr>
															@endif
														</tbody>
													</table>
												</div>
												<div class="col-xs-12 col-md-12">
													<a id="add_row" class="btn btn-default pull-right">Adicionar Setor</a>
												</div>
											</div>
											
										</div>
									</div>
									<div class="form-group">
										<div class="input-group-addon">
											<a href="{{ url()->previous() }}" class="btn btn-default pull-right">Cancelar</a>
											<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
										</div>
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
		<script>		
			var lista = <?php echo json_encode($lista[1])?>;
		</script>
		<script src="{{asset('js/estufas/addSetor.js')}}"></script>
		@endsection
