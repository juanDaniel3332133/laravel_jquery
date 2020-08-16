<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.5.2-dist/css/bootstrap.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <meta name="csrf-token" content="{{csrf_token()}}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container my-4">

                <div class="row text-center text-muted">
                    <div class="col">
                        <h1>LARAVEL CRUD</h1>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col">
                        
                        <a id="showCategoriesModalBtn" class="btn btn-md btn-info float-left">Categorias</a>

                        <a id="createProductModalBtn" class="btn btn-md btn-primary float-right">Nuevo producto</a>

                    </div>
                </div>

                <table id="productsTable" class="table table-hover text-center">
                </table>

            </div>
        </div>

        {{-- product modals --}}

        <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        {{-- category modals --}}

        <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          @include('categories.create')
        </div>

        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        </div>

        <script src="{{ asset('plugins/jquery-3.5.1/jquery-3.5.1.min.js') }}"> </script>

        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"> </script>

        <script src="{{ asset('plugins/select2/select2.min.js') }}"> </script>

        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"> </script>

        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"> </script>

        <script src="{{ asset('plugins/bootstrap-4.5.2-dist/js/bootstrap.min.js') }}"> </script>

        <script src="{{asset('js/shared/helpers.js')}}"></script>

        <script src="{{asset('js/products/index.js')}}"></script>
        <script src="{{asset('js/products/create.js')}}"></script>
        <script src="{{asset('js/products/show.js')}}"></script>
        <script src="{{asset('js/products/edit.js')}}"></script>
        <script src="{{asset('js/products/delete.js')}}"></script>

        <script src="{{asset('js/categories/index.js')}}"></script>
        <script src="{{asset('js/categories/create.js')}}"></script>
        <script src="{{asset('js/categories/edit.js')}}"></script>
        <script src="{{asset('js/categories/delete.js')}}"></script>

    </body>
</html>
