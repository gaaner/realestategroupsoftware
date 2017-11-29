@extends('admin.layouts.leftbar')

@section('topTitle')
	Editar Usuário
@endsection

@section('title')
	Editar Usuário
@endsection

@section('content')
<div class="card">
	<form id="jq-validation-example-2" method="post" class="form-horizontal mt-4" action="{{ route('admin.user.update', $user->id) }}">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="name">Nome</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{$user->name}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="name">E-mail</label>
			<div class="col-md-5 col-sm-8">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{$user->email}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="name">Nível</label>
			<div class="col-md-5 col-sm-8">
				<select class="form-control" name="user_level" id="user_level" required>
					<option {{ ($user->level == 1) ? 'selected' : '' }} value="1">Cliente</option>
					<option {{ ($user->level == 9) ? 'selected' : '' }} value="9">Administrador</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-5 col-sm-8 offset-sm-4">
				<button type="submit" class="btn btn-outline-primary">Salvar</button>
			</div>
		</div>
	</form>
</div><!-- /.card -->
@endsection

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/examples/css/demos/demos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/examples/css/demos/form.validation.css') }}">
@endsection

@section('pageScripts')
<script src="{{ asset('assets/vendor/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bower_components/parsleyjs/dist/parsley.min.js') }}"></script>
<script type="text/javascript">
	$("#jq-validation-example-2").validate({
        messages: {
            firstname1: "Please enter your firstname",
            agree1: "Please accept our policy"
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("form-control-feedback");

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.closest(".form-group").addClass("has-danger");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent(".checkbox"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).closest(".form-group").addClass("has-danger").removeClass("has-success");
            $(element).removeClass('form-control-success').addClass('form-control-danger');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest(".form-group").addClass("has-success").removeClass("has-danger");
            $(element).removeClass('form-control-danger').addClass('form-control-success');
        }
    });
</script>
@endsection