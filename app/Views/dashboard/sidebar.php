<style>
    .sidebar {
        position: fixed;
        top: 60.5px;
        left: 60;

        width: 100px; /* Mengatur lebar sidebar */
        height: 100vh; /* Mengatur tinggi sidebar sesuai tinggi layar */
        background: linear-gradient(to bottom, #12AD2B, #5dd381);
        padding: 20px;
        z-index: 999;
    }

    .sidebar-item {
            margin-top: 10px;
            margin-bottom: 40px; /* Tambahkan jarak antara setiap item sidebar */
        }

    .content {
        margin-left: auto; /* Mengatur margin kiri agar konten tidak tertutupi oleh sidebar */
        padding: 20px;
    }

    .far , .fa-solid , .fas {
        color: black;
    }

   
</style>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item sidebar-item">
            <a class="nav-link" href="/dashboard/profile"><i class="far fa-user"></i></a>
        </li>
        <li class="nav-item sidebar-item">
            <a class="nav-link" href="/dashboard/order"><i class="fa-solid fa-basket-shopping"></i></a>
        </li>
        <li class="nav-item sidebar-item">
            <a class="nav-link" href="/dashboard/product"><i class="fa-solid fa-store"></i></a>
        </li>
        <li class="nav-item sidebar-item">
            <a class="nav-link" href="/dashboard/logout"><i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>
</div>

