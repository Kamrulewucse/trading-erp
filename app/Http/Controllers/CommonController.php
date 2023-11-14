<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSubCategory;
use App\Models\PurchaseInventory;
use App\Models\PurchaseOrderProduct;
use App\Models\SalesOrderProduct;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CommonController extends Controller
{
    public function payeeJson(Request $request)
    {
        if (!$request->searchTerm) {
            $accountHeads = AccountHead::where(function($query) {
                $query->where('account_head_type_id', 5)
                    ->orWhereNull('account_head_type_id');
            })
                ->whereNotNull('client_id')
                ->orWhereNotNull('employee_id')
                ->limit(20)
                ->get();
        } else {
            $accountHeads = AccountHead::whereNotNull('client_id')
                ->orWhereNotNull('employee_id')
                ->where('name', 'like','%' . $request->searchTerm.'%')
                ->limit(50)->get();
        }

        $data = array();

        foreach ($accountHeads as $accountHead) {
            $data[] = [
                'id' => $accountHead->id,
                'text' =>('Name:'.(employeeClientInfo($accountHead->id)->name ?? '').'|ID No:'.(employeeClientInfo($accountHead->id)->id_no ?? '')),
            ];
        }

        echo json_encode($data);
    }

    public function payeeJson1(Request $request)
    {
        if (!$request->searchTerm) {
            $accountHeads = AccountHead::where(function($query) {
                $query->where('account_head_type_id',4)
                    ->orWhereNull('account_head_type_id');
            })
                ->whereNotNull('client_id')
                ->orWhereNotNull('employee_id')
                ->limit(20)
                ->get();
        } else {
            $accountHeads = AccountHead::whereNotNull('client_id')
                ->orWhereNotNull('employee_id')
                ->where('name', 'like','%' . $request->searchTerm.'%')
                ->limit(50)->get();
        }

        $data = array();

        foreach ($accountHeads as $accountHead) {
            $data[] = [
                'id' => $accountHead->id,
                'text' =>('Name:'.(employeeClientInfo($accountHead->id)->name ?? '').'|ID No:'.(employeeClientInfo($accountHead->id)->id_no ?? '')),
            ];
        }

        echo json_encode($data);
    }

    public function getProduct(Request $request)
    {
        $product = Product::where('supplier_id', $request->supplierId)
            ->where('status', 1)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($product);
    }
    public function getSubCategory(Request $request)
    {
        $subcategory = ProductSubCategory::where('product_category_id', $request->categoryID)
            ->where('status', 1)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($subcategory);
    }

    public function getStock(Request $request)
    {
        $inventory = Inventory::where('product_category_id', $request->categoryId)
            ->where('product_sub_category_id', $request->subCategoryId)
            ->where('product_id', $request->productId)
            ->where('color_id', $request->colorId)
            ->where('size_id', $request->sizeId)
            ->where('warehouse_id', $request->warehouseId)
            ->first();

        //dd($request->all());

        return response()->json($inventory);
    }
    public function getProductDetails(Request $request)
    {
        $product =Product::with('unit')->where('id', $request->productID)->first();

        return response()->json([
            'product'=>$product,
        ]);
    }

    public function getEmployeeDetails(Request $request) {
        $employee = Employee::where('id', $request->employeeId)->with('department', 'designation')->first();

        return response()->json($employee);
    }

    public function getField(Request $request)
    {
        $fields = Designation::where('department_id', $request->divisionId)->get();
        return response($fields);
    }

    public function getFieldEdit(Request $request)
    {
        $fields = Designation::where('department_id', $request->departmentId)->get();
        return response($fields);
    }

    public function accountHeadCodeJson(Request $request)
    {
        if (!$request->searchTerm) {
            $accountHeads = AccountHead::where('status', 1)
                ->orderBy('id')
                ->limit(10)
                ->get();
        } else {
            $accountHeads = AccountHead::where('status', 1)
                ->where('account_code', 'like','%' . $request->searchTerm.'%')
                ->orWhere('name', 'like','%'.$request->searchTerm.'%')
                ->orderBy('account_code','asc')
                ->limit(50)
                ->get();
        }

        $data = array();

        foreach ($accountHeads as $accountHead) {
            $data[] = [
                'id' => $accountHead->id,
                'text' =>$accountHead->name.'|Code:'.$accountHead->account_code,
            ];
        }

        echo json_encode($data);
    }
    public function saleAccountHeadCodeJson(Request $request)
    {
        if (!$request->searchTerm) {
            $accountHeads = AccountHead::where('status', 1)->whereIn('account_head_type_id',[1,5])
                ->orderBy('id')
                ->limit(10)
                ->get();
        } else {
            $accountHeads = AccountHead::where('status', 1)
                ->whereIn('account_head_type_id',[1,5])
                ->where('account_code', 'like','%' . $request->searchTerm.'%')
                ->orWhere('name', 'like','%'.$request->searchTerm.'%')
                ->orderBy('account_code','asc')
                ->limit(50)
                ->get();
        }

        $data = array();

        foreach ($accountHeads as $accountHead) {
            $data[] = [
                'id' => $accountHead->id,
                'text' =>$accountHead->name.'|Code:'.$accountHead->account_code,
            ];
        }

        echo json_encode($data);
    }

    public function productJson(Request $request)
    {
        if (!$request->searchTerm) {
            $products = Product::where('product_type', 2)
                ->where('status', 1)
                ->where('quantity','>', 0)
                ->orderBy('name')
                ->limit(20)
                ->get();
        } else {
            $products = Product::where('product_type', 2)
                ->where('name', 'like','%'.$request->searchTerm.'%')
                ->where('quantity','>', 0)
                ->orderBy('name')
                ->limit(20)
                ->get();

        }
        $data = array();

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'text' =>$product->name.' - '.$product->unit->name ?? '',
            ];
        }

        echo json_encode($data);
    }
    public function finishProductJson(Request $request)
    {
        if (!$request->searchTerm) {
            $products = Product::where('product_type', 1)
                ->where('status', 1)
                ->orderBy('name')
                ->limit(20)
                ->get();
        } else {

            $products = Product::where('product_type', 1)
                ->where('status', 1)
                ->where('name', 'like','%'.$request->searchTerm.'%')
                ->orderBy('name')
                ->limit(20)
                ->get();

        }
        $data = array();

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'text' =>$product->name,
            ];
        }

        echo json_encode($data);
    }

    public function saleProductJson(Request $request)
    {
        if ($request->warehouse_id){
            if (!$request->searchTerm) {
                $products = Product::where('status',1)->orderBy('name', 'ASC')
                    ->limit(20)
                    ->get();
            } else {

                $products =Product::where('status',1)->orderBy('name', 'ASC')
                    ->where('name', 'like', '%' . $request->searchTerm . '%')
                    ->orWhere('code', 'like','%'.$request->searchTerm.'%')
                    ->limit(20)
                    ->get();

            }
        }
        $data = array();

        foreach ($products as $product) {
//            $stock_type = '';
//            if($product->stock_type=='1'){
//                $stock_type = 'Regular Type';
//            }else if($product->stock_type=='2'){
//                $stock_type = 'Low Type';
//            }else if($product->stock_type=='3'){
//                $stock_type = 'High Type';
//            }else if($product->stock_type=='4'){
//                $stock_type = 'Offer Type';
//            }else if($product->stock_type=='5'){
//                $stock_type = 'Reseller Type';
//            }
            $data[] = [
                'id' => $product->id,
                'text' =>$product->name.' - '.$product->code,
            ];
        }

        echo json_encode($data);
    }
    public function serviceProductJson(Request $request)
    {
        if ($request->warehouse_id){
            if (!$request->searchTerm) {
                $products = Inventory::where('warehouse_id',$request->warehouse_id)->where('quantity', '>', 0)
                    ->where('serial','!=',null)
                    ->limit(20)
                    ->get();
            } else {

                $products =Inventory::where('warehouse_id',$request->warehouse_id)->where('quantity', '>', 0)
                    ->where('serial','!=',null)
                    ->whereHas('product', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->searchTerm . '%');
                    })
                    ->orWhere('serial', 'like','%'.$request->searchTerm.'%')
                    ->limit(20)
                    ->get();

            }
        }
        $data = array();

        foreach ($products as $product) {
            $stock_type = '';
            if($product->stock_type=='1'){
                $stock_type = 'Regular Type';
            }else if($product->stock_type=='2'){
                $stock_type = 'Low Type';
            }else if($product->stock_type=='3'){
                $stock_type = 'High Type';
            }else if($product->stock_type=='4'){
                $stock_type = 'Offer Type';
            }else if($product->stock_type=='5'){
                $stock_type = 'Reseller Type';
            }
            $data[] = [
                'id' => $product->id,
                'text' =>$product->product->name.'-'.$stock_type.'('.$product->quantity.')',
            ];
        }

        echo json_encode($data);
    }

}
