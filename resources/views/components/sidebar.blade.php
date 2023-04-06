   <aside
        class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons   col-3"
        role="navigation" id="side" style="background-color: #4f4424 !important; widht: 100px !important; " >
        @if (auth()->user()->jabatan == 'superadmin')
            
        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->
         
            <a href="/dashboard" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-house-door-fill me-2 fs-4"></i><p class="mt-2">Dashboard</p></li>
            </a>
            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Barang</p></li>
            </a>
            <a href="/pengguna" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-people-fill me-2 fs-4"></i><p class="mt-2">Manajemen Pengguna</p></li>
            </a>
            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>
          
            <a href="/histori" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-clock-history me-2 fs-4"></i><p class="mt-2">Histori Data </p></li>
            </a>
            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>
       

       
            
           
        </ul>
        @elseif(auth()->user()->jabatan == 'admin')
        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->
         
            <a href="/dashboard" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-house-door-fill me-2 fs-4"></i><p class="mt-2">Dashboard</p></li>
            </a>
            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Barang</p></li>
            </a>
            <a href="/pengguna" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-people-fill me-2 fs-4"></i><p class="mt-2">Manajemen Pengguna</p></li>
            </a>
            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>
          
         
            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>
       

       
            
           
        </ul>

        @else
        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->
         
           
            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Manajemen Barang</p></li>
            </a>
          
            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>
          
         
            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>
       

       
            
           
        </ul>
        @endif
    </aside>
   