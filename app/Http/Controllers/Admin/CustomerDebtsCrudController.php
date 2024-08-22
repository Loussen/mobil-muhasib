<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerDebtsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class CustomerDebtsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerDebtsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CustomerDebts::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer-debts');
        CRUD::setEntityNameStrings('customer debts', 'customer debts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'customer_id',
            'attribute'   => 'full_name',
        ]);

        CRUD::column('tax');
        CRUD::column('social');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CustomerDebtsRequest::class);

        Widget::add()->type('script')->content('assets/js/admin/forms/customer_debts.js');

        CRUD::addField([
            'name'        => 'customer_id',
            'type'        => 'select2',
            'label'        => 'Müştəri',
            'allows_null' => true,
            'attribute'   => 'full_name',
        ]);
        CRUD::field('tax')->wrapper([
            'class' => 'form-group col-md-3'
        ]);
        CRUD::field('social')->wrapper([
            'class' => 'form-group col-md-3'
        ]);
        CRUD::addField([
            'name'     => 'status',
            'type'     => 'switch',
            'label'    => 'Ödəniş statusu',
            'color'    => 'primary',
            'onLabel'  => '✓',
            'offLabel' => '✕',
            'wrapper'  => ['class' => 'form-group col-md-3 pt-5'],
        ]);
        CRUD::addField([
            'name'        => 'payed_date',
            'type'        => 'datetime_picker',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        CRUD::addField([
            'name'            => 'additional',
            'label'           => 'Əlavə xərclər',
            'type'            => 'table',
            'entity_singular' => 'xərc',
            'columns'         => [
                'name'  => 'Adı',
                'desc'  => 'Açıqlaması',
                'price' => 'Məbləğ',
            ],
            'max' => 5,
            'min' => 0,
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
