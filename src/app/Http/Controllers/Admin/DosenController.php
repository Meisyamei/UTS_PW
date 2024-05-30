<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDosenRequest;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DosenController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dosen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosens = Dosen::with(['media'])->get();

        return view('admin.Dosen.index', compact('dosens'));
    }

    public function create()
    {
        abort_if(Gate::denies('dosen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.Dosen.create');
    }

    public function store(StoreDosenRequest $request)
    {
        $dosen = Dosen::create($request->all());


        return redirect()->route('admin.dosens.index');
    }

    public function edit(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dosens.edit', compact('dosen'));
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->all());


        return redirect()->route('admin.dosens.index');
    }

    public function show(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dosens.show', compact('dosen'));
    }

    public function destroy(Dosen $dosen)
    {
        abort_if(Gate::denies('dosen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dosen->delete();

        return back();
    }

    public function massDestroy(MassDestroyDosenRequest $request)
    {
        $dosens = Dosen::find(request('ids'));

        foreach ($dosens as $dosen) {
            $dosen->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dosen_create') && Gate::denies('dosen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Dosen();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
