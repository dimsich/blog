<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Session;

class ArticleController extends Controller
{
    public function show($id){

        $id = (int)$id;

        $article = Article::findOrFail($id);

        return view('articles.show',[
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    public function getIndex()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function getAdd()
    {
        return view('articles.add', ['categories' => Category::getList()]);
    }

    public function postAdd(ArticleRequest $request)
    {

        $article = new Article($request->all());

        if(preg_match('/(img|src)=("|\')[^"\'>]+/i', $article->text))
        {
            $article->save();
        }
        else
        {
            $url = "http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".urlencode($article->name)."";
            $crl = curl_init();
            curl_setopt($crl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
            curl_setopt($crl, CURLOPT_URL, $url);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, 5);
            $images = curl_exec($crl);
            curl_close($crl);
            $data = json_decode($images);

            foreach ($data->responseData->results as $result) {
                $results[] = array('url' => $result->url, 'alt' => $result->title);
            }

            $article->text = "<img width=\"150\" src=\"".$results[0]['url']."\">".$article->text;
            $article->save();
        }

        Session::flash('message', 'Успешно добавлено.');
        return redirect('/admin/articles');
    }

    public function getEdit($id)
    {
        $article = Article::findOrFail((int)$id);
        return view('articles.edit',
            [
                'article' => $article,
                'categories' => Category::getList()
            ]);
    }

    public function postEdit(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail((int)$id);
        $article->update($request->all());
        Session::flash('message', 'Изменения успешно сохранены.');
        return redirect('/admin/articles');
    }

    public function getDel($id)
    {
        $article = Article::findOrFail((int)$id);
        $article->delete();
        Session::flash('message', 'Успешно удалено.');
        return redirect('/admin/articles');
    }
}