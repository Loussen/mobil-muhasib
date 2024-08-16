<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomersRequest;
use App\Models\Customers;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Customers::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customers');
        CRUD::setEntityNameStrings('istifadəçi', 'İstifadəçi');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name')->label('Ad');
        CRUD::column('surname')->label('Soyad');
        CRUD::column('father_name')->label('Ata adı');
        CRUD::column('email')->label('Email');
        CRUD::column('phone')->label('Telefon nömrəsi');
        CRUD::column('fin')->label('Fin kod');
        CRUD::column('passport')->label('Seriya nömrəsi');
        CRUD::column('voen')->label('VOEN');

        CRUD::addButton('line', 'customer_info', 'view', 'buttons.customer_info','beginning');

        $this->addCustomCrudFilters();

        CRUD::enableDetailsRow();
        CRUD::setDetailsRowView('vendor.backpack.crud.details_row.customer_info');

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
        CRUD::setValidation(CustomersRequest::class);

        CRUD::field('name')->label('Ad')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('surname')->label('Soyad')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('father_name')->label('Ata adı')->wrapper(['class' => 'form-group col-md-4']);

        CRUD::field('fin')->label('Fin kod')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('passport')->label('Seriya nömrəsi')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('email')->label('Email')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::addField([
            'name'    => 'phone',
            'label'   => 'Telefon nömrəsi',
            'type'    => 'phone',
            'config'  => [
                'excludeCountries'      => ['us'],
                'initialCountry'        => 'az',
                'separateDialCode'      => true,
                'nationalMode'          => true,
                'autoHideDialCode'      => false,
                'placeholderNumberType' => 'MOBILE',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::field('voen')->label('VOEN')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('address')->type('textarea')->label('Ünvan')->wrapper(['class' => 'form-group col-md-6']);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

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

    protected function addCustomCrudFilters(): void
    {
        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Ad',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'name', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'surname',
                'label' => 'Soyad',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'surname', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'father_name',
                'label' => 'Ata adı',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'father_name', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'email',
                'label' => 'Email',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'email', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'phone',
                'label' => 'Telefon',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'phone', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'fin',
                'label' => 'FIN kod',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'fin', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'passport',
                'label' => 'Seriya nömrəsi',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'passport', 'LIKE', "$value%");
            }
        );

        CRUD::addFilter(
            [
                'type' => 'text',
                'name' => 'voen',
                'label' => 'VOEN',
            ],
            false,
            function ($value) {
                CRUD::addClause('where', 'voen', 'LIKE', "$value%");
            }
        );
    }
}
