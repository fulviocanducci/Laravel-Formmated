<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Utils\Convert;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $model;

    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->paginate(10);
        return view('person.index', compact('data'));
    }

    public function create()
    {
        return view('person.create-update');
    }

    public function edit($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            return view('person.create-update', ['data' => $data]);
        }
        return redirect()->route('person.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'value' => 'required|numeric_br',
            'birthday' => 'required|date_format:d/m/Y'
        ]);

        $data = $request->except(['id', '_token']);        
        $data['value'] = decimal_db($request->get('value'));
        $data['birthday'] = date_db($request->get('birthday'));
        $data['status'] = bool_db($request->get('status'));

        if ($id = $request->get('id')) {
            $model = $this->model->find($id);
            if ($model) {
                $model->fill($data);
                $model->save();
            }
        } else {
            $model = $this->model->create($data);
        }
        return redirect()->route('person.edit', ['id' => $model->id]);
    }
}
