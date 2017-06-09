<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles = \App\Article::paginate(10);

      return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ArticlesRequest $request) // ArticlesRequest 사용 시에 파라미터 수정
    {
        // ArticlesRequest를 작성하면서 삭제
        // $rules = [
        //   'title' => ['required'],
        //   'content' => ['required', 'min:10']
        // ];

        // ArticlesRequest를 작성하면서 삭제
        // 에러 메세지 추가
        // \Validator::make()의 세번째 파라미터로
        // $messages = [
        //   'title.required' => '제목은 필수 입력 항목입니다.',
        //   'content.required' => '본문은 필수 입력 항목입니다.',
        //   'content.min' => '본문은 최소 :min글자 이상이 필요합니다.',
        // ];

        // $validator = \Validator::make($request->all(), $rules, $messages);

        // 트레이트 메서드 이용
        // $this->validate($request, $rules, $messages);
        // 부모 클래스에서 찾을 수 있다.
        // Illuminate\Foundation\Validation\ValidatesRequests 트레이트를 임포트
        // 이건 Controller.php 에서 불러온다.

        // if ( $validator->fails() ) {
        //   return back()->withErrors($validator)
        //                ->withInput();
        // }
        //
        // $article = \App\User::find(1)->articles()
        //                              ->create($request->all());

        $article = \App\User::find(1)->articles()->create($request->all());

        if (! $article) {
          return back()->with('flash_message', '글이 저장되지 않았습니다.')
                       ->withInput();
        }

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
