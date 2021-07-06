<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Authentication</title>

    <!-- Bootstrap -->
    <link href="{{asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('template/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('template/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('template/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('template/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <h1>Login Form</h1>
              @if ($msg = Session::get('success'))
                    <div class="alert alert-success">
                           <button type="button" class="close" data-dismiss="alert"></button>
                           <strong>{{ $msg }}</strong>
                    </div>
              @endif
              @if ($msg = Session::get('er'))
                    <div class="alert alert-danger">
                           <strong>{{ $msg }}</strong>
                    </div>
              @endif
              @if ($msg = Session::get('error'))
                    <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert"></button>
                           <strong>{{ $msg }}</strong>
                    </div>
              @endif
              @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $er)
                                <div>{{ $er }}</div>
                            @endforeach
                    </div>
              @endif
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
              <div>
                <button class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum Punya Akun??
                  <a href="{{ route('register') }}" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>CMS-GIS</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>