<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="clientes"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Clientes"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <!-- Mensajes de sesión -->
            @if (session('status'))
            <div class="row">
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
                    <a class="btn bg-gradient-dark mb-0" href="{{ route('clientes.create') }}">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar nuevo Cliente
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <!-- Encabezado de la tabla -->
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3">Tabla de Clientes</h5>
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
                                                APELLIDO</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                DNI</th>   
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                TELÉFONO</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Iteración de clientes -->
                                        @foreach ($clientes as $cliente)
                                        <tr>
                                            <!-- Datos del cliente -->
                                            <td>{{$cliente->id}}</td>
                                            <td>{{$cliente->name}}</td>
                                            <td>{{$cliente->apellido}}</td>
                                            <td>{{$cliente->dni}}</td>
                                            <td>{{$cliente->phoneNumber}}</td>
                                            <td class="align-middle">
                                                <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST">
                                                    <!-- Botones de acción -->
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{route('clientes.edit', $cliente->id)}}" data-original-title=""
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
                                        <!-- Modal para detalles del cliente -->
                                        <div class="modal fade" id="exampleModalMessage{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <!-- Contenido del modal -->
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Paginación -->
                    <div class="my-2">
                        <div class="pagination-links">
                            {{$clientes->links()}}
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
    // JavaScript para actualizar el modal con la información del cliente al hacer clic en el botón
    const messageModalButtons = document.querySelectorAll('.message-modal-button');

    messageModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Actualización de datos en el modal
        });
    });
</script>
