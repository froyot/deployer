<?php

namespace REBELinBLUE\Deployer\Http\Controllers\Resources;

use REBELinBLUE\Deployer\Http\Controllers\Controller;
use REBELinBLUE\Deployer\Http\Requests\StoreSharedFileRequest;
use REBELinBLUE\Deployer\Repositories\Contracts\SharedFileRepositoryInterface;

/**
 * Controller for managing files.
 */
class SharedFilesController extends Controller
{
    use ResourceController;

    /**
     * SharedFilesController constructor.
     *
     * @param SharedFileRepositoryInterface $repository
     */
    public function __construct(SharedFileRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created file in storage.
     *
     * @param StoreSharedFileRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreSharedFileRequest $request)
    {
        return $this->repository->create($request->only(
            'name',
            'file',
            'target_type',
            'target_id'
        ));
    }

    /**
     * Update the specified file in storage.
     *
     * @param int                    $file_id
     * @param StoreSharedFileRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($file_id, StoreSharedFileRequest $request)
    {
        return $this->repository->updateById($request->only(
            'name',
            'file'
        ), $file_id);
    }
}
