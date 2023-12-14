<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="suppliers"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Proveedores"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @if (session('status'))
            <div class="row" >
                <div class="alert alert-success alert-dismissible text-white" style="max-width: 35rem;" role="alert">
                    <span class="text-sm">{{ Session::get('status') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                        data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
    
            <div class="d-flex justify-content-between mb-3 my-3">
                <form action="{{route('suppliers.index')}}" method="GET">
                    <div class="card">
                        <div class="input-group input-group-outline ">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </form>
                <div>
                    <a class="btn bg-gradient-dark mb-0" href="{{ route('suppliers.create') }}">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar nuevo Proveedor
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-18">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3">Tabla de Proveedores</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                ID</th>
                                            <th 
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                NOMBRE</th>      
                                            <th 
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                TELÉFONO</th>  
                                            <th 
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                NÚMERO DE WHATSAPP</th>
                                            <th 
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                SERVICIOS</th>       
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{$supplier->id}}</td>
                                            <td>{{$supplier->name}}</td>
                                            <td>{{$supplier->phoneNumber}}</td>
                                            <td>{{$supplier->whatsApp}}</td>
                                            <td>{{$supplier->products}}</td>
                                            <td class="align-middle">
                                                <form action="{{route('suppliers.destroy', $supplier->id)}}" method="POST">
                                                    <button type="button" class="btn bg-gradient-info btn-link" data-bs-toggle="modal" data-bs-target="#exampleModalMessage{{$supplier->id}}">
                                                        Ver
                                                    </button> 
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{route('suppliers.edit', $supplier->id)}}" data-original-title=""
                                                    title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-link"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>                                                         
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModalMessage{{$supplier->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detalles de Proveedor: <span id="supplierName"></span></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                                <div class="d-flex flex-column">
                                                                    <h6 class="mb-3 text-m">Nombre: <span id="modalSupplierName">{{$supplier->name}}</span></h6>
                                                                    <h6 class="mb-2 text-sm">Teléfono: <span id="modalSupplierPhone" class="opacity-9"> {{$supplier->phoneNumber}}</span></h6>
                                                                    <h6 class="mb-2 text-sm">WhatsApp: <span id="modalSupplierWhatsapp" class="opacity-9">{{$supplier->whatsApp}}</span></h6>
                                                                    <h6 class="mb-2 text-sm">Servicios: <span id="modalSupplierProducts" class="opacity-9">{{$supplier->products}}</span></h6>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="pagination-links">
                            {{$suppliers->links()}}
                        </div>
                    </div>                   
                </div>     
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

<script>
    // JavaScript para actualizar el modal con la información del proveedor al hacer clic en el botón
    const messageModalButtons = document.querySelectorAll('.message-modal-button');

    messageModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const supplierName = button.getAttribute('data-supplier-name');
            const supplierPhone = button.getAttribute('data-supplier-phone');
            const supplierWhatsapp = button.getAttribute('data-supplier-whatsapp');
            const supplierProducts = button.getAttribute('data-supplier-products');

            document.getElementById('supplierName').innerText = supplierName;
            document.getElementById('modalSupplierName').innerText = supplierName;
            document.getElementById('modalSupplierPhone').innerText = supplierPhone;
            document.getElementById('modalSupplierWhatsapp').innerText = supplierWhatsapp;
            document.getElementById('modalSupplierProducts').innerText = supplierProducts;
        });
    });
</script>
