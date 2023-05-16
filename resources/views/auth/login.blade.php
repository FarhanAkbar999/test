@extends('auth.app')
@section('content')

  <div class="row mt-5 border border-primary ">
    <div class="col-md-5 bg-white m-auto d-flex flex-column align-content-center ">
      <div class="row px-5  ">
        <div class="col-12 mt-5 d-flex justify-content-between    ">
            <a href="/login" class="btn btn-primary">LOGIN</a>
            <a href="/register" class="btn btn-primary">REGISTER</a>
        </div>

        <div class="mb-3 d-flex justify-content-center fw-bold">login</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
          
        <div class="col-12 ">
          <!-- logon form Code -->
          <!-- method="POST" action="{{ route('login') }}" -->
          <form id="loginForm"  >
            @csrf
            <div class="mb-3">
              <input type="email" name="email" class="form-control"  placeholder="email">
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control"  placeholder="password">      
            </div>
            <div class="mb-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg mb-3">LOGIN</button>     
            </div>
          </form>    
          <!-- End login form Code -->
        </div>
      </div>
    </div>
        
  </div>
    
  <script>
    $(document).ready(function() {
      $('#loginForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
          url: "{{ route('login') }}",
          type: "POST",
          data: $(this).serialize(),
          success:function(data){
            console.log(data)
            localStorage.setItem('token', data.token_type+" "+data.access_token);
            window.location = "/"
          }
        });
      });
    });
  </script>
@endsection
