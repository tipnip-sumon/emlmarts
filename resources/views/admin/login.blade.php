<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        <link href="{{asset('assets/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <main>
            <header class="main-header style-2 navbar">
                <div class="col-brand">
                    {{Config::get('constants.site_name')}}
                </div>
                <div class="col-nav">
                    <ul class="nav">
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('assets/imgs/people/avatar-2.png')}}" alt="User" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <section class="content-main mt-80 mb-80">
                <div class="card mx-auto card-login">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sign in</h4>
                        
                        <form action="{{route('admin.auth')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" name="email" placeholder="Username or email" type="text" required/>
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                <input class="form-control" name="password" placeholder="Password" type="password" required/>
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" checked="" />
                                    <span class="form-check-label">Remember</span>
                                </label>
                            </div>
                            <!-- form-group form-check .// -->
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                            @if(!empty(Session::get('errors')))
                                <div class="mb-4 alert alert-danger" id="remove">
                                    {{Session::get('errors')}}
                                </div>
                            @endif
                            <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <script>
            setTimeout(() => {
                jQuery('#remove').fadeOut();
            }, 1000);
        </script>
        <script src="{{asset('assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
        <!-- Main Script -->
        <script src="{{asset('assets/js/main.js?v=1.1')}}" type="text/javascript"></script>
    </body>
</html>
