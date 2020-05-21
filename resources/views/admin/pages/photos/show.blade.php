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
                    
                    
                      <a href="{{url('/back/photos/')}}" class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Retour</a>
                  </div>
                  <div class="card-body">
                    
                    <div class="container">
                      <img src="{{ url('/' )}}/storage/photos/{{ $photo->image }}" alt="{{ $photo->name }}" style="width:60%;height:60%">

                      
                      <p class="text-muted mt-2">Taille: {{ $photo->size }}KB</p>
                    </div>
                  </div>
              </div>
          </div>


          </div>
      </div><!-- .animated -->
  </div><!-- .content -->


  

@endsection