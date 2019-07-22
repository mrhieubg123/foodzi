<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ImageProductRepository;

class ProductController extends Controller
{
	protected $categoryRepository;
    protected $brandRepository;
    protected $productRepository;
    protected $imageProductRepository;
    public function __construct(CategoryRepository $categoryRepository,BrandRepository $brandRepository,ProductRepository $productRepository,ImageProductRepository $imageProductRepository){
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository=$productRepository;
        $this->imageProductRepository=$imageProductRepository
        ;
    }
    //
    public function details($id){
        // todo
        $categories=$this->categoryRepository->getAll();
  		$brands=$this->brandRepository->getAll();
        $product=$this->productRepository->getById($id);
        $image=$this->imageProductRepository->getImg($id);
        return view('product.details',compact('product','categories','brands','image'));
    }
    public function cart(){
        // todo
        return view('product.cart');
    }
}
