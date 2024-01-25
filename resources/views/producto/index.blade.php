@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <script src="{{asset('js/productos.js')}}">

    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right">
                    <a href="{{url('/factura')}}" type="button" class="btn btn-primary position-relative">
                        productos agreagdos a la factura
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            id="cantidad">

                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>


                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Valor Unitario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ number_format($producto->valor_unitario) }}</td>

                                            <td>
                                                <button type="button" class="btn btn-info"
                                                    onclick="AgregaProductoFactura('{{ $producto->id }}','{{ $producto->valor_unitario }}')">
                                                    comprar
                                                    <input type="hidden" class='csrf_token' name="csrf_token"
                                                        value="{{ csrf_token() }}">
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
