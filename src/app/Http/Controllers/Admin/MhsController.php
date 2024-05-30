<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMhsRequest;
use App\Http\Requests\StoreMhsRequest;
use App\Http\Requests\UpdateMhsRequest;
use App\Models\Mhs;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MhsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mhs_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mhss = Mhs::with(['media'])->get();

        return view('admin.mhss.index', compact('mhss'));
    }

    public function create()
    {
        abort_if(Gate::denies('mhs_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mhss.create');
    }

    public function store(StoreMhsRequest $request)
    {
        $mhs = Mhs::create($request->all());


        return redirect()->route('admin.mhss.index');
    }

    public function edit(Mhs $mhs)
    {
        abort_if(Gate::denies('mhs_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mhss.edit', compact('mhs'));
    }

    public function update(UpdateMhsRequest $request, Mhs $mhs)
    {
        $mhs->update($request->all());


        return redirect()->route('admin.mhss.index');
    }

    public function show(Mhs $mhs)
    {
        abort_if(Gate::denies('mhs_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mhss.show', compact('mhs'));
    }

    public function destroy(Mhs $mhs)
    {
        abort_if(Gate::denies('mhs_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mhs->delete();

        return back();
    }

    public function massDestroy(MassDestroyMhsRequest $request)
    {
        $mhss = Mhs::find(request('ids'));

        foreach ($mhss as $mhs) {
            $mhs->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mhs_create') && Gate::denies('mhs_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Mhs();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
