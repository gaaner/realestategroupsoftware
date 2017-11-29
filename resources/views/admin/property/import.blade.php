@extends('admin.layouts.leftbar')

@section('topTitle')
	Importação
@endsection

@section('title')
	Importação
@endsection

@section('content')
<div class="card">
    <div class="alert alert-outline alert-danger" id="jsError" role="alert" style="display: none">
		<i class="fa fa-bug mr-3"></i> <span id="jsErrorTxt"></span>
	</div>
	<form id="jq-validation-example-2" method="post" class="form-horizontal mt-4" action="{{ route('admin.property.import.handle') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group row">
			<h5 class="col-sm-4 offset-sm-3 text-sm-right">Importação por Arquivo .XML</h4>
		</div>
		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="xml">XML</label>
			<div class="col-md-5 col-sm-8">
				<input type="file" name="xml">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-5 col-sm-8 offset-sm-4">
				<button type="submit" class="btn btn-outline-primary">Importar</button>
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
<script type="text/javascript">
	//Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                        $("#neighborhood").val(dados.bairro);
                        $("#rua").val(dados.logradouro);
						
						$('#number').focus();
						$('#jsError').hide();
                    } //end if.
                    else {
                    	$('#jsError').fadeIn();
                    	$('#jsErrorTxt').html("CEP não encontrado.");
                    	$('#cep').focus();
                    }
                });
            } //end if.
            else {
                //cep é inválido.
              	$('#jsError').fadeIn();
				$('#jsErrorTxt').html("Formato de CEP inválido.");
				$('#cep').focus();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
        
        }
    });
</script>
@endsection