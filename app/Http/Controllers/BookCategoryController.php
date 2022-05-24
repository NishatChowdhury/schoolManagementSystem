<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = BookCategory::all();
        return view('admin.bookCategory.index',compact('categories'));
    }


    public function store(Request $request)
    {
        BookCategory::query()->create($request->all());
        return redirect('admin/library/bookCategory');
    }

//    public function edit($id)
//    {
//        $repository = $this->repository;
//        $category=BookCategory::query()->findOrFail($id);
//        return view('admin.bookCategory.edit-category',compact('category','repository'));
//    }

    public function edit(Request $request)
    {
        $category = BookCategory::query()->findOrFail($request->get('id'));
        return view('admin/bookCategory/_edit',compact('category'));
}

    public function update($id, Request $request)
    {
        $data=BookCategory::query()->find($id);
        $data->update($request->all());
        return redirect('admin/library/bookCategory')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $book_categories = BookCategory::query()->findOrFail($id);
        $book_categories->delete();
        return redirect('admin/library/bookCategory');
    }
}
