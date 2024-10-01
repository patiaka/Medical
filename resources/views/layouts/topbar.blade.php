<style>
    /* Changez cette couleur selon vos besoins */
    .bg-custom {
        background-color: #15477d;
    }


    .fas {
        font-size: 1.5rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        color: #ffffff;
    }


    .sidepanel-toggler svg {
        fill: #ffffff;
    }

    .app-user-dropdown img {
        border: 2px solid #ffffff;
    }

    .dropdown-menu {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    .dropdown-item {
        color: #333333;
    }

    .dropdown-item:hover {
        background-color: #007bff;
        color: #ffffff;
    }

    .dropdown-divider {
        border-top: 1px solid #e9ecef;
    }
</style>
<div class="app-header-inner bg-custom">
    <div class="container-fluid py-2">
        <div class="app-header-content">
            <div class="row justify-content-between align-items-center">

                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                            role="img">
                            <title>Menu</title>
                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"
                                d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                    </a>
                </div><!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div><!--//col-->

                <div class="app-utilities col-auto">

                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle no-loading" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
                            role="button" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="user profile"
                                style="border-radius: 50% "></a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                {{-- Log out Form --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                                {{-- <a class="dropdown-item" href="login.html">Log Out</a></li> --}}
                        </ul>
                    </div><!--//app-user-dropdown-->
                </div><!--//app-utilities-->
            </div><!--//row-->
        </div><!--//app-header-content-->
    </div><!--//container-fluid-->
</div><!--//app-header-inner-->
