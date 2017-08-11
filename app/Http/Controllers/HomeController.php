<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\Interfaces\PaginatorFactoryInterface;
use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\Ad;

class HomeController extends Controller
{
    const AD_PAGE_COUNT = 5;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        PaginatorFactoryInterface $paginator_factory,
        AdRepositoryInterface $ad_repository,
        UserRepositoryInterface $user_repository
    ) {
        $page = $request->query('page', 1);
        $ads = $ad_repository->getPage(self::AD_PAGE_COUNT, $page);
        $ads_total_count = $ad_repository->getCount();

        $ad_page = $paginator_factory->create(
            $ads, $ads_total_count, self::AD_PAGE_COUNT, $page
        );

        $users_ids = $this->getAttributes($ads, Ad::ATTR_USER_ID);
        $users = $user_repository->getByIds(array_unique($users_ids));
        $users = $this->toAssoc($users, User::ATTR_ID);

        return view('home.index', [
            'ad_page' => $ad_page,
            'users' => $users
        ]);
    }

    protected function toAssoc($items, $attr)
    {
        $res = [];
        foreach ($items as $item) {
            $res[$item->$attr] = $item;
        }
        return $res;
    }

    protected function getAttributes($items, $attr)
    {
        $res = [];
        foreach ($items as $item) {
            $res[] = $item->$attr;
        }
        return $res;
    }
}
