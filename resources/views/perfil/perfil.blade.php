@extends('app')

@section('customStyles')

@endsection
@section('content')
<div class="container">
	<div>
		<div class="col-lg-10 col-xs-12 col-sm-11 col-md-11 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">
			<div class="content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="modal-title">Dados do Perfil</h2>
					</div>
					<div class="panel-body">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

								<fieldset>
									<div class="col-xs-12 col-md-12">

										<label for="nome">Nome:</label>
                                            <span>{{Auth::getUser()->name}}</span>
										<br>
                                        <label for="nome">E-mail: </label>
                                        <span>{{Auth::getUser()->email}}</span>
                                        <br>
										<label for="nome">Nº Telemóvel: </label>
                                        <span>{{Auth::getUser()->cellphone}}</span>
									</fieldset>

								<div class="form-group">
									<div class="input-group-addon">
										<a href="/admin/perfil/editar" role="button" name="editar" class="btn btn-success pull-right">Editar</a></div>
								</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection


	@section('customScripts')

	@endsection
