@extends('admin.layout.app')

@section('content')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ $page_name }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ url('/back') }}">Accueil</a></li> 
                    <li><a href="{{ url('/back/categories') }}">Categories</a></li> 
                    <li class="active">{{ $page_name }}</li>
                </ol>
            </div>
        </div>
    </div>
  </div>

  <div class="content mt-3">
      <div class="animated fadeIn">
          <div class="row">

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <strong class="card-title">{{ $page_name }}</strong>
                    <a href="{{ url('/back/categories' )}}" class="btn btn-warning ml-3 pull-right"><i class="fa fa-arrow-left"></i> Retour</a>
                    @permission(['Plan Add','All'])
                      <a href="{{url('/back/plan/'.$data->id.'/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Créer</a>
                    @endpermission
                  </div>
                  <div class="card-body">
                    
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Prix</th>
                  <th>Options</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->plans as $i => $plan)
                  <tr>
                    <td> {{ ++$i }} </td>
                    <td> {{ $plan->name }} </td>
                    <td> ${{ $plan->price }} </td>
                    <td> {{ $plan->options->count() }} </td>
                    <td> 
                      @permission(['Option List','All'])
                        <a href="{{ url('/back/options/'.$plan->id) }}" class="btn btn-secondary"><i class="fa fa-eye"></i> Voir</a>
                      @endpermission

                      @permission(['Plan Update','All'])
                        <a href="{{ url('/back/plan/edit/'.$plan->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Modifier</a>
                      @endpermission
                      
                      @can('delete', Plan::class)
                        @permission(['Plan Delete','All'])                      
                          {{ Form::open(['method'=> 'DELETE', 'url'=> ['/back/plan/delete/'.$plan->id], 'style' => 'display:inline' ]) }}
                            {{ Form::submit(' Supprimer',['class' => 'btn btn-danger ']) }}
                          {{ Form::close() }}
                        @endpermission
                      @endcan
                    </td>
                  </tr>
                @endforeach                
              </tbody>
            </table>
                  </div>
              </div>
          </div>


          </div>
      </div><!-- .animated -->
  </div><!-- .content -->

@endsection


@section('scripts')
  <script src="{{asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/chart-js/Chart.bundle.jss')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/jszip.min.jss')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/data-table/datatables-init.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
  </script>
@endsection