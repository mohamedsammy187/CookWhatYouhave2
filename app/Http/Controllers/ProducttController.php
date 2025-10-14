<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;


use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProducttController extends Controller
{
    # عرض فورم إضافة منتج
    public function AddProduct()
    {
        $user = Auth::user();
        $allcategories = Category::all();
        return view('layouts.products.addproduct', compact('allcategories'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'imagpath' => 'required|image|mimes:png,jpg,gif,jpeg|max:2048',
        ]);

        $newproduct = new Product();
        $newproduct->name = $request->name;
        $newproduct->price = $request->price;
        $newproduct->quantity = $request->quantity;
        $newproduct->description = $request->description;
        $newproduct->cat_id = $request->cat_id;

        // ✅ رفع الصورة وحفظها باسم unique
        if ($request->hasFile('imagpath')) {

            $imageName = time() . '.' . $request->imagpath->extension();
            $request->imagpath->move(public_path('assets/img'), $imageName);
            // ✅ حفظ المسار في قاعدة البيانات
            $newproduct->imagpath = 'assets/img/' . $imageName;
        }

        $newproduct->save();

        return redirect('/shop')->with('success', 'Product added successfully!');
    }


    # حذف منتج
    public function RemoveProduct($productid)
    {
        $product = Product::find($productid);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $product->delete();
        return redirect()->route('shop')->with('success', 'Product deleted successfully');
    }

    # عرض صفحة تعديل
    public function EditProduct($productid)
    {
        $product = Product::find($productid);
        if (!$product) {
            return redirect('/shop')->with('error', 'Product not found');
        }

        $categories = Category::all();
        return view('layouts.products.editproduct', compact('product', 'categories'));
    }

    # تحديث المنتج
    public function UpdateProduct(Request $request, $productid)
    {
        $product = Product::find($productid);

        if (!$product) {
            return redirect('/shop')->with('error', 'Product not found');
        }

        $request->validate([
            'name'     => 'required|max:50',
            'price'    => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'description' => $request->description,
            'cat_id'      => $request->cat_id,
        ]);

        if ($request->hasFile('imagpath')) {
            $imageName = time() . '.' . $request->imagpath->extension();
            $request->imagpath->move(public_path('assets/img'), $imageName);
            $product->imagpath = 'assets/img/' . $imageName;
            $product->save();
        }

        return redirect('/shop')->with('success', 'Product updated successfully!');
    }

    # تخزين مراجعة
    public function StoreReview(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'imagepath' => 'nullable|string',
        ]);

        Review::create($request->all());

        return redirect('/shop')->with('success', 'Review submitted!');
    }

    # البحث
    public function search(Request $request)
    {
        $key = $request->input('searchkey');
        $products = Product::where('name', 'LIKE', "%{$key}%")->paginate(4);

        return view('layouts.search', compact('products'));
    }

    public function productsTable()
    {
        $products = Product::all(); // ✅ send all rows
        return view('layouts.products.productstable', ['products' => $products]);
    }
}
