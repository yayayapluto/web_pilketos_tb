<style>
    .navtxt {
        color: gray;
        text-decoration: none;
        margin-right: 30px;
    }

    .navtxt:hover {
        color: #009DFF;
    }

    @media screen and (max-width: 600px) {
        .navtxt {
            font-size: 16px;
            width: 100px;
            margin-right: 0px
        }

        #logoosis {
            width: 52px;
            height: 52px;
        }
    }
</style>

<nav id="navbar" class="app-header navbar navbar-expand bg-body"
    style="position: fixed;width:100%; top: 0;box-shadow:10px; z-index:10;">
    <div class="container-fluid">

        <div class="col-md-6 text-md-start mb-3 mb-md-0">
            <a class="navbar-brand" href="www.smktarunabhakti.net" target="_blank">
                <img src="{{ asset('assets/logoTB/mpk-white-bg.png') }}" alt="Logo2" width="60" height="60"
                    class="d-inline-block align-text-middle">

                <img src="{{ asset('assets/logoTB/IMG_4425.PNG') }}" alt="Logo1" width="60" height="60"
                    class="d-inline-block align-text-middle" id="logoosis">
            </a>
        </div>

        <div class="col-md-6 text-md-end mb-3 mb-md-0">
            <ul class="justify-content-end d-flex">
                <li>
                    <a href="{{ route("landing") }}" style="text-decoration: none;">
                        <h5 class="navtxt">
                            Home
                        </h5>
                    </a>
                </li>
                <li>
                    <a href="{{ route("voting") }}" style="text-decoration:none;">
                        <h5 class="navtxt">
                            Kandidat
                        </h5>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>
