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
	<form id="jq-validation-example-2" method="post" class="form-horizontal mt-4" action="{{ route('admin.property.update', $property->id) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="title">Título</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="title" name="title" placeholder="Nome" value="{{$property->title}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="code">Código</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="code" name="code" placeholder="Código" value="{{$property->code}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="type">Tipo</label>
			<div class="col-md-5 col-sm-8">
				<select class="form-control" name="type">
					<option {{($property->type == 1) ? 'selected':''}} value="1">Casa</option>
					<option {{($property->type == 2) ? 'selected':''}} value="2">Apartamento</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="cep">CEP</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="{{$property->cep}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="cep">Rua (Logradouro)</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{$property->rua}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="city">Cidade</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{$property->city}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="state">Estado</label>
			<div class="col-md-5 col-sm-8">
				<select class="form-control" name="state" id="state">
					<option {{($property->state == 'AC') ? 'selected':''}} value="AC">Acre</option>
				    <option {{($property->state == 'AL') ? 'selected':''}} value="AL">Alagoas</option>
				    <option {{($property->state == 'AP') ? 'selected':''}} value="AP">Amapá</option>
				    <option {{($property->state == 'AM') ? 'selected':''}} value="AM">Amazonas</option>
				    <option {{($property->state == 'BA') ? 'selected':''}} value="BA">Bahia</option>
				    <option {{($property->state == 'CE') ? 'selected':''}} value="CE">Ceará</option>
				    <option {{($property->state == 'DF') ? 'selected':''}} value="DF">Distrito Federal</option>
				    <option {{($property->state == 'ES') ? 'selected':''}} value="ES">Espirito Santo</option>
				    <option {{($property->state == 'GO') ? 'selected':''}} value="GO">Goiás</option>
				    <option {{($property->state == 'MA') ? 'selected':''}} value="MA">Maranhão</option>
				    <option {{($property->state == 'MS') ? 'selected':''}} value="MS">Mato Grosso do Sul</option>
				    <option {{($property->state == 'MT') ? 'selected':''}} value="MT">Mato Grosso</option>
				    <option {{($property->state == 'MG') ? 'selected':''}} value="MG">Minas Gerais</option>
				    <option {{($property->state == 'PA') ? 'selected':''}} value="PA">Pará</option>
				    <option {{($property->state == 'PB') ? 'selected':''}} value="PB">Paraíba</option>
				    <option {{($property->state == 'PR') ? 'selected':''}} value="PR">Paraná</option>
				    <option {{($property->state == 'PE') ? 'selected':''}} value="PE">Pernambuco</option>
				    <option {{($property->state == 'PI') ? 'selected':''}} value="PI">Piauí</option>
				    <option {{($property->state == 'RJ') ? 'selected':''}} value="RJ">Rio de Janeiro</option>
				    <option {{($property->state == 'RN') ? 'selected':''}} value="RN">Rio Grande do Norte</option>
				    <option {{($property->state == 'RS') ? 'selected':''}} value="RS">Rio Grande do Sul</option>
				    <option {{($property->state == 'RO') ? 'selected':''}} value="RO">Rondônia</option>
				    <option {{($property->state == 'RR') ? 'selected':''}} value="RR">Roraima</option>
				    <option {{($property->state == 'SC') ? 'selected':''}} value="SC">Santa Catarina</option>
				    <option {{($property->state == 'SP') ? 'selected':''}} value="SP">São Paulo</option>
				    <option {{($property->state == 'SE') ? 'selected':''}} value="SE">Sergipe</option>
				    <option {{($property->state == 'TO') ? 'selected':''}} value="TO">Tocantins</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="neighborhood">Bairro</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro" value="{{$property->neighborhood}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="number">Número</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="number" name="number" placeholder="Número" value="{{$property->number}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="complement">Complemento</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" value="{{$property->complement}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="price">Preço</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="price" name="price" placeholder="Preço" value="{{$property->price}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="area">Área m²</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="area" name="area" placeholder="Área" value="{{$property->area}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="rooms">Quartos (dormitórios)</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="rooms" name="rooms" placeholder="Quartos (dormitórios) " value="{{$property->rooms}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="suites">Suítes</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="suites" name="suites" placeholder="Suítes" value="{{$property->suites}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="bathrooms">Banheiros</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="bathrooms" name="bathrooms" placeholder="Banheiros" value="{{$property->bathrooms}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="living_rooms">Salas</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="living_rooms" name="living_rooms" placeholder="Salas" value="{{$property->living_rooms}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="garages">Garagens</label>
			<div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" id="garages" name="garages" placeholder="Salas" value="{{$property->garages}}" required/>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="living_rooms">Descrição</label>
			<div class="col-md-5 col-sm-8">
				<textarea class="form-control" name="description" id="description">{{$property->description}}</textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 col-form-label text-sm-right" for="image">Imagem</label>
			<div class="col-md-5 col-sm-8">
				<img src="{{asset('storage/'.$property->image)}}" class="img-responsive mb-3" width="400">
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