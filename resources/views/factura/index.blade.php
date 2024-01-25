@extends('layouts.app')

@section('template_title')
    Factura
@endsection

@section('content')
<script src='{{asset('js/factura.js')}}'>
</script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Factura') }}
                            </span>

                             <div class="float-lefth">
                            <a class="btn btn-primary" href="{{ url('/productos') }}"> {{ __('Back') }}</a>
                        </div>
                        </div>
                    </div>

                    <div class="card-body">
             <div class="from-group">
              <label>nombre: </label>
              <p>{{ Auth::user()->name }} </p>
                   </div>
             <div class="from-group">
              <label>email: </label>
              <p>{{ Auth::user()->email }} </p>
                   </div>
   <input type="hidden" class='csrf_token' name="csrf_token"
                                                        value="{{ csrf_token() }}">
                                                </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>


									     <th>Productos</th>
                                         <th>Fecha</th>
										 <th>Cantidad</th>
										 <th>Valor unitario</th>
									     <th>Subtotal</th>
                                         <th>%Iva</th>
									     <th>ValorIva</th>
									     <th>TotalconIva</th>
									     <th></th>
                                    </tr>
                                </thead>
                                <tbody class='dtosfactura'>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
