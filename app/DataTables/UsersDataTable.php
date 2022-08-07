<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', 'users.action')
    //         ->setRowId('id');
    // }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at->format('Y-m-d');
            })
            ->addColumn('action', function ($row) {
                if (Gate::allows('user_update') || Gate::allows('user_access')) {
                    $action = '<button type="button" data-id=' . $row->id . ' data-jenis="edit"  class="btn btn-sm bg-primary action"><i class="fas fa-pencil-alt"></i></button>
                    ';
                }

                if (Gate::allows('user_delete')) {
                    $action .= ' <button type="button" data-id=' . $row->id . ' data-jenis="delete" class="btn btn-sm bg-danger action"><i class="fas fa-trash-alt"></i></button>';
                }
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        
        return $model->role('User')->newQuery(); // memanggil relasi di spatie
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1, 'asc')
            ->parameters([
                'dom'     => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'pdf', 'print'],
                'searchDelay' => 1000
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            // Column::make('id'),
            Column::make('DT_RowIndex')
                ->title('No')
                ->searchable(false)
                ->orderable(false)
                ->width(5)
                ->addClass('text-center'),
            Column::make('name')
                ->title('Nama')
                ->width(3),
            Column::make('email')
                ->width(3),
            Column::make('created_at')
                ->width(3),
            Column::make('updated_at')
                ->width(3),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(3),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
