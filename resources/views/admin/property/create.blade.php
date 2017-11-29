@extends('admin.layouts.leftbar')

@section('topTitle')
	Novo Imóvel
@endsection

@section('title')
	Novo Imóvel
@endsection

@section('content')
<div class="card">
    <div class="alert alert-outline alert-danger" id="jsError" role="alert" style="display: none">
		<i class="fa fa-bug mr-3"></i> <span id="jsErrorTxt"></span>
	</div>
	<form id="jq-validation-example-2" method="post" class="form-horizontal mt-4" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="title">Título</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="title" name="title" placeholder="Nome" value="{{old('title')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="code">Código</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="code" name="code" placeholder="Código" value="{{old('code')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="type">Tipo</label>
			<div class="col-md-5 col-sm-8">
				<select class="form-control" name="type">
					<option {{(old('type') == 1) ? 'selected':''}} value="1">Casa</option>
					<option {{(old('type') == 2) ? 'selected':''}} value="2">Apartamento</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="cep">CEP</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="{{old('cep')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="cep">Rua (Logradouro)</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{old('rua')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="city">Cidade</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{old('city')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="state">Estado</label>
			<div class="col-md-5 col-sm-8">
				<select class="form-control" name="state" id="state">
					<option {{(old('state') == 'AC') ? 'selected':''}} value="AC">Acre</option>
				    <option {{(old('state') == 'AL') ? 'selected':''}} value="AL">Alagoas</option>
				    <option {{(old('state') == 'AP') ? 'selected':''}} value="AP">Amapá</option>
				    <option {{(old('state') == 'AM') ? 'selected':''}} value="AM">Amazonas</option>
				    <option {{(old('state') == 'BA') ? 'selected':''}} value="BA">Bahia</option>
				    <option {{(old('state') == 'CE') ? 'selected':''}} value="CE">Ceará</option>
				    <option {{(old('state') == 'DF') ? 'selected':''}} value="DF">Distrito Federal</option>
				    <option {{(old('state') == 'ES') ? 'selected':''}} value="ES">Espirito Santo</option>
				    <option {{(old('state') == 'GO') ? 'selected':''}} value="GO">Goiás</option>
				    <option {{(old('state') == 'MA') ? 'selected':''}} value="MA">Maranhão</option>
				    <option {{(old('state') == 'MS') ? 'selected':''}} value="MS">Mato Grosso do Sul</option>
				    <option {{(old('state') == 'MT') ? 'selected':''}} value="MT">Mato Grosso</option>
				    <option {{(old('state') == 'MG') ? 'selected':''}} value="MG">Minas Gerais</option>
				    <option {{(old('state') == 'PA') ? 'selected':''}} value="PA">Pará</option>
				    <option {{(old('state') == 'PB') ? 'selected':''}} value="PB">Paraíba</option>
				    <option {{(old('state') == 'PR') ? 'selected':''}} value="PR">Paraná</option>
				    <option {{(old('state') == 'PE') ? 'selected':''}} value="PE">Pernambuco</option>
				    <option {{(old('state') == 'PI') ? 'selected':''}} value="PI">Piauí</option>
				    <option {{(old('state') == 'RJ') ? 'selected':''}} value="RJ">Rio de Janeiro</option>
				    <option {{(old('state') == 'RN') ? 'selected':''}} value="RN">Rio Grande do Norte</option>
				    <option {{(old('state') == 'RS') ? 'selected':''}} value="RS">Rio Grande do Sul</option>
				    <option {{(old('state') == 'RO') ? 'selected':''}} value="RO">Rondônia</option>
				    <option {{(old('state') == 'RR') ? 'selected':''}} value="RR">Roraima</option>
				    <option {{(old('state') == 'SC') ? 'selected':''}} value="SC">Santa Catarina</option>
				    <option {{(old('state') == 'SP') ? 'selected':''}} value="SP">São Paulo</option>
				    <option {{(old('state') == 'SE') ? 'selected':''}} value="SE">Sergipe</option>
				    <option {{(old('state') == 'TO') ? 'selected':''}} value="TO">Tocantins</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="neighborhood">Bairro</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro" value="{{old('neighborhood')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="number">Número</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="number" name="number" placeholder="Número" value="{{old('number')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="complement">Complemento</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" value="{{old('complement')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="price">Preço</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="price" name="price" placeholder="Preço" value="{{old('price')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="area">Área m²</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="area" name="area" placeholder="Área" value="{{old('area')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="rooms">Quartos (dormitórios)</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="rooms" name="rooms" placeholder="Quartos (dormitórios) " value="{{old('rooms')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="suites">Suítes</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="suites" name="suites" placeholder="Suítes" value="{{old('suites')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="bathrooms">Banheiros</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="bathrooms" name="bathrooms" placeholder="Banheiros" value="{{old('bathrooms')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="living_rooms">Salas</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="living_rooms" name="living_rooms" placeholder="Salas" value="{{old('living_rooms')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="garages">Garagens</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="garages" name="garages" placeholder="Salas" value="{{old('garages')}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="living_rooms">Descrição</label>
			<div class="col-md-5 col-sm-8">
				<textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="image">Imagem</label>
			<div class="col-md-5 col-sm-8">
				<input type="file" name="image">
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