<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ClienteDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateClienteRequest;
use App\Http\Requests\Admin\UpdateClienteRequest;
use App\Repositories\Admin\ClienteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClienteController extends AppBaseController
{
    /** @var ClienteRepository $clienteRepository*/
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param ClienteDataTable $clienteDataTable
     *
     * @return Response
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('admin.clientes.index');
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente agregado correctamente.');

        return redirect(route('admin.clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('admin.clientes.index'));
        }

        return view('admin.clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('admin.clientes.index'));
        }

        return view('admin.clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param int $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('admin.clientes.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('Cliente actualizado correctamente.');

        return redirect(route('admin.clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('admin.clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Cliente eliminado correctamente.');

        return redirect(route('admin.clientes.index'));
    }
}
