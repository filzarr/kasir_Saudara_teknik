{{-- <div>
    <div class="d-flex justify-content-center position-absolute shadow">
        <div class="col-lg-8 bg-white">
            <ul>
                @foreach ($stok as $item)
                    
                <li class="head">Barang {{$item->nama}} tersisa {{$item->stok}} biji</li>
                @endforeach
             
            </ul>
        </div>
    </div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div> --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-body">
                <ul>
                    @foreach ($stok as $item)
                 <li><strong class="fw-bold">{{$item->nama}}</strong>  Tersisa <strong class="fw-bold">{{$item->stok}} Lagi</strong> </li>
                 @endforeach
                </ul>
            </div>
     
        </div>
    </div>
</div>