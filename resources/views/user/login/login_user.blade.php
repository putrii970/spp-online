<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('users/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('users/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('users/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('users/css/style.css')}}">

    <title>Login Siswa</title>
  </head>
  <body>
  @if(\Session::has('alert'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Gagal</span>
        {{Session::get('alert')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
  @endif

  @if(\Session::has('alert-success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Berhasil</span>
        {{Session::get('alert-success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
         </button>
    </div>
  @endif

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 order-md-2">
          <img src="{{asset('users/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign In <strong>Siswa</strong></h3>
                  <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                </div>
                <form action="/loginPost" method="post">
                {{ csrf_field() }}
                  <div class="form-group first">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" class="form-control" id="nisn" required>
                  </div>
                  
                  
                  <div class="d-flex mb-3 align-items-center">
                   
                  </div>
                  <button type="submit" class="btn btn-pill text-white btn-block btn-primary" >Submit</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="{{asset('users/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('users/js/popper.min.js')}}"></script>
    <script src="{{asset('users/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('users/js/main.js')}}"></script>
  </body>
</html>