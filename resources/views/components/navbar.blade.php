<style>
 #te{
    margin-left: -10px;
    font-size: 13px;
    color: white;
 }
 #nav{
    height: 60px !important;
 }
 #not{
    margin-top: -8px !important;
 }
 #tek{
    margin-top: 1px !important;
    font-size: 25px !important;
    margin-left: 1rem !important;
 }

</style>
<nav class="navbar navbar-inverse fixed-top px-3" style="background-color: #b8a266 !important;" id="nav">

       <div class="container-fluid w-100">
           <div class="d-flex justify-content-between w-100 text-center align-center">
               <div class="text-center align-center d-flex" onclick="tutupsidebar()"><i class="bi bi-justify fs-3" style="color: white"></i><p class="text-center align-start" id="tek">Saudara Teknik</p></div>
               <div class="" id="not"><button class="btn" style="background-color:transparent" data-bs-toggle="modal"
                       data-bs-target="#exampleModal"><i class="bi bi-bell fs-3" style="color: white"></i><span class="align-top text-white"><i class="bi bi-circle-fill text-danger" id="notif"><span  id="te">1</span></i></span></button>
               </div>
           </div>
       </div>

   </nav>
   {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               
               <div class="modal-body">
                   <ul>
                    <li><strong class="fw-bold">Barang ini</strong>  Tersisa <strong class="fw-bold">3 Lagi</strong> </li>
                   </ul>
               </div>
        
           </div>
       </div>
   </div> --}}
 <x-alert-stok>
 </x-alert-stok>
       
   <script>
       function tutupsidebar() {
           let check = document.getElementById('side')
           let a = check.classList.contains('d-none')
           if (a) {
               check.classList.remove('d-none')
           } else {
               document.getElementById("side").classList.add('d-none')
           }
       }
   </script>
