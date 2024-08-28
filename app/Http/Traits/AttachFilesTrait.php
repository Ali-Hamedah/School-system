<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

trait AttachFilesTrait
{

    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/', $folder . '/' . $file_name, 'upload_attachments');
    }

    public function deleteFile($modelClass, $id, $filePath, $fileNameColumn = 'file_name')
    {
        try {
            $record = $modelClass::findOrFail($id);
            $fullFilePath = public_path($filePath . $record->$fileNameColumn);
            if (File::exists($fullFilePath)) {
                File::delete($fullFilePath);
            }
            $record->delete();
           toastr()->success(trans('messages.success'));
        return redirect()->route('library.show');
        } catch (Exception $e) {
            Log::error('Failed to delete file or record: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => trans('messages.DeleteError')]);
        }
    }

}
