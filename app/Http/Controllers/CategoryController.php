<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Session;

class CategoryController extends Controller
{

    public function show($id){

        $id = (int)$id;

        $category = Category::findOrFail($id);

        return view('categories.show',[
            'category' => $category,
            'categories' => Category::all(),
            'articles' => Article::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(3)
        ]);
    }

    public function getIndex()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    public function getAdd()
    {
        return view('categories.add');
    }

    public function postAdd(CategoryRequest $request)
    {
        Category::create($request->all());
        Session::flash('message', 'Успешно добавлено.');
        return redirect('/admin/categories');
    }

    public function getEdit($id)
    {
        $category = Category::findOrFail((int)$id);
        return view('categories.edit', ['category' => $category]);
    }

    public function postEdit(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail((int)$id);
        $category->update($request->all());
        Session::flash('message', 'Изменения успешно сохранены.');
        return redirect('/admin/categories');
    }

    public function getDel($id)
    {
        $id = (int)$id;

        $category = Category::findOrFail($id);

        //проверка на наличие статей с данной категорией, если статей нет, значит можно удалять
        try{
            Article::where('category_id', $id)->firstOrFail();
        }
        catch(\Exception $e){
            $category->delete();
            Session::flash('message', 'Успешно удалено.');
            return redirect('/admin/categories');
        }

        Session::flash('error', 'Данную категорию нельзя удалить, так как к ней привязаны статьи!');
        return redirect('/admin/categories');
    }

}