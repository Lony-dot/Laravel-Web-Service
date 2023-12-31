<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{

    private $category, $totalPage = 10;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Category $category, Request $request)
    {
        $categories = $this->category->getResults($request->name);

        return $categories;
    }

    public function show($id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Not Found'], 404);

        return response()->json($category);
    }

    public function store(StoreUpdateCategoryFormRequest $request) //store signifca que irá salvar uma informação
    {
        $category = $this->category->create($request->all());

        return response()->json($category, 201);
    }

    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Not Found'], 404);

        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Not Found'], 404);

        $category->delete();

        return response()->json(['success'], 204);
    }

    public function products($id)
    {
        if(!$category = $this->category->find($id))
            return response()->json(['error' => 'Not Found'], 404);

        $products = $category->products()->paginate($this->totalPage);

        return response()->json([
            'category' => $category,
            'products' => $products,
        ]);
    }
}


