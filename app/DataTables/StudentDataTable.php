<?php

namespace App\DataTables;

use App\Helpers\Enum\StudentStatus;
use App\Models\Student;
use App\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function ajax()
    {


        $dataTable = new EloquentDataTable($this->query());
        $dataTable->addColumn('program', function ($student) {
            return $student->program->program_name;
        })->editColumn('action', function ($student) {
            $action = '';

            if ($student->status == StudentStatus::Applied) {
                $action = "<a title='Click to select student' class='btn btn-info btn-xs d-inline' href='".route('student.select', $student->id)."'>Select</a>";

            }

            if ($student->status == StudentStatus::Selected) {
                $action = "<a title='Click to admit student' class='btn btn-success btn-xs d-inline' href='".route('student.admitted', $student->id)."'>Admit</a>";

            }


            $action .= "<a title='Click to edit student' class='btn btn-warning btn-xs d-inline ' href='".route('students.edit', $student->id)."'> <span class=\"glyphicon glyphicon-edit icon\"></span></a>";

            $action .= "<a title='Click to see details' class='btn btn-success btn-xs d-inline ' href='".route('students.show', $student->id)."'><span class=\"glyphicon glyphicon-zoom-in icon\"></span></a>";
           if($student->status !== StudentStatus::Admitted){
               $action .= "<a title='Click to delete student' class='btn btn-danger btn-xs d-inline ' href='".route('student.delete', $student->id)."'> <span class=\"glyphicon glyphicon-trash icon\"></span></a>";
           }

            return $action;
        });

        return $dataTable->make(true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = Student::select('*')->with('program');

        return $this->applyScopes($users);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '130px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'full_name',
            'contact_number',
            'email',
            'program',
            'status',

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Student_' . date('YmdHis');
    }
}
