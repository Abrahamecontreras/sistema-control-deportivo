@extends('layouts.app')

@section('template_title')
    Liga
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Liga') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ligas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Logo</th>
										<th>Tipo</th>
										<th>Estado</th>
										<th>Temporadas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ligas as $liga)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $liga->nombre }}</td>
											<td>{{ $liga->logo }}</td>
											<td>{{ $liga->tipo }}</td>
											<td>{{ $liga->estado }}</td>
											<td>{{ $liga->temporadas }}</td>

                                            <td>
                                                <form action="{{ route('ligas.destroy',$liga->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ligas.show',$liga->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ligas.edit',$liga->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ligas->links() !!}
            </div>
        </div>
    </div>
@endsection
