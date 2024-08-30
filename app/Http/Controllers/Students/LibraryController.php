<?php

namespace App\Http\Controllers\Students;

use Exception;
use App\Models\Grade;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Traits\AttachFilesTrait;
use App\Http\Requests\StoreLibraryRequest;
use App\Repository\LibraryRepositoryInterface;

class LibraryController extends Controller
{

    use AttachFilesTrait;
    protected $library;

    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library = $library;
    }

    public function index()
    {
        return $this->library->index();
    }

    public function create()
    {
        return $this->library->create();
    }

    public function store(StoreLibraryRequest $request)
    {
        return $this->library->store($request);
    }

    public function edit($id)
    {
        return $this->library->edit($id);
    }

    public function books($grade, $classroom)
    {
        return $this->library->books($grade, $classroom);
    }

    public function update(Request $request)
    {
        return $this->library->update($request);
    }


    // public function destroy(Request $request)
    // {
    //     return $this->library->destroy($request);
    // }

    public function destroy($id)
    {
        return $this->library->destroy($id);
    }


    public function downloadAttachment($filename)
    {
        return $this->library->download($filename);
    }

    public function viewAttachment($file_name)
    {
        return $this->library->viewAttachment($file_name);
    }
}
