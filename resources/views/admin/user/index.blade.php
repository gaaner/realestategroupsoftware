@extends('admin.layouts.leftbar')

@section('topTitle')
	Usuários
@endsection

@section('title')
	Usuários
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="widget p-4">
			<a href="{{ route('admin.user.create') }}" class="btn btn-primary">Adicionar</a>
			<table class="table table-striped mt-3">
				<tr>
					<th>Nome</th>
					<th>Site</th>
					<th>Nível</th>
					<th>Ações</th>
				</tr>
				@forelse($users as $user)
				<tr>
					<td>
						{{$user->name}}
					</td>
					<td>{{$user->email}}</td>
					<th>{{$user->getLevel()}}</th>
					<td>
						<a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-outline-info">Editar</a>
						<a href="#remove" class="btn btn-outline-danger removeCat" data-cid="{{$user->id}}">Remover</a>
						
					</td>
				</tr>
				@empty
					<div class="alert alert-outline alert-info mt-3">
						<div class="media p-3">
							<i class="fa fa-times fa-2x mr-4"></i>
							<div class="media-body">
								<h6>Não existem lojas</h6>
								<div>Clique no botão "Adicionar" para começar.</div>
							</div>
						</div>
					</div>
				@endforelse
			</table>
		</div><!-- .widget -->
	</div><!-- END column -->
</div>
@endsection

@section('pageCss')
<link rel="stylesheet" href="{{ asset('assets/vendor/bower_components/sweetalert/dist/sweetalert.css') }}">
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
		
		$('#formRemove').attr('action', '/admin/user/'+$(this).data('cid')+'/destroy');
        swal({
            title: "Remover Usuário",
            text: "Este é um processo irreversível",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Remover',
            closeOnConfirm: false
        },
        function(){
            swal("Sucesso!", "O Usuário foi removida.", "success");
            setTimeout("$('#formRemove').submit();", 800);
        });
    });
</script>
@endsection
