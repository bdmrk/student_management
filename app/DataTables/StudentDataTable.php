<?php

namespace App\DataTables;

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
//        return $this->datatables
//            ->eloquent()
//            ->make(true);
//        ->editColumn('receiver_number', function ($smsLog) {
//        return stringReplaceWithSymbol($smsLog->receiver_number,'*');
//    })
//        ->editColumn('message_body', function ($smsLog) {
//            return replaceNumberFromString($smsLog->message_body,'*');
//        })


        $dataTable = new EloquentDataTable($this->query());
        $dataTable->addColumn('program', function ($student) {
            return $student->program->program_name;
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
//                    ->addAction(['width' => '80px'])
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
            'created_at',
            'updated_at'
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
