@extends('admin.layouts.leftbar')

@section('topTitle')
	Imóveis
@endsection

@section('title')
	Imóveis
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="widget p-4">
			<a href="{{ route('admin.property.create') }}" class="btn btn-primary">Adicionar</a>
			<a href="{{ route('admin.property.import') }}" class="btn btn-info">Importação</a>
			<form class="searchForm" action="{{ route('admin.property.index') }}" method="GET">
				<input type="text" class="form-control" placeholder="Busca por código" name="s" value="{{\Request::get('s')}}">
				<button type="submit" class="btn btn-success">Buscar</button>
			</form>
			<table class="table table-striped mt-3">
				<tr>
					<th>Código</th>
					<th>Título</th>
					<th>Ações</th>
				</tr>
				@forelse($properties as $property)
				<tr>
					<td>{{$property->code}}</td>
					<td>{{$property->title}}</td>
					<td>
						<a href="{{ route('admin.property.edit', $property->id) }}" class="btn btn-outline-info">Editar</a>
						<a href="#remove" class="btn btn-outline-danger removeCat" data-cid="{{$property->id}}">Remover</a>
						
					</td>
				</tr>
				@empty
					<div class="alert alert-outline alert-info mt-3">
						<div class="media p-3">
							<i class="fa fa-times fa-2x mr-4"></i>
							<div class="media-body">
								<h6>Não existem Imóveis cadastrados</h6>
								<div>Clique no botão "Adicionar" para começar.</div>
							</div>
						</div>
					</div>
				@endforelse
			</table>
			{{$properties->links('vendor.pagination.bootstrap-4')}}
		</div><!-- .widget -->
	</div><!-- END column -->
</div>
@endsection

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/sweetalert/dist/sweetalert.css') }}">
<style type="text/css">
	.searchForm {
		display: inline;
	}
	.searchForm input {
		max-width: 250px;
		display: inline-block;
		vertical-align: middle;
	}
</style>
@endsection

@section('pageScripts')
<script src="{{ asset('assets/vendor/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
<form id="formRemove" method="post" action="">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
</form>
<script type="text/javascript">
	$('.removeCat').on('click', function() {
		window.console.log($(this).data('cid'));
		
		$('#formRemove').attr('action', '/admin/property/'+$(this).data('cid')+'/destroy');
        swal({
            title: "Remover Imóvel",
            text: "Este é um processo irreversível",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Remover',
            closeOnConfirm: false
        },
        function(){
            swal("Sucesso!", "Seu Imóvel foi removido.", "success");
            setTimeout("$('#formRemove').submit();", 800);
        });
    });
</script>
@endsection
