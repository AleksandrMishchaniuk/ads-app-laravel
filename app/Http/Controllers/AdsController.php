<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdFormRequest;
use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Factories\Interfaces\AdFactoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

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
        $ad = $this->ad_factory->create([]);
        $this->authorize('create', $ad);
        return view('ads.create', ['ad' => $ad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdFormRequest $request, Authenticatable $user)
    {
        $data = $request->input();
        $data['user_id'] = $user->getId();
        $ad = $this->ad_factory->create($data);
        $this->authorize('create', $ad);
        $this->ad_repository->save($ad);
        $request->session()->flash('notice', 'Ad was created');
        return redirect()->route('ad.show', ['id' => $ad->getId()]);
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
        $ad = $this->ad_repository->getById((int) $id);
        if (!$ad) {
            return $this->notFoundResponse();
        }
        $this->authorize('manage', $ad);
        return view('ads.edit', ['ad' => $ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdFormRequest $request, $id)
    {
        $ad = $this->ad_repository->getById((int) $id);
        if (!$ad) {
            return $this->notFoundResponse();
        }
        $this->authorize('manage', $ad);
        $ad->setTitle($request->input('title'));
        $ad->setDescription($request->input('description'));
        $this->ad_repository->save($ad);
        $request->session()->flash('notice', 'Ad was updated');
        return redirect()->route('ad.show', ['id' => $ad->getId()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ad = $this->ad_repository->getById((int) $id);
        if (!$ad) {
            return $this->notFoundResponse();
        }
        $this->authorize('manage', $ad);
        $this->ad_repository->destroyById($ad->getId());
        $request->session()->flash('notice', 'Ad was deleted');
        return back();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    protected function notFoundResponse()
    {
        return response('Not Found', 404);
    }
}
