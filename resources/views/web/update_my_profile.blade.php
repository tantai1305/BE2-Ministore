<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="{{asset('frontend/js/modernizr.js')}}"></script>

    <style type="text/css">
        body { margin-top: 20px; color: #a9a9ad; }
        .bg-secondary-soft { background-color: rgba(208, 212, 217, 0.1) !important; }
        .rounded { border-radius: 5px !important; }
        .py-5 { padding-top: 3rem !important; padding-bottom: 3rem !important; }
        .px-4 { padding-right: 1.5rem !important; padding-left: 1.5rem !important; }
        .form-control { border: 1px solid #e5dfe4; border-radius: 5px; }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px" data-bs-smooth-scroll="true"
    tabindex="0">
    
    @extends('web.nav')
    @section('navbar')

    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>

    @elseif (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
    @endif

    <div class="container mb-5" style="padding-top: 5rem;">
        <div class="row">
            <div class="col-12">
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>

                <div class="col-xxl-3">
                    <div class="px-4 py-3 rounded">
                        <div class="square position-relative display-2 mb-3">
                            <img src="frontend/images/avt.jpg" alt="" style="width: 60%; height: auto">
                        </div>
                    </div>
                </div>

                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content profile-tab-cont">
                    <div class="tab-pane fade show active" id="per_details_tab">
                        <form method="POST" action="{{ route('update_profile', ['id' => auth()->user()->id]) }}">
                            @csrf
                            <div class="row mb-5 gx-5">
                                <div class="col-xxl-8 mb-5 mb-xxl-0">
                                    <div class="bg-secondary-soft px-4 py-5 rounded">
                                        <div class="row g-3">
                                            <h4 class="mb-4 mt-0">Contact detail</h4>
                                            <div class="row">
                                                <label class="form-label"><b>Full Name *</b></label>
                                                <input type="text" class="form-control" aria-label="Full Name" name="name" value="{{ auth()->user()->name }}" required>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="email" class="form-label"><b>Email *</b></label>
                                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg m-2">Update profile</button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('destroy_profile', ['id' => auth()->user()->id]) }}" onsubmit="return confirm('Are you sure you want to delete your profile?')">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger btn-lg m-2">Delete profile</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="password_tab">
                        <div class="row mb-5 gx-5 mt-2">
                            <div class="bg-secondary-soft px-4 py-3 rounded">
                                <div class="row g-3">
                                    <h4 class="my-4">Change Password</h4>
                                    <form method="POST" action="{{ route('change_password') }}">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="oldpass" class="form-label"><b>Old password *</b></label>
                                            <input type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" required value="{{ old('oldpass') }}">
                                            @error('oldpass')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="newpass" class="form-label"><b>New password *</b></label>
                                            <input type="password" class="form-control @error('newpass') is-invalid @enderror" name="newpass" required value="{{ old('newpass') }}">
                                            @error('newpass')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="confirmpass" class="form-label"><b>Confirm Password *</b></label>
                                            <input type="password" class="form-control @error('confirmpass') is-invalid @enderror" name="confirmpass" required value="{{ old('confirmpass') }}">
                                            @error('confirmpass')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-lg m-2">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html>
