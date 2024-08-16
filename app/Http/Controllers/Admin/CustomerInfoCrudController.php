<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerInfoRequest;
use App\Models\Customers;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomerInfoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerInfoCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CustomerInfo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer-info');
        CRUD::setEntityNameStrings('customer info', 'customer infos');
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

        $this->addCustomCrudFilters();

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
        CRUD::setValidation(CustomerInfoRequest::class);
        CRUD::addField([
            'name'        => 'customer_id',
            'type'        => 'select2',
            'label'        => 'Müştəri',
            'allows_null' => true,
            'attribute'   => 'full_name',
        ]);

        $subFieldsStoreInfo[] = [
            'name'        => 'address',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];

        $subFieldsStoreInfo[] = [
            'name'        => 'post_index',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsStoreInfo[] = [
            'name'        => 'code',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsStoreInfo[] = [
            'name'     => 'status',
            'type'     => 'switch',
            'label'    => 'Status',
            'color'    => 'primary',
            'onLabel'  => '✓',
            'offLabel' => '✕',
            'wrapper'  => ['class' => 'form-group col-lg-2 pt-5'],
        ];
        CRUD::addField([
            'name'          => 'stores',
            'tab'           => 'Obyekt məlumatları',
            'type'          => "repeatable",
            'label'          => '',
            'subfields'     => $subFieldsStoreInfo,
            'max_rows'      => 10,
            'min_rows'      => 1,
            'init_rows'     => 1,
            'new_item_label'  => 'Obyekt əlavə et'
        ]);

        $subFieldsWorkersInfo[] = [
            'name'        => 'name',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsWorkersInfo[] = [
            'name'        => 'surname',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsWorkersInfo[] = [
            'name'    => 'phone',
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
                'class' => 'form-group col-md-3'
            ]
        ];
        $subFieldsWorkersInfo[] = [
            'name'        => 'email',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        CRUD::addField([
            'name'          => 'workers',
            'tab'          => 'İşci məlumatları',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsWorkersInfo,
            'max_rows'      => 10,
            'min_rows'      => 1,
            'init_rows'     => 1,
            'new_item_label'  => 'İşci əlavə et'
        ]);

        $subFieldsDirectionActionsInfo[] = [
            'name'        => 'direction_1',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        $subFieldsDirectionActionsInfo[] = [
            'name'        => 'direction_2',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        CRUD::addField([
            'name'          => 'direction_action',
            'tab'          => 'Fəaliyyət istiqaməti',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsDirectionActionsInfo,
            'max_rows'      => 1,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subFieldsDebtInfo[] = [
            'name'        => 'debt_1',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        $subFieldsDebtInfo[] = [
            'name'        => 'debt_2',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        CRUD::addField([
            'name'          => 'debt_information',
            'tab'          => 'Borc məlumatları (cari borclar)',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsDebtInfo,
            'max_rows'      => 1,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subFieldsCashBoxInfo[] = [
            'name'        => 'current',
            'label'       => 'İstifadə olunan kassa',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'registered',
            'label'       => 'Qeydiyyatdakı kassa',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'company',
            'label'       => 'Kassanın məxsus olduğu şirkət',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'pos_terminal_bank',
            'label'       => 'Pos-terminalın bankı',
            'wrapper'     => [
                'class' => 'form-group col-md-3'
            ],
        ];
        CRUD::addField([
            'name'          => 'cash_box_information',
            'tab'          => 'Kassa məlumatları',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsCashBoxInfo,
            'max_rows'      => 1,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subFieldsBankInfo[] = [
            'name'        => 'requisite_1',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        $subFieldsBankInfo[] = [
            'name'        => 'requisite_2',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        CRUD::addField([
            'name'          => 'bank_details',
            'tab'          => 'Bank rekvizitləri',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsBankInfo,
            'max_rows'      => 1,
            'min_rows'      => 1,
            'init_rows'     => 1,
        ]);

        $subFieldsControlCashRegisters[] = [
            'name'        => 'cash_1',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        $subFieldsControlCashRegisters[] = [
            'name'        => 'cash_1_details',
            'label'       => '',
            'wrapper'     => [
                'class' => 'form-group col-md-6'
            ],
        ];
        CRUD::addField([
            'name'          => 'control_cash_registers',
            'tab'          => 'Nəzarət kassa aparatları',
            'type'          => "repeatable",
            'label'         => '',
            'subfields'     => $subFieldsControlCashRegisters,
            'max_rows'      => 10,
            'min_rows'      => 1,
            'init_rows'     => 1,
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

    protected function autoSetupShowOperation()
    {
        $this->setupListOperation();

        $subFieldsStoreInfo[] = [
            'name'        => 'address',
        ];
        $subFieldsStoreInfo[] = [
            'name'        => 'post_index',
        ];
        $subFieldsStoreInfo[] = [
            'name'        => 'code',
        ];
        $subFieldsStoreInfo[] = [
            'name'     => 'status',
            'type'     => 'switch',
        ];
        CRUD::addColumn([
            'name'          => 'stores',
            'type'          => "repeatable",
            'label'         => 'Obyekt məlumatları',
            'subfields'     => $subFieldsStoreInfo,
        ]);

        $subFieldsWorkersInfo[] = [
            'name'        => 'name',
        ];
        $subFieldsWorkersInfo[] = [
            'name'        => 'surname',
        ];
        $subFieldsWorkersInfo[] = [
            'name'    => 'phone',
        ];
        $subFieldsWorkersInfo[] = [
            'name'        => 'email',
        ];
        CRUD::addColumn([
            'name'          => 'workers',
            'type'          => "repeatable",
            'label'         => 'İşci məlumatları',
            'subfields'     => $subFieldsWorkersInfo,
        ]);

        $subFieldsDirectionActionsInfo[] = [
            'name'        => 'direction_1',
            'label'       => 'Fəaliyyət 1',
        ];
        $subFieldsDirectionActionsInfo[] = [
            'name'        => 'direction_2',
            'label'       => 'Fəaliyyət 2',
        ];
        CRUD::addColumn([
            'name'          => 'direction_action',
            'type'          => "repeatable",
            'label'         => 'Fəaliyyət istiqaməti',
            'subfields'     => $subFieldsDirectionActionsInfo,
        ]);

        $subFieldsDebtInfo[] = [
            'name'        => 'debt_1',
        ];
        $subFieldsDebtInfo[] = [
            'name'        => 'debt_2',
        ];
        CRUD::addColumn([
            'name'          => 'debt_information',
            'type'          => "repeatable",
            'label'         => 'Borc məlumatları (cari borclar)',
            'subfields'     => $subFieldsDebtInfo,
        ]);

        $subFieldsCashBoxInfo[] = [
            'name'        => 'current',
            'label'       => 'İstifadə olunan kassa',
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'registered',
            'label'       => 'Qeydiyyatdakı kassa',
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'company',
            'label'       => 'Kassanın məxsus olduğu şirkət',
        ];
        $subFieldsCashBoxInfo[] = [
            'name'        => 'pos_terminal_bank',
            'label'       => 'Pos-terminalın bankı',
        ];
        CRUD::addColumn([
            'name'          => 'cash_box_information',
            'type'          => "repeatable",
            'label'         => 'Kassa məlumatları',
            'subfields'     => $subFieldsCashBoxInfo,
        ]);

        $subFieldsBankInfo[] = [
            'name'        => 'requisite_1',
        ];
        $subFieldsBankInfo[] = [
            'name'        => 'requisite_2',
        ];
        CRUD::addColumn([
            'name'          => 'bank_details',
            'type'          => "repeatable",
            'label'         => 'Bank rekvizitləri',
            'subfields'     => $subFieldsBankInfo,
        ]);

        $subFieldsControlCashRegisters[] = [
            'name'        => 'cash_1',
            'label'       => '',
        ];
        $subFieldsControlCashRegisters[] = [
            'name'        => 'cash_1_details',
            'label'       => '',
        ];
        CRUD::addColumn([
            'name'          => 'control_cash_registers',
            'type'          => "repeatable",
            'label'         => 'Nəzarət kassa aparatları',
            'subfields'     => $subFieldsControlCashRegisters,
        ]);
    }

    protected function addCustomCrudFilters(): void
    {
        CRUD::addFilter([
            'name' => 'customer_id',
            'type' => 'select2',
            'label' => 'Istifadəçilər',
        ], function () {
            return Customers::all()->keyBy('id')->pluck('full_name', 'id')->toArray();
        }, function ($value) {
            $this->crud->addClause('where', 'customer_id', $value);
        });
    }
}