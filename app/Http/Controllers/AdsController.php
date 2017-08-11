<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Factories\Interfaces\AdFactoryInterface;

class AdsController extends Controller
{
    /**
     * @var AdFactoryInterface
     */
    protected $ad_factory;

    /**
     * @var AdRepositoryInterface
     */
    protected $ad_repository;

    /**
     * @var UserRepositoryInterface
     */
    protected $user_repository;

    /**
     * @param array $data
     */
    public function __construct(
        AdFactoryInterface $ad_factory,
        AdRepositoryInterface $ad_repository,
        UserRepositoryInterface $user_repository
    ) {
        $this->ad_factory = $ad_factory;
        $this->ad_repository = $ad_repository;
        $this->user_repository = $user_repository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = $this->ad_repository->getById((int) $id);
        if (!$ad) {
            return $this->notFoundResponse();
        }
        $author = $this->user_repository->getById($ad->getUserId());
        return view('ads.show', [
            'ad' => $ad,
            'author' => $author
        ]);
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

    /**
     * @return \Illuminate\Http\Response
     */
    protected function notFoundResponse()
    {
        return response('Not Found', 404);
    }
}
