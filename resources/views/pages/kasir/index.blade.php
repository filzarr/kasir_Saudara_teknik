@extends('layout.main')
@section('content')
    <form action="/kasir" method="post" class="form-horizontal form-label-left" novalidate>
        @csrf
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pembeli">Nama
                Pembeli</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama_pembeli" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                    data-validate-words="1" name="nama_pembeli" required="required" type="text">
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pembeli">Alamat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama_pembeli" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                    data-validate-words="1" name="alamat" required="required" type="text">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_beli">Tanggal
                Transaksi</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='myDatepicker2'>
                    <input type="date" name="tgl_beli" id="tgl_beli" class="form-control" required="required">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mt-2">
                <div class='input-group date' id='myDatepicker2'>
                    <select class="form-select" aria-label="Default select example" id="tipe">
                        <option selected>Pilih Harga</option>
                        <option value="hargaeceran">Harga Eceran</option>
                        <option value="hargagrosir">Harga Grosir</option>
                        <option value="hargaretail">Harga Retail</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mt-3">
                <div class='input-group date' id='myDatepicker2'>
                    <select class="form-select" aria-label="Default select example" name="jenispembayaran" onchange="bon()" id="jenispembayaran">
                        <option selected>Pilih Metode Pembayaran</option>
                        <option value="tunai">Tunai</option>
                        <option value="non-tunai">Non-Tunai</option>
                        <option value="belum-dibayar" >Belum Dibayar</option>
                    </select>
                </div>
            </div>
            <div class="d-none" id="bon">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jatuh_tempo">Tanggal
                    Jatuh Tempo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker2'>
                        <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="form-control" required="required" pattern="\d{4}-\d{2}-\d{2}" >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <table id="prod" class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" width="30%">Nama Barang</th>
                    <th style="text-align: center" width="15%">Satuan</th>
                    <th style="text-align: center" width="10%">Stok</th>
                    <th style="text-align: center">Harga</th>
                    <th style="text-align: center">jumlah</th>

                    <th style="text-align: center">Subtotal</th>
                    <th style="text-align: center">Aksi</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td style="text-align:right; vertical-align: middle" colspan="5">
                        <b>Grandtotal</b>
                    </td>
                    <td>
                        <input id="grandtotal2" type="text" class="form-control grandtotal" readonly>
                        <input id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" hidden>
                    </td>
                </tr>
                {{-- <tr>
                    <td style="text-align:right; vertical-align: middle" colspan="5">
                        <b>Bayar</b>
                    </td>
                    <td>
                        <input id="bayar" name="pembayaran" type="text" class="form-control grandtotal"
                            onchange="kembalian()">
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right; vertical-align: middle" colspan="5">
                        <b>Kembali</b>
                    </td>
                    <td>
                        <input id="kembalian"  type="text" class="form-control grandtotal" readonly>
                        <input id="kembali" name="kembalian" type="text" class="form-control grandtotal" hidden>
                    </td>
                </tr> --}}
            </tfoot>

            <tbody id="tbody">
                <tr role="row" class="1" id="trow">
                    <td>
                        <select required="required" style="width:100%;" class="form-control nama_obat" id="nama1"
                            name="nama[]" data-stok="#stok1" data-unit="#unit1" data-harga_jual="#harga_jual1"
                            onchange="coba()">

                            <option disabled selected value> </option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach

                            {{-- @foreach ($obat as $o)
                      
                  
                  <option value=" {{$o->id_obat}} "> {{$o->nama_obat}} </option>
                        @endforeach --}}
                        </select>
                    </td>
                    <td>
                        <input id="satuan1" name="stok[]" class="form-control stok" readonly="">
                        <input id="modal1" name="modal[]" class="form-control stok" hidden>
                    </td>
                    <td><input id="stok1" name="unit[]" class="form-control" readonly=""></td>
                    <td><input id="harga1" name="harga_jual[]" class="form-control harga_jual" readonly=""
                            onchange="hitung()">
                    </td>
                    <td><input type="number" id="jumlah1" name="jumlah[]" class="form-control jumlah"
                            required="required" onchange="hitung()">
                    </td>
                    <td><input id="subtotaltampil1"  class="form-control subtotal" readonly></td>
                    <td><input id="subtotal1" name="subtotal[]" class="form-control subtotal" hidden
                            onchange="hitungseluruh()"></td>
                    <td><button id="1" class="btn btn-danger btn-sm hapus" type="button" onclick="hapus(this)">
                            <span class="fa fa-trash"></span> Hapus</button>
                    </td>
                </tr>

        </table>


        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <a href=""><button type="button" class="btn btn-danger">Batal</button></a>
                <button id='addRow' class="btn btn-info" type="button" onclick="tambah()"><span
                        class="fa fa-plus"></span> Tambah Produk</button>
                <button id="send" type="submit" class="btn btn-success">Simpan</button>
                <button onclick="printDiv('prod')" class="btnprn btn">Print Preview</button>

            </div>
        </div>
    </form>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        setInterval(function() {

            hitung()
            coba()
            hitungseluruh()
            kembalian()

        }, 1000)
        function bon(){
                var jenis = document.getElementById("jenispembayaran").value
                if(jenis === String("belum-dibayar").valueOf()){
                    var bon = document.getElementById("bon")
                    bon.classList.remove("d-none")
                }else{
                    var bon = document.getElementById("bon")
                    bon.classList.add("d-none")
                }
            }
        // var uang = document.getElementById("bayar")
        var balek = document.getElementById("kembali")
        var balektampil = document.getElementById("kembalian")
        balek.addEventListener("keyup", function(e) {
            balektampil.value = formatRupiah(balek.value, "Rp. ");
        });
        // uang.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            // uang.placeholder = formatRupiah(this.value, "Rp. ");
        // });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        function tambah() {

            let a = document.querySelectorAll("#trow")

            setInterval(a.length, 100);
            let panjang = a.length + 1

            // let panjang = a.lenght
            var b = document.getElementById("trow");
            var baru = b.cloneNode(true)

            baru.querySelector("#harga1").id = 'harga' + panjang

            baru.querySelector("#nama1").id = 'nama' + panjang

            baru.querySelector("#stok1").id = 'stok' + panjang
            baru.querySelector("#subtotal1").id = 'subtotal' + panjang
            baru.querySelector("#subtotaltampil1").id = 'subtotaltampil' + panjang
            baru.querySelector("#jumlah1").id = 'jumlah' + panjang
            baru.querySelector("#modal1").id = 'modal' + panjang
            baru.querySelector("#satuan1").id = 'satuan' + panjang
            baru.querySelector(".hapus").id = panjang
            baru.className = panjang



            let bodya = document.getElementById("tbody");
            bodya.appendChild(baru)


            //   var childNodes = toDom(nama);
            // console.log(nama.length)





        }

        function kembalian() {
            let a = document.getElementById("bayar").value
            let uang = parseInt(a)
            let total = parseInt(document.getElementById("grandtotal").value)
            let kembali = uang - total
            if (kembali < 0) {
                var element = document.getElementById("uang");
                element.classList.remove("d-none");
                element.classList.add("d-flex");
            } else {

                document.getElementById("kembali").value = kembali
                balektampil.value = formatRupiah(balek.value, "Rp. ");
            }


        }

        function hitung() {
            let a = document.querySelectorAll("#trow")
            setInterval(a.length, 1000);
            let panjang = a.length
            for (let i = 1; i <= panjang; i++) {
                let id = "jumlah" + i
                let jual = "harga" + i
                let total = "subtotal" + i
                let tampil = "subtotaltampil" + i
                let stk = "stok" + i
                let jumlah = parseInt(document.getElementById(id).value)
                let satuan = document.getElementById(jual).value
                let stok = parseInt(document.getElementById(stk).value)
                if (jumlah > stok) {
                    document.getElementById(id).value = " "
                    document.getElementById(id).placeholder = " "
                    var element = document.getElementById("alert");
                    element.classList.remove("d-none");
                    element.classList.add("d-flex");
                } else {

                    let hasil = document.getElementById(id).value * satuan
                    document.getElementById(total).value = hasil
                    document.getElementById(tampil).value = formatRupiah(document.getElementById(total).value, "Rp. ");
                }
            }

        }

        function hapus(e) {
            e.parentNode.parentNode.remove();
        }

        function coba() {


            let a = document.querySelectorAll("#trow")
            let tipe = document.getElementById('tipe').value
            // console.log(tipe)
            setInterval(a.length, 100);
            let panjang = a.length
            for (let i = 1; i <= panjang; i++) {
                let id = "#nama" + i
                let stok = "#stok" + i
                let harga = '#harga' + i
                let unit = '#satuan' + i
                let modal = '#modal' + i

                $(id).each(function() {
                    var id = $(this).val();

                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: "{{ url('/detail-barang-') }}" + id,
                        success: function(data) {
                            document.querySelector(stok).placeholder = data.data.stok
                            document.querySelector(stok).value = data.data.stok
                            document.querySelector(unit).value = data.data.satuan
                            // document.querySelector(harga).value = data.data.hargaretail
                            // console.log(data.data.hargaeceran)
                            let tes = document.querySelector(harga)
                            let e = data.data.hargaeceran
                            let d = data.data.hargagrosir
                            let c = data.data.hargaretail

                            document.querySelector(modal).value = data.data.hargabeli
                            if (tipe.valueOf() === String("hargaeceran").valueOf()) {
                                tes.value = e
                            } else if (tipe.valueOf() === String("hargagrosir").valueOf()) {
                                tes.value = d
                            } else {
                                tes.value = c
                            }
                        }
                    });
                });


            }

        }

        function hitungseluruh() {
            let a = document.querySelectorAll("#trow")
            setInterval(a.length, 1000);
            let seluruh = 0;
            let panjang = a.length
            for (let i = 1; i <= panjang; i++) {
                let total = "subtotal" + i

                let jumlah = parseInt(document.getElementById(total).value)

                seluruh = seluruh + jumlah
                document.getElementById("grandtotal").value = seluruh
                document.getElementById("grandtotal2").value = formatRupiah(document.getElementById("grandtotal").value, "Rp. ");

            }
        }
    </script>
@endsection
