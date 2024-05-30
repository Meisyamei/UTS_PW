<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDataRequest;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Data;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DataController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datas = Data::with(['media'])->get();

        return view('admin.datas.index', compact('datas'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datas.create');
    }

    public function store(StoreDataRequest $request)
    {
        $data = Data::create($request->all());

        

        return redirect()->route('admin.datas.index');
    }

    public function edit(Data $data)
    {
        abort_if(Gate::denies('data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datas.edit', compact('data'));
    }

    public function update(UpdateDataRequest $request, Data $data)
    {
        $data->update($request->all());

        return redirect()->route('admin.datas.index');
    }

    public function show(Data $data)
    {
        abort_if(Gate::denies('data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datas.show', compact('data'));
    }

    public function destroy(Data $data)
    {
        abort_if(Gate::denies('data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataRequest $request)
    {
        $datas = Data::find(request('ids'));

        foreach ($datas as $data) {
            $data->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('data_create') && Gate::denies('data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Data();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
