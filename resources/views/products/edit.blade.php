<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="products"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 mt-3">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Editar Producto'></x-navbars.navs.auth>
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
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action='{{ route('products.update', $product->id) }}' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div>
                                                <img style="width: 200px" src="{{asset($product->image)}}" alt="">
                                            </div>
                                            <label for="" class="form-label">Imagen</label>
                                            <input type="file" class="form-control border border-3 p-2" name="image">
                                            @error('image')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nombre:</label>
                                            <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', $product->name) }}'>
                                            @error('name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Categoria</label>
                                            <select id="" class="form-control border border-2 p-2" name="category_id">
                                                <option value=""> Select</option>
                                                @foreach ($categories as $category)
                                                    <option {{$category->id == $product->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Descripción:</label>
                                            <input type="text" name="description" class="form-control border border-2 p-2" value='{{ old('description',$product->description)}}'>
                                            @error('description')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Precio de Compra</label>
                                            <input type="number" step="0.01" name="p_price" class="form-control border border-2 p-2" value='{{ old('p_price', $product->p_price)}}'>
                                            @error('p_price')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Precio de Venta</label>
                                            <input type="number" step="0.01" name="s_price" class="form-control border border-2 p-2" value='{{ old('s_price', $product->s_price) }}'>
                                            @error('s_price')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark btn-hover-dark mt-3">Guardar</button>
                            <a href="{{route('products.index')}}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
