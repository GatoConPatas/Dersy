<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="suppliers"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Agregar Proveedor"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
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
                        <form method='POST' action='{{ route('suppliers.store') }}'>
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Nombre:</label>
                                    <input type="text" name="name" class="form-control border border-2 p-2"
                                        value='{{ old('name') }}'>
                                    <!-- Aquí puedes mostrar errores de validación -->
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Teléfono:</label>
                                    <input type="text" name="phoneNumber" class="form-control border border-2 p-2"
                                        value='{{ old('phoneNumber') }}'>
                                    <!-- Mostrar errores de validación si los hay -->
                                    @error('phoneNumber')
                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Número de WhatsApp:</label>
                                    <input type="text" name="whatsApp" class="form-control border border-2 p-2"
                                        value='{{ old('whatsApp') }}'>
                                    <!-- Mostrar errores de validación si los hay -->
                                    @error('whatsApp')
                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Productos o Servicios:</label>
                                    <input type="text" name="products" class="form-control border border-2 p-2"
                                        value='{{ old('products') }}'>
                                    <!-- Mostrar errores de validación si los hay -->
                                    @error('whatsApp')
                                        <p class='text-danger inputerror'>{{ $message }}</p>
                                    @enderror
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
    </main>
    <x-plugins></x-plugins>
</x-layout>
