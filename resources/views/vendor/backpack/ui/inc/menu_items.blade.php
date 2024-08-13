@php use App\Enums\TaxEnum; @endphp
{{-- This file is used for menu items by any Backpack v6 theme --}}
<x-backpack::menu-item title="Statistika" icon="la la-home" :link="backpack_url('dashboard')"/>

<x-backpack::menu-item title='Səhifələr' icon='la la-file-o' :link="backpack_url('page')"/>
<x-backpack::menu-item title='Menyular' icon='la la-list' :link="backpack_url('menu-item')"/>
<x-backpack::menu-item title="İstifadəçilər" icon="la la-users" :link="backpack_url('customers')"/>
<x-backpack::menu-dropdown title="Bloq" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-item title="Məqalələr" icon="la la-newspaper-o" :link="backpack_url('article')"/>
    <x-backpack::menu-dropdown-item title="Kateqorialar" icon="la la-list" :link="backpack_url('category')"/>
    <x-backpack::menu-dropdown-item title="Teqlər" icon="la la-tag" :link="backpack_url('tag')"/>
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Vergi" icon="la la-list">
    <x-backpack::menu-dropdown-item title="Sadələşdirilmiş vergi" icon="la la-question-circle"
                                    :link="backpack_url('tax?type='.TaxEnum::SIMPLIFIED->name)"/>
    <x-backpack::menu-dropdown-item title="ƏDV" icon="la la-question-circle" :link="backpack_url('tax?type='.TaxEnum::VAT->name)"/>
    <x-backpack::menu-dropdown-item title="Mənfəət (Gəlir)" icon="la la-question-circle"
                                    :link="backpack_url('tax?type='.TaxEnum::PROFIT->name)"/>
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Xidmətlərimiz" icon="la la-stream" :link="backpack_url('service')"/>

<x-backpack::menu-item title="Məhsullarımız" icon="la la-shopping-basket" :link="backpack_url('our-product')"/>
<x-backpack::menu-item title="FAQ" icon="la la-question-circle" :link="backpack_url('faq')"/>
<x-backpack::menu-item title="Əlaqələrimiz" icon="la la-address-card" :link="backpack_url('contact')"/>
<x-backpack::menu-item title="Partnyorlar" icon="la la-hands-helping" :link="backpack_url('partner')"/>

<x-backpack::menu-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o"
                       :link="backpack_url('elfinder')"/>

<x-backpack::menu-dropdown title="{{ trans('backpack::custom.menus.managers&roles.title') }}" icon="la la-user-lock">
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.managers') }}"
                                    icon="la la-group" :link="backpack_url('user')"/>
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.roles') }}"
                                    icon="la la-id-badge" :link="backpack_url('role')"/>
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.permissions') }}"
                                    icon="la la-key" :link="backpack_url('permission')"/>
</x-backpack::menu-dropdown>