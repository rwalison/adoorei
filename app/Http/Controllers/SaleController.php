<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Listar
    public function index()
    {
        $sales = Sale::with('products')->select('id', 'amount')->get();
        return response()->json($sales);
    }

    // Mostrar
    public function show($id)
    {
        $sales = Sale::where('id', $id)->with('products')->select('id', 'amount')->get();
        return response()->json($sales);
    }

    // Adicionar
    public function store(Request $request)
    {
        // Cria a venda
        $sale = new Sale();
        $sale->amount = 0;

        // Salva a venda para obter o ID
        $sale->save();

        // Calcula e define o valor total da venda
        $totalAmount = 0;
        foreach ($request->products as $productData)
        {
            $product = Product::find($productData['id']);

            if ($product)
            {
                $saleProduct = new SaleProduct();
                $saleProduct->sale_id = $sale->id;
                $saleProduct->product_id = $product->id;
                $saleProduct->name = $product->name;
                $saleProduct->price = $product->price;
                $saleProduct->description = $product->description;
                $saleProduct->amount = $productData['amount'];
                $saleProduct->save();

                // Incrementa o valor total da venda
                $totalAmount += $product->price * $productData['amount'];
            }
        }

        // Atualiza o valor total da venda
        $sale->amount = $totalAmount;
        $sale->save();

        return response()->json(['message' => 'Venda criada com sucesso', 'sale_id' => $sale->id], 201);
    }

    // Atualizar
    public function update(Request $request, $saleId)
    {
        $sale = Sale::findOrFail($saleId);

        foreach ($request->products as $productData)
        {
            $product = Product::find($productData['id']);

            if ($product) {
                $saleProduct = SaleProduct::updateOrCreate(
                    ['sale_id' => $saleId, 'product_id' => $product->id],
                    [
                        'name' => $product->name,
                        'price' => $product->price,
                        'description' => $product->description,
                        'amount' => $productData['amount']
                    ]
                );
            }
        }

        // Recalcula o valor total da venda
        $sale->amount = SaleProduct::where('sale_id', '=', $saleId)
            ->selectRaw('SUM(price * amount) as total')
            ->first()
            ->total;

        $sale->save();

        return response()->json(['message' => 'Venda atualizada com sucesso'], 200);
    }

    // Remover
    public function destroy($saleId)
    {
        $sale = Sale::findOrFail($saleId);

        // Remove os produtos da venda
        $sale->products()->detach();

        // Remove a venda
        $sale->delete();

        return response()->json(['message' => 'Venda cancelada']);
    }
}
