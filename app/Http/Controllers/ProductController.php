<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    Private $products;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index(): View
    {
        //toast('Success Toast','success')->autoClose(5000);

        $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['image'] = $this->productService->handleUploadedImage($data['image']);
        //$data['image'] = $this->productService->uploadImage($data['image']);

        Product::create($data);

        $postData = ['name' => $data['name'], 'detail' => $data['detail']];

        event(new PostCreated($postData));
        Alert::success('Success', 'Product created successfully.');

        return redirect()->route('products.index');
                        //->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

      //  $product = Product::find($id);

        if(!empty($data['image'])){

           $data['image'] = $this->productService->handleUploadedImage($data['image'], $product, 'update');

        }

        $product->update($data);

        Alert::success('Success', 'Product updated successfully.');

        return redirect()->route('products.index');
                        //->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        Alert::success('Success', 'Product deleted successfully.');

        return redirect()->route('products.index');
                        //->with('success','Product deleted successfully');
    }


}
