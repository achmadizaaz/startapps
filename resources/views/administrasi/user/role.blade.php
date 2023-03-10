@extends('layouts.administrasi')
@section('content')
<div class="container p-2 mb-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('failed'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ session('failed') }}
            <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="d-flex  justify-content-between mb-3 p-3">
            <h4>DAFTAR USER</h4>
            {{-- {{ $role }} --}}
        </div>
        <div class="card bg-light rounded-3 shadow">
            <div class="card-header d-flex justify-content-between align-middle bg-secondary-subtle">
                <h5>Data Pengguna</h5>
                <div class="text-end">
                    <a href="#" class="btn btn-md btn-info text-white">Kembali ke Daftar</a>
                    <a href="#" class="btn btn-md btn-success text-white">Tambah</a>
                    <button class="btn btn-primary btn-sm mt-2" id="tambah-role">
                        Add Field
                    </button>
                    <button class="btn btn-primary btn-sm mt-2" id="tambah-select">
                        Add Select
                    </button>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-2 border-end border-2 border-light">
                            <ul class="nav nav-pills flex-column mb-auto fw-bold" style="font-size:12px">
                                <li class="nav-item bg-secondary border-start border-3 border-secondary hover ">
                                    <a href="#" class="nav-link text-white ">
                                        Data Pengguna
                                    </a>
                                </li>
                                <li class="nav-item bg-dark border-start border-3 border-primary">
                                    <a href="#" class="nav-link text-white">
                                    Role Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="callout-info bg-secondary p-4 mb-3">
                                <div class="row">
                                    <div class="col-md-2 text-white">
                                        Nama Pengguna
                                    </div>
                                    <div class="col-md-4 text-white">
                                        User Unit
                                    </div>
                                    <div class="col-md-2 text-white">
                                        Alamat Email
                                    </div>
                                    <div class="col-md-4 text-white">
                                        alamat-email@unmerpas.ac.id
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                               
                                                <th>Role</th>
                                                <th>Unit Kerja</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div id="input-role">
                                                
                                            </div>

                                            {{-- <div id="input-select">
                                                <form action="">

                                                </form>
                                            </div> --}}
                                            
                                            
                                                <tr id="input-select">
                                                    <form action="" id="form-select">

                                                    </form>
                                                </tr>
                                            
                                            <tr>
                                                
                                                <td>Administrasi</td>
                                                <td>Universitas Merdeka Pasuruan</td>
                                                <td>Edit</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>Admin Sarpras</td>
                                                <td>Universitas Merdeka Pasuruan</td>
                                                <td>Edit</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <select class="js-example-basic-single" name="state">
                                @foreach ($roles as $role)
                                    <option value="$role->name">{{ $role->name  }}</option>
                                @endforeach
                              </select>
                        </div>
                 </div>
                 
        </div>
        
   </div>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>

    
      $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });


    let arrayRole = [
                    @foreach ($roles as $role)
                        [ "{{ $role->name }}" ], 
                    @endforeach
                ];
    


         let form = document.getElementById('form-select')

        let addSelect = document.getElementById('tambah-select');
        let optionSelect = document.getElementById('input-select');
        let countClick = 1;
        let countInput = 0;
        optionSelect.appendChild(form);

        addSelect.onclick = function () {
            if (countInput < 1) {

                let td = document.createElement('td')
                // tr.setAttribute('class', 'mb-2');
                // let td = document.createElement('td')
                let select = document.createElement("select");
                select.setAttribute('class', 'mt-2 form-select');
                select.setAttribute('id', 'select-' + countClick);
                select.setAttribute('data-placeholder', 'Choose one thing');
                optionSelect.appendChild(td);
                td.appendChild(select);
                // tr.appendChild(optionSelect);

                let selectInputField = document.getElementById("select-" + countClick)
                
                let option = document.createElement('option')
                selectInputField.add(option)
                for (let i = 0; i < arrayRole.length; i++) {
                    let option = document.createElement('option')
                    option.setAttribute('value', arrayRole[i])
                    option.text = arrayRole[i];
                    selectInputField.add(option, selectInputField[i])
                    // optionSelect.appendChild(option)
                }
                countClick++

                $(document).ready(function() {
                    $('.form-select').select2({
                        theme: 'bootstrap-5',
                        selectionCssClass: "select2--small",
                        dropdownCssClass: "select2--small",
                    });
                
                });
            }
            countInput++;
        }

                // Single Input

    // let tambahRole = document.getElementById("tambah-role");
    // let inputRole = document.getElementById("input-role");

    // let countInput = 0;

    //  tambahRole.onclick = function () {
    //         if (countInput < 1) {

    //             let tr = document.createElement('tr')
    //             let td

    //             let input = document.createElement("input");
    //             input.setAttribute("type", "text");
    //             input.setAttribute("name", "nama[]");
    //             input.setAttribute("class", "form-control mb-2");
    //             input.setAttribute("placeholder", "Hobi lainnya");
    //             tr.appendChild(input);
                
    //             inputRole.appendChild(tr)// 
                
    //             countInput++;
    //         }
    //     };


      


    </script>
@endsection