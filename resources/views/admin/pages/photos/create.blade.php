@extends('admin.layout.app')

@section('content')



 <div class="row">
   <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <strong class="card-title">{{ $page_name }}</strong>
      </div>
      <div class="card-body">
        <!-- Credit Card -->
        <div id="pay-invoice">
            <div class="card-body">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <hr>

                <div class="alert alert-success my-3">
                  <p>NB: Pour une meilleure qualité, les images ne doivent pas dépasser 2M. Pour les photos de types portraits, les dimensions suivantes doivent être respectées: hauteur < 1250px, largeur < 850px. Pour les photos de types landscapes, hauteur: 775px, largeur < 1100px.</p>
                </div>

                {{ Form::open(['url'=> 'back/photos/store', 'method'=> "POST",'enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                    {{Form::label('name','Nom',['class'=> 'control-label mb-1'])}}
                    {{Form::text('name',null,['class'=> 'form-control', 'id'=> "name"])}}   
                  </div>


                  <div class="form-group">
                    {{Form::label('album','Albums',['class'=> 'control-label mb-1'])}}
                    {{Form::select('album[]',$album,null,['class'=> 'form-control myselect', 'data-placeholder'=> "Select albums", 'multiple'])}}  
                  </div>

                  <div class="form-group">
                    {{Form::label('type','Type',['class'=> 'control-label mb-1'])}}
                    <select name="type" id="type" class="form-control">
                      <option value="portrait">Portrait</option>
                      <option value="landscape">Landscape</option>
                    </select> 
                  </div>

                  <div class="form-group">
                    <input type="file" name="image" id="image">
                  </div>

                  <div class="form-group">
                    {{Form::label('red',"Redimensionner l'image automatiquement",['class'=> 'control-label mb-1'])}}
                    <select name="red" id="red" class="form-control">
                      <option value="non">Non</option>
                      <option value="oui">Oui</option>
                    </select> 
                  </div>

                  <div>
                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-check fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">Enregister</span>
                          <span id="payment-button-sending" style="display:none;">Sending…</span>
                      </button>
                  </div>
                {{ Form::close() }}
            </div>
        </div>
  
      </div>
    </div> <!-- .card -->
   </div>
 </div>
@endsection

@section('scripts')

@endsection