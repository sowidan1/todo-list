<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\services\ApiResponseFormat;


class CategoryController extends Controller
{

    public $response;
    public function __construct()
    {
        $this->response = new ApiResponseFormat();
    }

    public function index()
    {
        $Categories = Category::all();
        return $this->response->success($Categories, 'Categories fetched successfully');
    }

    public function store(StoreCategoryRequest $request)
    {

        $Category = new Category([
            'name' => $request->validated()['name'],
            'description' => $request->validated()['description']
        ]);

        if ($Category->save()) {
            return $this->response->success($Category, 'Category created successfully');
        } else {
            return $this->response->error('Category could not be created', 500);
        }
    }

    public function destroy($id)
    {
        $Category = Category::find($id);
        if ($Category->delete()) {
            return $this->response->success($Category, 'Category deleted successfully');
        } else {
            return $this->response->error('Category could not be deleted', 500);
        }
    }
}
