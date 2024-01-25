<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class FacturaController
 * @package App\Http\Controllers
 */
class FacturaController extends Controller
{

    public function index()
    {

        return view('factura.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $userId = Auth::id();
        $fechaActual = Carbon::now();
        $fechaFormateada = $fechaActual->toDateString();

        $factura = Factura::where('id_producto', $data['id_producto'])
            ->where('id_cliente', $userId)
            ->first();

        if ($factura) {
            $cantidad = $factura->cantidad + 1;
            $subtotal = $data['valor_unitario'] * $cantidad;
            $factura->update([
                'cantidad' => $cantidad,
                'subtotal' => $subtotal,
            ]);
        } else {
            $cantidad = 1;
            $defaultiva = 19 / 100;
            $subtotal = $data['valor_unitario'] * $cantidad;

            $nuevaFactura = new Factura([
                'id_producto' => $data['id_producto'],
                'id_cliente' => $userId,
                'cantidad' => $cantidad,
                'fecha' => $fechaFormateada,
                'impuesto' => $defaultiva,
                'subtotal' => $subtotal,
            ]);

            $nuevaFactura->save();
        }

        return response()->json(['mensaje' => 'Operación realizada con éxito']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function listdata()
    {
        $resultado = DB::table('factura as F')
            ->select(
                'F.id',
                'F.fecha',
                'F.cantidad',
                DB::raw('CAST(F.impuesto * 100 AS UNSIGNED) AS iva'),
                'P.nombre as productos',
                'U.name as cliente',
                'P.valor_unitario',
                'F.subtotal',
                DB::raw('(F.subtotal * F.impuesto) as valorIva'),
                DB::raw('(F.subtotal * F.impuesto + F.subtotal) as totaconliva')
            )
            ->join('productos as P', 'P.id', '=', 'F.id_producto')
            ->join('users as U', 'U.id', '=', 'F.id_cliente')
            ->get();
        return response()->json(['facturas' => $resultado]);

    }

    public function update(Request $request)
    {$idFactura = $request->input('idfactura');
        if ($request->has('cantidad')) {
            $nuevaCantidad = $request->input('cantidad');
            $subtotal = $request->input('valor_unitario') * $nuevaCantidad;
            Factura::where('id', $idFactura)->update(['cantidad' => $nuevaCantidad, 'subtotal' => $subtotal]);
            return response()->json(['mensaje' => 'cantidad actualizada  con éxito']);
        }
        if ($request->has('porcentaje')) {

            $nuevoPorcentaje = $request->input('porcentaje') / 100;
            Factura::where('id', $idFactura)->update(['impuesto' => $nuevoPorcentaje]);
            return response()->json(['mensaje' => 'impuesto actualizado con éxito']);
        }

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factura = Factura::find($id)->delete();
        return response()->json(['mensaje' => 'producto eliminado con éxito']);
    }

    public function cantidadproductos()
    {

        $userId = Auth::id();

        $cantidad = Factura::where('id_cliente', $userId)
            ->whereDate('fecha', now()->toDateString())
            ->count('id_producto');

        return response()->json(['cantidad' => $cantidad]);
    }

}
