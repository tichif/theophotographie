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

                {{ Form::model($user,['route'=> ['account-update', $user->id], 'method'=> "PUT"]) }}

                    <div class="form-group">
                        {{Form::label('name','Nom',['class'=> 'control-label mb-1'])}}
                        {{Form::text('name',null,['class'=> 'form-control', 'id'=> "name"])}}   
                    </div>

                    <div class="form-group">
                        {{Form::label('email','Email',['class'=> 'control-label mb-1'])}}
                        {{Form::email('email',null,['class'=> 'form-control', 'id'=> "email",'disabled' => 'disabled'])}}   
                    </div>

                    <div class="form-group">
                        {{Form::label('password','Mot de passe',['class'=> 'control-label mb-1'])}}
                        {{Form::password('password',['class'=> 'form-control', 'id'=> "password", 'placeholder' => 'Mot de passe'])}}   
                    </div>

                    <div class="form-group">
                        {{Form::label('password2','Mot de passe',['class'=> 'control-label mb-1'])}}
                        {{Form::password('password2',['class'=> 'form-control', 'id'=> "password2", 'placeholder'=>"Remettre mot de passe"])}}
                    </div>

                    <div class="form-group">
                      {{Form::label('role','Roles',['class'=> 'control-label mb-1'])}}
                      {{Form::select('role[]',$role,$selectedRole,['class'=> 'form-control myselect', 'data-placeholder'=> "Select Role(s)", 'multiple'])}}   
                  </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-check fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Modifier</span>
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

 <script>
  jQuery(document).ready(function(){
      jQuery(".myselect").chosen({
      disable_search_threshold: 10,
      no_results_text: "Oops, nothing found!",
      width: "100%"
      });
  });
</script>
  
@endsection