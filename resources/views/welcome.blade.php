@include('layout.header')
{{-- @php
    use Session;
@endphp --}}
<body class="bg-gray-200">
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-color: light;">
    <span class="mask opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0 pb-3">Login to Smartlight</h4>
                </div>
            </div>
            <div class="card-body">
                @if (($alertclass = Session::get('alertclass')) && ($message = Session::get('message')))
                    {{-- {{ $message }} --}}
                    <div class="alert alert-{{ $alertclass }} text-light alert-block">
                        {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="{{ route('user.auth.login') }}" method="POST" class="text-start">
                    @csrf
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                    </div>
                    {{-- <p class="mt-4 text-sm text-center">
                        Don't have an account?
                        <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
                    </p> --}}
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</main>
@include('layout.footer')