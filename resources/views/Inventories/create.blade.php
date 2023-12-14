<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="inventories"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 mt-3">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Agregar Inventario'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="card card-body mx-3 mx-md-4 mt-n0">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Complete los siguientes campos</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <!-- Mensaje de éxito o error si es necesario -->
                        @endif
                        @if (Session::has('demo'))
                        <!-- Mensaje de alerta si es necesario -->
                        @endif
                        <form method='POST' action='{{ route('inventories.store') }}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Producto:</label>
                                            <!-- Agregar un campo de selección para el producto -->
                                            <select id="" class="form-control border border-2 p-2" name="product_id">
                                                <option value="">Seleccione</option>
                                                <!-- Iterar a través de los productos -->
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Stock:</label>
                                            <input type="number" name="stock" class="form-control border border-2 p-2" value='{{ old('stock') }}'>
                                            @error('stock')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Proveedor:</label>
                                            <!-- Agregar un campo de selección para el proveedor -->
                                            <select id="" class="form-control border border-2 p-2" name="supplier_id">
                                                <option value="">Seleccione</option>
                                                <!-- Iterar a través de los proveedores -->
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark btn-hover-dark mt-3">Guardar</button>
                            <!-- Botón para cancelar y regresar al index de inventarios -->
                            <a href="{{ route('inventories.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>
</x-layout>
