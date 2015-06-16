<!DOCTYPE html>
<html lang="en">
@include('layout.master.head')

<body id="page-top" class="index">

    @include('layout.master.navigation')


    @yield('content')



    @include('layout.master.footer')

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/cbpAnimatedHeader.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/freelancer.js') }}"></script>

    <!-- Custom JS Stuff -->
    @yield('customjsfiles')
    <script type="text/javascript">
        var csrf = $('meta[name=_token]').attr('content');

        $.ajaxSetup({
            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', csrf);
            }
        });

        @yield('customjs')
    </script>

</body>

</html>