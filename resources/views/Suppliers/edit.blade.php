<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="suppliers"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 mt-3">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Editar Proveedor'></x-navbars.navs.auth>
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
                        <!-- Aquí puedes agregar mensajes de éxito o error si lo deseas -->
                        @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ session('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form method='POST' action='{{ route('suppliers.update', $supplier->id) }}'>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nombre:</label>
                                            <input type="text" name="name" class="form-control border border-2 p-2"
                                                value='{{ old('name', $supplier->name) }}'>
                                            <!-- Aquí puedes mostrar errores de validación -->
                                            @error('name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Teléfono:</label>
                                            <input type="text" name="phoneNumber"
                                                class="form-control border border-2 p-2"
                                                value='{{ old('phoneNumber', $supplier->phoneNumber) }}'>
                                            <!-- Mostrar errores de validación si los hay -->
                                            @error('phoneNumber')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Número de WhatsApp:</label>
                                            <input type="text" name="whatsApp" class="form-control border border-2 p-2"
                                                value='{{ old('whatsApp', $supplier->whatsApp) }}'>
                                            <!-- Mostrar errores de validación si los hay -->
                                            @error('whatsApp')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Productos o Servicios:</label>
                                            <input type="text" name="products" class="form-control border border-2 p-2"
                                                value='{{ old('products', $supplier->products) }}'>
                                            <!-- Mostrar errores de validación si los hay -->
                                            @error('whatsApp')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark btn-hover-dark mt-3">Guardar</button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </div>
    <x-plugins></x-plugins>
</x-layout>
