<?php

namespace App\Repository;

interface LibraryRepositoryInterface
{

    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function books($grade, $classroom);

    public function update($request);

    public function destroy($request);

    public function download($filename);

    public function viewAttachment($file_name);

}
