<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UTD | Login</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />

  @include('layouts.css')

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
  <!-- loader Start -->
  {{-- <div id="loading">
  <div class="loader simple-loader">
    <div class="loader-body"></div>
  </div>
  </div> --}}
  <!-- loader END -->

  <div class="wrapper">
  <section class="login-content">
    <div class="row m-0 align-items-center bg-white vh-100">
    <div class="col-md-6">
      <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
        <div class="card-body">
          <a href="/"
          class="navbar-brand d-flex align-items-center mb-3">
          <!--Logo start-->
          <svg width="30" class="" viewBox="0 0 30 30" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
          </svg>
          <!--logo End-->
          <h4 class="logo-title ms-3">UTD Maros</h4>
          </a>
          <h2 class="mb-2 text-center">Log In</h2>
          <p class="text-center">Login to stay connected.</p>


          <form action="{{ route('login.proses') }}" method="POST">
          @csrf
          <div class="row justify-content-center">

          @if (Session::get('fail'))
          <div class="col-lg-8">
            <div class="alert alert-danger alert-solid alert-dismissible fade show p-2"
            role="alert">
            <span>{{ Session::get('fail') }}</span>
            <button type="button" class="btn-close btn-close-white btn-sm pb-2"
            data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          </div>
          @endif
            <div class="col-lg-8">
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email"
              aria-describedby="email" placeholder="" autocomplete="off" required>
            </div>
            </div>
            <div class="col-lg-8">
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control"
              id="password" aria-describedby="password" placeholder=" " required>

            </div>
            </div>

          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Sign In</button>
          </div>

          </form>
        </div>
        </div>
      </div>
      </div>
      <div class="sign-bg">
      <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g opacity="0.05">
        <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
          transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
        <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
          transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
        <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
          transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
        <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
          transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
        </g>
      </svg>
      </div>
    </div>
    <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
      <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX"
      alt="images">
    </div>
    </div>
  </section>
  </div>

  @include('layouts.js')
</body>

</html>
