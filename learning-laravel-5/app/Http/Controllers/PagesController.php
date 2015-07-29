<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    protected $catalog;

    function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }


    public function about()
    {
        $people = [
            'Eliz',
            'Anre',
            'Romn',
            'Sistr'
        ];

//        $people = [];

        return view("pages.about")->with(compact('people'));
    }

    public function contact()
    {
        return view("pages.contact");
    }

    public function all()
    {
        $catalog = $this->catalog->getAll();

        return view('pages.all', compact('catalog'));
    }
}
