{{-- This file is used for menu items by any Backpack v6 theme --}}
<x-backpack::menu-item title="{{ trans('backpack::custom.menus.dashboard') }}" icon="la la-home" :link="backpack_url('dashboard')" />

<x-backpack::menu-item title='Pages' icon='la la-file-o' :link="backpack_url('page')" />
<x-backpack::menu-item title='Menu' icon='la la-list' :link="backpack_url('menu-item')" />
<x-backpack::menu-dropdown title="Blog" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-item title="Articles" icon="la la-newspaper-o" :link="backpack_url('article')" />
    <x-backpack::menu-dropdown-item title="Categories" icon="la la-list" :link="backpack_url('category')" />
    <x-backpack::menu-dropdown-item title="Tags" icon="la la-tag" :link="backpack_url('tag')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Services" icon="la la-stream" :link="backpack_url('service')" />

{{--<x-backpack::menu-dropdown title="Contents" icon="la la-list">--}}
{{--    <x-backpack::menu-dropdown-item title="Portfolios" icon="las la-photo-video" :link="backpack_url('portfolio')" />--}}
{{--    <x-backpack::menu-dropdown-item title="Team" icon="la la-user-friends" :link="backpack_url('team')" />--}}
{{--    <x-backpack::menu-dropdown-item title="FAQ" icon="la la-question-circle" :link="backpack_url('faq')" />--}}
{{--    <x-backpack::menu-dropdown-item title="Contacts" icon="la la-address-card" :link="backpack_url('contact')" />--}}
{{--    <x-backpack::menu-dropdown-item title="Partners" icon="la la-hands-helping" :link="backpack_url('partner')" />--}}
{{--</x-backpack::menu-dropdown>--}}

<x-backpack::menu-item title="Portfolios" icon="las la-photo-video" :link="backpack_url('portfolio')" />
<x-backpack::menu-item title="Our products" icon="la la-question" :link="backpack_url('our-product')" />
<x-backpack::menu-item title="Team" icon="la la-user-friends" :link="backpack_url('team')" />
<x-backpack::menu-item title="FAQ" icon="la la-question-circle" :link="backpack_url('faq')" />
<x-backpack::menu-item title="Contacts" icon="la la-address-card" :link="backpack_url('contact')" />
<x-backpack::menu-item title="Partners" icon="la la-hands-helping" :link="backpack_url('partner')" />

{{--<x-backpack::menu-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o" :link="backpack_url('elfinder')" />--}}

<x-backpack::menu-item title="Translations" icon="la la-stream" :link="backpack_url('translation-manager')" />

<x-backpack::menu-dropdown title="{{ trans('backpack::custom.menus.managers&roles.title') }}" icon="la la-user-lock">
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.managers') }}" icon="la la-group" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.roles') }}" icon="la la-id-badge" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="{{ trans('backpack::custom.menus.managers&roles.permissions') }}" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Contact forms" icon="la la-question" :link="backpack_url('contact-form')" />

