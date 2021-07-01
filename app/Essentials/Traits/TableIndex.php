<?php

namespace App\Essentials\Traits;

use Closure;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

trait TableIndex
{
    public function makeDatatable($query,
                                  $module,
                                  $formatCreatedAt = true,
                                  $status = false,
                                  Closure $customCallback = null,
                                  $customRawColumns = [],
                                  $moduleParams = [],
                                  $actionButtonsView = 'layouts.admin.partials.tables.action_buttons',
                                  $actionStatusView = 'layouts.admin.partials.tables.status_column',
                                  $displayActions = true)
    {
        $dataTable = DataTables::of($query);
        if ($status === true) {
            $dataTable = $dataTable
                ->addColumn('status', function ($record) use ($actionStatusView) {
                    return view($actionStatusView, ['statusValue' => $record->status]);
                });
        }
        if ($formatCreatedAt === true) {
            $dataTable->editColumn('created_at', function ($record) {
                return $record->created_at->format('d-m-Y');
            });
        }
        if ($displayActions === true) {
            $dataTable = $dataTable
                ->addColumn('actions', function ($record) use ($module, $moduleParams, $actionButtonsView) {
                    $moduleParams[Str::singular($module)] = $record;
                    return view($actionButtonsView, ['module' => $module, 'model' => $moduleParams]);
                });
        }
        if ($customCallback) {
            $dataTable = $customCallback($dataTable);
        }
        if ($displayActions === true) {
            $dataTable = $dataTable->rawColumns(array_merge(['actions'], $customRawColumns));
        } else {
            $dataTable = $dataTable->rawColumns($customRawColumns);
        }

        return $dataTable->make(true);
    }

    public function tableHtmlBuilder($htmlBuilder, $columns = null, $displayActions = true, $displayCreatedAt = true)
    {

        array_walk($columns, function ($options, $data) use ($htmlBuilder) {
            $htmlBuilder->addColumn(['data' => $data, 'name' => $data, 'title' => $options['title'], 'searchable' => $options['searchable'], 'orderable' => $options['orderable']]);
        });
        if ($displayCreatedAt == true) {
            $htmlBuilder
                ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('main.created_at'), 'searchable' => true, 'orderable' => true]);
        }
        if ($displayActions == true) {
            $htmlBuilder = $htmlBuilder->addColumn(['data' => 'actions', 'name' => 'actions', 'title' => __('main.actions'), 'searchable' => false, 'orderable' => false]);

        }
        $htmlBuilder = $htmlBuilder->parameters([
            'paging' => true,
            'searching' => true,
            'searchDelay' => 350,
            'language' => [
                'url' => (app()->getLocale() == 'ar') ? "//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json" : ''
            ]
        ]);
        return $htmlBuilder;

    }
}
