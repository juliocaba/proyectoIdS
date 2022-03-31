<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\InventarioDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateInventarioRequest;
use App\Http\Requests\Admin\UpdateInventarioRequest;
use App\Repositories\Admin\InventarioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InventarioController extends AppBaseController
{
    /** @var InventarioRepository $inventarioRepository*/
    private $inventarioRepository;

    public function __construct(InventarioRepository $inventarioRepo)
    {
        $this->inventarioRepository = $inventarioRepo;
    }

    /**
     * Display a listing of the Inventario.
     *
     * @param InventarioDataTable $inventarioDataTable
     *
     * @return Response
     */
    public function index(InventarioDataTable $inventarioDataTable)
    {
        return $inventarioDataTable->render('admin.inventarios.index');
    }

    /**
     * Show the form for creating a new Inventario.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.inventarios.create');
    }

    /**
     * Store a newly created Inventario in storage.
     *
     * @param CreateInventarioRequest $request
     *
     * @return Response
     */
    public function store(CreateInventarioRequest $request)
    {
        $input = $request->all();

        $inventario = $this->inventarioRepository->create($input);

        Flash::success('Producto agregado correctamente.');

        return redirect(route('admin.inventarios.index'));
    }

    /**
     * Display the specified Inventario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('admin.inventarios.index'));
        }

        return view('admin.inventarios.show')->with('inventario', $inventario);
    }

    /**
     * Show the form for editing the specified Inventario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('admin.inventarios.index'));
        }

        return view('admin.inventarios.edit')->with('inventario', $inventario);
    }

    /**
     * Update the specified Inventario in storage.
     *
     * @param int $id
     * @param UpdateInventarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventarioRequest $request)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('admin.inventarios.index'));
        }

        $inventario = $this->inventarioRepository->update($request->all(), $id);

        Flash::success('Inventario actualizado correctamente.');

        return redirect(route('admin.inventarios.index'));
    }

    /**
     * Remove the specified Inventario from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('admin.inventarios.index'));
        }

        $this->inventarioRepository->delete($id);

        Flash::success('Producto eliminado correctamente.');

        return redirect(route('admin.inventarios.index'));
    }
}
