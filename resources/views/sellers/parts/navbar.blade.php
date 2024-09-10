<!-- Navbar start -->
<div class="container-fluid fixed-top" style="margin-bottom: 200px;">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Producti</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('seller.sellers.index') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('products.index') }}" class="nav-item nav-link active">My Products</a>
                    <a href="{{ route('soldProduct') }}" class="nav-item nav-link active">My Sold Products</a>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <a href="{{ route('products.create') }}" class="position-relative me-4 my-auto">
                        <i class="bi bi-plus-circle-fill fs-3"></i>
                    </a>
                    <form id="logout-form" action="{{ route('seller.logout') }}" method="post">
                        @csrf
                        <button type="submit" style="background:none;border:none;padding:0;cursor:pointer;">
                            <i class="fas fa-user fa-2x"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
