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

              <form action="{{ route('about-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nom </label>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Entrez le nom">
                </div>

                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" class="form-control">
                    <option value="enterprise">Entreprise</option>
                    <option value="team">Team</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="text">A propos</label>
                  <textarea name="text" class="my-editor form-control" id="text" cols="30" rows="10">{{ old('text') }}</textarea>
                </div>

                <div class="form-group">
                  <input type="file" name="image" id="image">
                </div>

                <div>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-check fa-lg"></i>&nbsp;
                      <span id="payment-button-amount">Enregister</span>
                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                  </button>
                </div>

              </form>
            </div>
        </div>
  
      </div>
    </div> <!-- .card -->
   </div>
 </div>
@endsection

@section('scripts')

@endsection