<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Random blog pages</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{ route('welcome') }}">Random blog pages</a></h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>

                @auth
                    @if(Auth::user()->isCreator())
                        <li><a href="{{ url('posts') }}">My blogs</a></li>
                        <li><a href="{{ route('posts.create') }}">Create blog</a></li>
                    @endif
                    <li><a href="{{ route('profile.show') }}">Profile</a></li>
                    <li>
                        <a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="border-0">Logout</button>
                            </form>
                        </a>
                    </li>
                @endif
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 entries">

                    <div class="row">

                        @if($posts->count())

                            @foreach($posts as $post)

                                <div class="col-md-6 d-flex align-items-stretch">
                                    <article class="entry">

                                        <div class="entry-img">
                                            @if($post->image)
                                                <img src="{{ url('storage/'.$post->image) }}" alt="Random image" class="img-fluid"/>
                                            @else
                                                <img src="{{ asset('assets/img/blog-1.jpg') }}" alt="Random image" class="img-fluid">
                                            @endif
                                        </div>

                                        <h2 class="entry-title">
                                            <a href="{{ route('posts.show', [$post->id]) }}">{{ $post->title }}</a>
                                        </h2>

                                        <div class="entry-meta">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a>{{ $post->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a><time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time></a></li>
                                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a>{{ $post->comments->count() }}</a></li>
                                                @if(!$post->active)
                                                    <li class="d-flex align-items-center"><i class="icofont-calendar"></i> <a>{{ __('Blog is being moderated') }}</a></li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="entry-content">
                                            <p>
                                                {!! $post->description !!}
                                            </p>

                                            <div class="row">
                                                <div class="read-more mr-2">
                                                    <a href="{{ route('posts.show', [$post->id]) }}">Read More</a>
                                                </div>

                                                @if($owner_page)
                                                    <div class="read-more mr-2">
                                                        <a href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </article><!-- End blog entry -->
                                </div>

                            @endforeach

                        @endif

                    </div>

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Random blog pages</h3>
                    <p>
                        <strong>Phone:</strong> <a href="tel:+380500200254">+38 050 020 0254</a><br>
                        <strong>Email:</strong> <a href="mailto:tarverdiev03041998timur@gmail.com">tarverdiev03041998timur@gmail.com</a><br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Don't touch 1</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Don't touch 2</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Don't touch 3</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>Random blog pages</span></strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
