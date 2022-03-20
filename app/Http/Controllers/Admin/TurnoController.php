<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TurnoDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateTurnoRequest;
use App\Http\Requests\Admin\UpdateTurnoRequest;
use App\Repositories\Admin\TurnoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TurnoController extends AppBaseController
{
    /** @var TurnoRepository $turnoRepository*/
    private $turnoRepository;

    public function __construct(TurnoRepository $turnoRepo)
    {
        $this->turnoRepository = $turnoRepo;
    }

    /**
     * Display a listing of the Turno.
     *
     * @param TurnoDataTable $turnoDataTable
     *
     * @return Response
     */
    public function index(TurnoDataTable $turnoDataTable)
    {
        return $turnoDataTable->render('admin.turnos.index');
    }

    /**
     * Show the form for creating a new Turno.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.turnos.create');
    }

    /**
     * Store a newly created Turno in storage.
     *
     * @param CreateTurnoRequest $request
     *
     * @return Response
     */
    public function store(CreateTurnoRequest $request)
    {
        $input = $request->all();

        $turno = $this->turnoRepository->create($input);

        Flash::success('Turno saved successfully.');

        return redirect(route('admin.turnos.index'));
    }

    /**
     * Display the specified Turno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turno = $this->turnoRepository->find($id);

        if (empty($turno)) {
            Flash::error('Turno not found');

            return redirect(route('admin.turnos.index'));
        }

        return view('admin.turnos.show')->with('turno', $turno);
    }

    /**
     * Show the form for editing the specified Turno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $turno = $this->turnoRepository->find($id);

        if (empty($turno)) {
            Flash::error('Turno not found');

            return redirect(route('admin.turnos.index'));
        }

        return view('admin.turnos.edit')->with('turno', $turno);
    }

    /**
     * Update the specified Turno in storage.
     *
     * @param int $id
     * @param UpdateTurnoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurnoRequest $request)
    {
        $turno = $this->turnoRepository->find($id);

        if (empty($turno)) {
            Flash::error('Turno not found');

            return redirect(route('admin.turnos.index'));
        }

        $turno = $this->turnoRepository->update($request->all(), $id);

        Flash::success('Turno updated successfully.');

        return redirect(route('admin.turnos.index'));
    }

    /**
     * Remove the specified Turno from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $turno = $this->turnoRepository->find($id);

        if (empty($turno)) {
            Flash::error('Turno not found');

            return redirect(route('admin.turnos.index'));
        }

        $this->turnoRepository->delete($id);

        Flash::success('Turno deleted successfully.');

        return redirect(route('admin.turnos.index'));
    }
}
