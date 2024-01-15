@include('layout.header')

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="">
        <img src="{{ url("") }}/assets/img/logo-light.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">SmartLight</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('user.control.light') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">light</i>
            </div>
            <span class="nav-link-text ms-1">Light Control</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-danger w-100" href="{{ route("user.auth.logout") }}" type="button">Logout</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Light Control</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Light Control</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
           
            {{-- <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li> --}}
            <li class="nav-item d-flex align-items-center">
              <a href="{{ route('user.auth.logout') }}" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="site-content">
            <div class="row">
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $dt)
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">
                                    <div class="form-check form-switch d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="check_lamp{{ $i }}" @if ($dt==1) {{ "checked" }} @endif>
                                        
                                    </div>
                                </i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Status</p>
                                <h4 class="mb-0" id="status_lamp{{ $i }}"></h4>
                            </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                            <h5 class="mb-0">Lamp {{ $i }}</h5>
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const user_id = 1;
            const check_lamp1 = document.getElementById("check_lamp1");
            const check_lamp2 = document.getElementById("check_lamp2");
            const check_lamp3 = document.getElementById("check_lamp3");
            const check_lamp4 = document.getElementById("check_lamp4");
            const check_lamp5 = document.getElementById("check_lamp5");
            const check_lamp6 = document.getElementById("check_lamp6");
            const check_lamp7 = document.getElementById("check_lamp7");
            const check_lamp8 = document.getElementById("check_lamp8");
            const check_lamp9 = document.getElementById("check_lamp9");
            const check_lamp10 = document.getElementById("check_lamp10");

            document.addEventListener("DOMContentLoaded", function() {
                textShow(check_lamp1, "status_lamp1");
                textShow(check_lamp2, "status_lamp2");
                textShow(check_lamp3, "status_lamp3");
                textShow(check_lamp4, "status_lamp4");
                textShow(check_lamp5, "status_lamp5");
                textShow(check_lamp6, "status_lamp6");
                textShow(check_lamp7, "status_lamp7");
                textShow(check_lamp8, "status_lamp8");
                textShow(check_lamp9, "status_lamp9");
                textShow(check_lamp10, "status_lamp10");
            });
            //lamp1
            check_lamp1.addEventListener("change", function() {
                
                var lamp_status1 = 0;
                if (check_lamp1.checked) {
                    lamp_status1 = 1;
                }else{
                    lamp_status1 = 0;
                }
                const lamp_to = 1;
                lampFunction(user_id, lamp_to, lamp_status1, check_lamp1, "status_lamp1");
            });
            //lamp2
            check_lamp2.addEventListener("change", function() {
                var lamp_status2 = 0;
                if (check_lamp2.checked) {
                    lamp_status2 = 1;
                }else{
                    lamp_status2 = 0;
                }
                const lamp_to = 2;
                lampFunction(user_id, lamp_to, lamp_status2, check_lamp2, "status_lamp2");
            });

            //lamp3
            check_lamp3.addEventListener("change", function() {
                var lamp_status3 = 0;
                if (check_lamp3.checked) {
                    lamp_status3 = 1;
                }else{
                    lamp_status3 = 0;
                }
                const lamp_to = 3;
                lampFunction(user_id, lamp_to, lamp_status3, check_lamp3, "status_lamp3");
            });

            //lamp4
            check_lamp4.addEventListener("change", function() {
                var lamp_status4 = 0;
                if (check_lamp4.checked) {
                    lamp_status4 = 1;
                }else{
                    lamp_status4 = 0;
                }
                const lamp_to = 4;
                lampFunction(user_id, lamp_to, lamp_status4, check_lamp4, "status_lamp4");
            });

            //lamp5
            check_lamp5.addEventListener("change", function() {
                var lamp_status5 = 0;
                if (check_lamp5.checked) {
                    lamp_status5 = 1;
                }else{
                    lamp_status5 = 0;
                }
                const lamp_to = 5;
                lampFunction(user_id, lamp_to, lamp_status5, check_lamp5, "status_lamp5");
            });

            //lamp6
            check_lamp6.addEventListener("change", function() {
                var lamp_status6 = 0;
                if (check_lamp6.checked) {
                    lamp_status6 = 1;
                }else{
                    lamp_status6 = 0;
                }
                const lamp_to = 6;
                lampFunction(user_id, lamp_to, lamp_status6, check_lamp6, "status_lamp6");
            });

            //lamp7
            check_lamp7.addEventListener("change", function() {
                var lamp_status7 = 0;
                if (check_lamp7.checked) {
                    lamp_status7 = 1;
                }else{
                    lamp_status7 = 0;
                }
                const lamp_to = 7;
                lampFunction(user_id, lamp_to, lamp_status7, check_lamp7, "status_lamp7");
            });

            //lamp8
            check_lamp8.addEventListener("change", function() {
                var lamp_status8 = 0;
                if (check_lamp8.checked) {
                    lamp_status8 = 1;
                }else{
                    lamp_status8 = 0;
                }
                const lamp_to = 8;
                lampFunction(user_id, lamp_to, lamp_status8, check_lamp8, "status_lamp8");
            });

            //lamp9
            check_lamp9.addEventListener("change", function() {
                var lamp_status9 = 0;
                if (check_lamp9.checked) {
                    lamp_status9 = 1;
                }else{
                    lamp_status9 = 0;
                }
                const lamp_to = 9;
                lampFunction(user_id, lamp_to, lamp_status9, check_lamp9, "status_lamp9");
            });

            //lamp10
            check_lamp10.addEventListener("change", function() {
                var lamp_status10 = 0;
                if (check_lamp10.checked) {
                    lamp_status10 = 1;
                }else{
                    lamp_status10 = 0;
                }
                const lamp_to = 10;
                lampFunction(user_id, lamp_to, lamp_status10, check_lamp10, "status_lamp10");
            });

            function lampFunction(user_id, lamp_to, lamp_status, check_lamp, text_status_lamp){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "POST",
                    url: "/insert-request/" + user_id + "/" + lamp_to + "/" + lamp_status + "/Available",
                    success: function(response) {
                        textShow(check_lamp, text_status_lamp);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            function textShow(check_lamp, status_lamp){
                const contentElement = document.getElementById(status_lamp);
                if (check_lamp.checked) {
                    contentElement.style.color = "green";
                    contentElement.textContent = "ON";
                } else {
                    contentElement.style.color = "red";
                    contentElement.textContent = "OFF";
                }
            }

        </script>
        {{-- <footer class="site-footer">
            <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                    document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
                </div>
                <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </footer> --}}
    </div>
  </main>
  @include('layout.footer')