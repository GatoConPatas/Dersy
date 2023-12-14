<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="inventories"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Inventarios"></x-navbars.navs.auth>
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
                <form action="{{route('categories.index')}}" method="GET">
                    <div class="card">
                        <div class="input-group input-group-outline ">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </form>
                <div>
                    <!-- Button to add a new inventory -->
                    <a class="btn bg-gradient-dark mb-0" href="{{ route('inventories.create') }}">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3">Tabla de Inventarios</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                PRODUCTO</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                STOCK</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                PROVEEDOR</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-30">
                                                    ACTUALIZACIÓN</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->id }}</td>
                                            <td>{{ $inventory->product->name }}</td>
                                            <td>{{ $inventory->stock }}</td>
                                            <td>
                                                @if ($inventory->supplier)
                                                    {{ $inventory->supplier->name }}
                                                @else
                                                    Sin proveedor
                                                @endif
                                            </td>
                                            <td>{{date('d-m-Y',strtotime( $inventory->created_at))}}</td>
                                            <td class="align-middle">
                                                <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('inventories.edit', $inventory->id) }}" data-original-title=""
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination for inventories if needed -->
                    <!-- Example: {{$inventories->links()}} -->
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
