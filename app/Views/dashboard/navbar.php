<style>
    .navbar {
        position: fixed;
        top: 0;
        border: 0;
        bottom:auto;
        width: 100%;
        z-index: 999;
        background: linear-gradient(to right, #12ad2B, #5dd381);
        padding: 10px 20px;
    }

    .navbar .navbar-brand {
        font-size: 20px;
        color: #000 !important;
        font-weight: bold;
    }
    
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #12AD2B;">
    <a href="/dashboard" class="navbar-brand" href="/dashboard">MLI-GO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline" action="#" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Barang" aria-label="Search">
                    <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
