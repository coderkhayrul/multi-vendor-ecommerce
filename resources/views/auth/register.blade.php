

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Register</title>

    <!-- vendor css -->
    <link href="{{ asset('backend') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bracket.css">
</head>

<body>

    <div class="row no-gutters flex-row-reverse ht-100v">
        <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
                <h4 class="tx-inverse tx-center">Sign Up</h4>
                <p class="tx-center mg-b-60">Create your own account.</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input value="{{ old('full_name') }}" name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Enter your Full Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->

                    <div class="form-group">
                        <select class="form-control" name="role" id="role">
                            <option value="1">Admin</option>
                            <option value="2">Vendor</option>
                            <option value="3">User</option>
                        </select>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->



                    <div class="form-group">
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->

                    <div class="form-group">
                        <input name ="password_confirmation" type="password" class="form-control" placeholder="Enter your Confirm Password">
                    </div><!-- form-group -->
                    <div class="form-group tx-12">By clicking the Sign Up button below you agreed to our privacy policy
                        and
                        terms of use of our website.</div>
                    <button type="submit" class="btn btn-info btn-block">Sign Up</button>

                </form>
                <div class="mg-t-60 tx-center">Already a member? <a href="{{ route('login') }}" class="tx-info">Sign
                        In</a></div>
            </div><!-- login-wrapper -->
        </div><!-- col -->
        <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
            <div class="wd-250 wd-xl-450 mg-y-30">
                <div class="signin-logo tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Khayrul <span
                        class="tx-info">Shanto</span> <span class="tx-normal">]</span></div>
                <div class="tx-white-7 mg-b-60">Register For User</div>

                <h5 class="tx-white">Why bracket plus?</h5>
                <p class="tx-white-6">When it comes to websites or apps, one of the first impression you consider is the
                    design. It needs to be high quality enough otherwise you will lose potential users due to bad
                    design.</p>
                <p class="tx-white-6 mg-b-60">When your website or app is attractive to use, your users will not simply
                    be using it, they’ll look forward to using it. This means that you should fashion the look and feel
                    of your interface for your users.</p>
                <a target="_blank" href="https://www.khayrulshanto.xyz"
                    class="btn btn-outline-light bd bd-white bd-2 tx-white pd-x-25 tx-uppercase tx-12 tx-spacing-2 tx-medium">Visit Portfolio</a>
            </div><!-- wd-500 -->
        </div>
    </div><!-- row -->

    <script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
    <script>
        $(function () {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });

    </script>

</body>

</html>
